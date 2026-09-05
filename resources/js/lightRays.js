import { Renderer, Program, Mesh, Triangle, Vec3 } from 'ogl';

// ===== Light Rays background (vanilla JS, WebGL via OGL) =====
// Terinspirasi dari efek "LightRays" di reactbits.dev, ditulis ulang
// tanpa React supaya bisa langsung dipakai di project Alpine.js/Blade.
//
// Cara pakai (lihat juga app.js):
//   initLightRays('#light-rays-canvas', {
//       color: [0.4, 0.7, 1.0], // RGB 0-1
//       speed: 1.2,
//       spread: 0.6,
//       rayLength: 1.4,
//       followMouse: true,
//   });

const vertexShader = /* glsl */ `
    attribute vec2 position;
    attribute vec2 uv;
    varying vec2 vUv;
    void main() {
        vUv = uv;
        gl_Position = vec4(position, 0.0, 1.0);
    }
`;

const fragmentShader = /* glsl */ `
    precision highp float;
    uniform float uTime;
    uniform vec2 uResolution;
    uniform vec3 uColor;
    uniform vec2 uMouse;
    uniform float uSpeed;
    uniform float uSpread;
    uniform float uRayLength;
    uniform float uMouseInfluence;
    varying vec2 vUv;

    // noise sederhana untuk kesan organik pada rays
    float hash(vec2 p) {
        return fract(sin(dot(p, vec2(127.1, 311.7))) * 43758.5453123);
    }

    void main() {
        vec2 uv = vUv;
        float aspect = uResolution.x / uResolution.y;
        uv.x = (uv.x - 0.5) * aspect + 0.5;

        // Sumber cahaya di atas tengah, sedikit mengikuti mouse
        vec2 origin = vec2(0.5 + (uMouse.x - 0.5) * uMouseInfluence, 1.05);

        vec2 dir = uv - origin;
        float dist = length(dir);
        float angle = atan(dir.x, -dir.y);

        // Pola garis-garis cahaya yang bergerak seiring waktu
        float rays = sin(angle * 14.0 + uTime * uSpeed) * 0.5 + 0.5;
        rays += sin(angle * 27.0 - uTime * uSpeed * 0.6) * 0.25;
        rays = clamp(rays, 0.0, 1.0);
        rays = pow(rays, 3.0);

        // Noise halus supaya tidak terlalu "flat"
        float n = hash(uv * uResolution.xy * 0.5 + uTime) * 0.06;

        float falloff = smoothstep(1.3, 0.0, dist * uRayLength);
        float intensity = (rays * uSpread + n) * falloff;

        vec3 color = uColor * intensity;
        gl_FragColor = vec4(color, intensity);
    }
`;

export function initLightRays(selector, options = {}) {
    const container = typeof selector === 'string' ? document.querySelector(selector) : selector;
    if (!container) return null;

    // Hormati preferensi reduce-motion pengguna
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return null;
    }

    const {
        color = [0.35, 0.65, 1.0],
        speed = 1.0,
        spread = 0.7,
        rayLength = 1.3,
        followMouse = true,
        mouseInfluence = 0.15,
    } = options;

    const renderer = new Renderer({ alpha: true, antialias: true, dpr: Math.min(window.devicePixelRatio, 2) });
    const gl = renderer.gl;
    gl.clearColor(0, 0, 0, 0);
    container.appendChild(gl.canvas);
    gl.canvas.style.width = '100%';
    gl.canvas.style.height = '100%';
    gl.canvas.style.display = 'block';

    const geometry = new Triangle(gl);

    const program = new Program(gl, {
        vertex: vertexShader,
        fragment: fragmentShader,
        transparent: true,
        depthTest: false,
        uniforms: {
            uTime: { value: 0 },
            uResolution: { value: [container.clientWidth, container.clientHeight] },
            uColor: { value: new Vec3(...color) },
            uMouse: { value: [0.5, 0.5] },
            uSpeed: { value: speed },
            uSpread: { value: spread },
            uRayLength: { value: rayLength },
            uMouseInfluence: { value: followMouse ? mouseInfluence : 0 },
        },
    });

    const mesh = new Mesh(gl, { geometry, program });

    const resize = () => {
        const width = container.clientWidth;
        const height = container.clientHeight;
        renderer.setSize(width, height);
        program.uniforms.uResolution.value = [width, height];
    };
    window.addEventListener('resize', resize);
    resize();

    if (followMouse) {
        window.addEventListener('mousemove', (e) => {
            const rect = container.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width;
            const y = (e.clientY - rect.top) / rect.height;
            program.uniforms.uMouse.value = [x, y];
        });
    }

    // ===== Animasi time-based (bukan per-frame) =====
    // uTime dihitung dari performance.now() asli, sehingga kecepatan
    // pergerakan rays konsisten di semua refresh rate monitor.
    let rafId;
    const startTime = performance.now();

    const update = (now) => {
        const elapsed = (now - startTime) / 1000; // detik, wall-clock time
        program.uniforms.uTime.value = elapsed;
        renderer.render({ scene: mesh });
        rafId = requestAnimationFrame(update);
    };
    rafId = requestAnimationFrame(update);

    // Fungsi cleanup (opsional dipanggil kalau elemen dilepas dari DOM)
    return () => {
        cancelAnimationFrame(rafId);
        window.removeEventListener('resize', resize);
        container.removeChild(gl.canvas);
    };
}