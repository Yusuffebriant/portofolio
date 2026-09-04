import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// ===== Dark/Light mode =====
const applyTheme = () => {
    const saved = localStorage.getItem('theme');
    document.documentElement.classList.toggle('dark', saved ? saved === 'dark' : true);
};
applyTheme();

window.toggleTheme = () => {
    const isDark = document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
};

document.addEventListener('DOMContentLoaded', () => {
    // ===== Staggered scroll reveal =====
    const groups = document.querySelectorAll('[data-reveal-group]');
    groups.forEach((group) => {
        const items = group.querySelectorAll('.reveal');
        items.forEach((el, i) => el.style.setProperty('--reveal-delay', `${i * 80}ms`));
    });

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });
    document.querySelectorAll('.reveal').forEach((el) => revealObserver.observe(el));

    // ===== Typewriter generik: ketik teks ke sebuah elemen, lalu jalankan callback =====
    const typeText = (el, text, onDone) => {
        if (!el) { onDone && onDone(); return; }
        let i = 0;
        const tick = () => {
            if (i < text.length) {
                i++;
                el.textContent = text.slice(0, i);
                setTimeout(tick, 55 + Math.random() * 35);
            } else {
                onDone && onDone();
            }
        };
        tick();
    };

    const addCaret = (el) => {
        const caret = document.createElement('span');
        caret.className = 'caret';
        caret.style.height = '1em';
        caret.style.verticalAlign = 'text-bottom';
        el.appendChild(caret);
    };

    // ===== Nama: loop ketik -> hapus -> ketik lagi (terus-menerus) =====
    // ===== Tagline: ketik sekali saja, dipicu setelah putaran PERTAMA nama selesai diketik =====
    const nameEl = document.getElementById('typewriter');
    const taglineEl = document.getElementById('tagline-typewriter');
    const nameText = 'Saya  Yusuf Febrianto';
    const taglineText = 'Designing and building intuitive, functional digital experiences with passion and precision.';

    let taglineStarted = false;

    const startTaglineOnce = () => {
        if (taglineStarted) return;
        taglineStarted = true;
        setTimeout(() => {
            typeText(taglineEl, taglineText, () => {
                if (taglineEl) addCaret(taglineEl);
            });
        }, 300);
    };

    const nameLoop = () => {
        if (!nameEl) return;
        let charIndex = 0;
        let deleting = false;

        const tick = () => {
            if (!deleting) {
                charIndex++;
                nameEl.textContent = nameText.slice(0, charIndex);
                if (charIndex === nameText.length) {
                    addCaret(nameEl);
                    startTaglineOnce(); // hanya jalan sekali, di putaran pertama
                    deleting = true;
                    setTimeout(tick, 1800); // jeda sebelum mulai menghapus
                    return;
                }
                setTimeout(tick, 70 + Math.random() * 40);
            } else {
                const caret = nameEl.querySelector('.caret');
                if (caret) caret.remove();
                charIndex--;
                nameEl.textContent = nameText.slice(0, charIndex);
                if (charIndex === 0) {
                    deleting = false;
                    setTimeout(tick, 500); // jeda sebelum mulai ketik lagi
                    return;
                }
                setTimeout(tick, 35);
            }
        };
        tick();
    };

    setTimeout(nameLoop, 600);

    // ===== Magnetic button (tombol "tertarik" mengikuti mouse saat didekati) =====
    const magneticBtn = document.getElementById('magnetic-btn');
    if (magneticBtn && window.matchMedia('(hover: hover)').matches) {
        const inner = magneticBtn.querySelector('.magnetic-inner');
        const radius = 90;   // jarak (px) mulai kerasa efek magnetnya
        const strength = 0.4; // seberapa kuat tarikannya (0-1)
        const maxPull = 18;   // batas maksimal pergeseran (px)

        const onMouseMove = (e) => {
            const rect = magneticBtn.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            const dx = e.clientX - centerX;
            const dy = e.clientY - centerY;
            const distance = Math.hypot(dx, dy);

            if (distance < radius) {
                const pullX = Math.max(-maxPull, Math.min(maxPull, dx * strength));
                const pullY = Math.max(-maxPull, Math.min(maxPull, dy * strength));
                magneticBtn.style.transform = `translate(${pullX}px, ${pullY}px)`;
                if (inner) inner.style.transform = `translate(${pullX * 0.4}px, ${pullY * 0.4}px)`;
            } else {
                magneticBtn.style.transform = 'translate(0, 0)';
                if (inner) inner.style.transform = 'translate(0, 0)';
            }
        };

        window.addEventListener('mousemove', onMouseMove);
        magneticBtn.addEventListener('mouseleave', () => {
            magneticBtn.style.transform = 'translate(0, 0)';
            if (inner) inner.style.transform = 'translate(0, 0)';
        });
    }

    // ===== Scroll-spy navbar active state (dengan indikator bergerak) =====
    const navLinks = document.querySelectorAll('.nav-link');
    const indicator = document.getElementById('nav-indicator');
    const navList = document.getElementById('nav-links');
    const sections = Array.from(navLinks)
        .map((link) => document.getElementById(link.dataset.nav))
        .filter(Boolean);

    const moveIndicator = (link) => {
        if (!indicator || !link || !navList) return;
        const linkRect = link.getBoundingClientRect();
        const listRect = navList.getBoundingClientRect();
        indicator.style.transform = `translateX(${linkRect.left - listRect.left}px)`;
        indicator.style.width = `${linkRect.width}px`;
        indicator.style.opacity = '1';
    };

    const setActive = (id) => {
        navLinks.forEach((link) => {
            const isActive = link.dataset.nav === id;
            link.classList.toggle('text-primary', isActive);
            link.classList.toggle('text-slate-600', !isActive);
            link.classList.toggle('dark:text-slate-300', !isActive);
            if (isActive) moveIndicator(link);
        });
    };

    const spyObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                setActive(entry.target.id);
            }
        });
    }, { rootMargin: '-40% 0px -55% 0px', threshold: 0 });

    sections.forEach((section) => spyObserver.observe(section));

    window.addEventListener('load', () => setActive('home'));
    window.addEventListener('resize', () => {
        const current = document.querySelector('.nav-link.text-primary');
        if (current) moveIndicator(current);
    });
    setActive('home');

    // ===== Project card tilt 3D mengikuti posisi mouse =====
    const tiltCards = document.querySelectorAll('.tilt-card');
    if (tiltCards.length && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        const TILT_MAX = 10; // derajat maksimum kemiringan
        const SCALE_HOVER = 1.02;

        tiltCards.forEach((card) => {
            const handleMove = (e) => {
                const rect = card.getBoundingClientRect();
                const px = (e.clientX - rect.left) / rect.width; // 0..1
                const py = (e.clientY - rect.top) / rect.height; // 0..1

                const rotateY = (px - 0.5) * TILT_MAX * 2;
                const rotateX = (0.5 - py) * TILT_MAX * 2;

                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(${SCALE_HOVER}, ${SCALE_HOVER}, ${SCALE_HOVER})`;
                card.style.setProperty('--glare-x', `${px * 100}%`);
                card.style.setProperty('--glare-y', `${py * 100}%`);
            };

            card.addEventListener('mouseenter', () => card.classList.add('tilt-active'));
            card.addEventListener('mousemove', handleMove);
            card.addEventListener('mouseleave', () => {
                card.classList.remove('tilt-active');
                card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
            });
        });
    }

    // ===== Page transition: progress bar tipis + smooth scroll custom =====
    const transitionOverlay = document.createElement('div');
    transitionOverlay.id = 'page-transition-overlay';
    document.body.appendChild(transitionOverlay);

    let isPageTransitioning = false;
    const prefersReducedMotionTransition = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const SCROLL_DURATION = 650; // ms

    const easeInOutCubic = (t) => (t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2);

    const smoothScrollTo = (targetY, duration, onDone) => {
        const startY = window.scrollY;
        const distance = targetY - startY;
        const startTime = performance.now();

        const step = (now) => {
            const elapsed = now - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const eased = easeInOutCubic(progress);
            window.scrollTo(0, startY + distance * eased);

            transitionOverlay.style.width = `${progress * 100}%`;

            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                onDone && onDone();
            }
        };
        requestAnimationFrame(step);
    };

    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', (e) => {
            const hash = anchor.getAttribute('href');
            if (!hash || hash.length < 2) return; // abaikan href="#" kosong

            const target = document.querySelector(hash);
            if (!target) return;

            e.preventDefault();
            if (isPageTransitioning) return;

            history.pushState(null, '', hash);

            if (prefersReducedMotionTransition) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                return;
            }

            isPageTransitioning = true;
            transitionOverlay.style.width = '0%';
            transitionOverlay.classList.add('active');

            const headerOffset = 80; // tinggi navbar fixed
            const targetY = target.getBoundingClientRect().top + window.scrollY - headerOffset;

            smoothScrollTo(targetY, SCROLL_DURATION, () => {
                transitionOverlay.classList.remove('active');
                setTimeout(() => {
                    transitionOverlay.style.width = '0%';
                    isPageTransitioning = false;
                }, 250);
            });
        });
    });

    // ===== Counter animasi angka: dari 0 -> angka asli saat elemen discroll ke viewport =====
    // Cara pakai di Blade:
    //   <span class="counter" data-target="120" data-suffix="+">0</span>
    //   <span class="counter" data-target="4.8" data-decimals="1" data-suffix="/5">0</span>
    // Atribut opsional: data-prefix, data-suffix, data-decimals (default 0), data-duration (ms, default 1800)
    const counterEls = document.querySelectorAll('.counter[data-target]');
    if (counterEls.length) {
        const prefersReducedMotionCounter = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        const easeOutExpo = (t) => (t === 1 ? 1 : 1 - Math.pow(2, -10 * t));

        const formatCounterValue = (value, decimals) => {
            const fixed = value.toFixed(decimals);
            const [intPart, decPart] = fixed.split('.');
            const withThousands = Number(intPart).toLocaleString('en-US');
            return decPart ? `${withThousands}.${decPart}` : withThousands;
        };

        const animateCounter = (el) => {
            const target = parseFloat(el.dataset.target);
            if (Number.isNaN(target)) return;

            const decimals = parseInt(el.dataset.decimals || '0', 10);
            const prefix = el.dataset.prefix || '';
            const suffix = el.dataset.suffix || '';
            const duration = parseInt(el.dataset.duration || '1800', 10);

            if (prefersReducedMotionCounter) {
                el.textContent = `${prefix}${formatCounterValue(target, decimals)}${suffix}`;
                return;
            }

            const start = performance.now();
            const tick = (now) => {
                const progress = Math.min((now - start) / duration, 1);
                const current = target * easeOutExpo(progress);
                el.textContent = `${prefix}${formatCounterValue(current, decimals)}${suffix}`;
                if (progress < 1) requestAnimationFrame(tick);
            };
            requestAnimationFrame(tick);
        };

        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.4 });

        counterEls.forEach((el) => counterObserver.observe(el));
    }

    // ===== Gelembung: makin banyak muncul, pecah jadi cipratan air lalu muncul lagi saat diklik =====
    const heroSection = document.getElementById('home');
    if (heroSection) {
        const bubbleReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        const MAX_BUBBLES = 28;

        const randomBetween = (min, max) => Math.random() * (max - min) + min;

        const createSplash = (x, y) => {
            const DROP_COUNT = 7;
            for (let i = 0; i < DROP_COUNT; i++) {
                const angle = randomBetween(0, Math.PI * 2);
                const dist = randomBetween(18, 48);
                const size = randomBetween(4, 8);

                const drop = document.createElement('div');
                drop.className = 'water-drop';
                drop.style.width = `${size}px`;
                drop.style.height = `${size}px`;
                drop.style.marginLeft = `${-size / 2}px`;
                drop.style.marginTop = `${-size / 2}px`;
                drop.style.left = `${x}px`;
                drop.style.top = `${y}px`;
                drop.style.setProperty('--drop-x', `${Math.cos(angle) * dist}px`);
                drop.style.setProperty('--drop-y', `${Math.sin(angle) * dist + dist * 0.35}px`); // sedikit tarikan gravitasi
                document.body.appendChild(drop);

                requestAnimationFrame(() => drop.classList.add('drop-burst'));
                setTimeout(() => drop.remove(), 650);
            }
        };

        const scheduleRespawn = () => {
            setTimeout(spawnBubble, randomBetween(400, 1200));
        };

        const popBubble = (bubble) => {
            if (bubble.dataset.popped === 'true') return;
            bubble.dataset.popped = 'true';

            const rect = bubble.getBoundingClientRect();
            createSplash(rect.left + rect.width / 2, rect.top + rect.height / 2);

            bubble.classList.add('bubble-pop');
            setTimeout(() => {
                bubble.remove();
                scheduleRespawn(); // gelembung baru muncul lagi menggantikan yang pecah
            }, 200);
        };

        const initBubble = (bubble) => {
            bubble.addEventListener('click', () => popBubble(bubble));
        };

        const spawnBubble = () => {
            if (heroSection.querySelectorAll('.bubble').length >= MAX_BUBBLES) return;

            const sizeClasses = ['w-3 h-3', 'w-4 h-4', 'w-5 h-5', 'w-6 h-6', 'w-7 h-7', 'w-8 h-8'];
            const bubble = document.createElement('div');
            bubble.className = `bubble ${sizeClasses[Math.floor(Math.random() * sizeClasses.length)]}`;
            bubble.style.left = `${randomBetween(3, 97)}%`;
            bubble.style.animationDuration = `${randomBetween(11, 20)}s`;
            bubble.style.animationDelay = '0s';
            bubble.style.setProperty('--bubble-drift', `${randomBetween(-25, 25)}px`);
            heroSection.appendChild(bubble);
            initBubble(bubble);
        };

        // Inisialisasi gelembung yang sudah ada di markup
        heroSection.querySelectorAll('.bubble').forEach(initBubble);

        if (!bubbleReducedMotion) {
            // Terus menambah gelembung baru secara bertahap sampai batas MAX_BUBBLES
            const ambientSpawn = setInterval(() => {
                if (heroSection.querySelectorAll('.bubble').length >= MAX_BUBBLES) return;
                spawnBubble();
            }, 900);

            // Tambahkan langsung beberapa gelembung ekstra saat halaman dimuat
            for (let i = 0; i < 10; i++) {
                setTimeout(spawnBubble, i * 250);
            }
        }
    }

    // ===== Cursor trail: kursor mouse tetap normal + bayangan "uler" mengikuti di belakangnya =====
    const supportsFineHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (supportsFineHover && !prefersReducedMotion) {
        const HOVER_SELECTOR = 'a, button, input, textarea, select, label, [role="button"], [onclick], .magnetic, .photo-zoom';
        const TRAIL_LENGTH = 12;
        const MAX_SIZE = 14;
        const MIN_SIZE = 3;

        let mouseX = window.innerWidth / 2;
        let mouseY = window.innerHeight / 2;
        let hasMoved = false;

        const trailDots = [];
        const trailPos = [];

        for (let i = 0; i < TRAIL_LENGTH; i++) {
            const t = i / (TRAIL_LENGTH - 1); // 0 (head) -> 1 (tail)
            const size = Math.max(MIN_SIZE, MAX_SIZE - t * (MAX_SIZE - MIN_SIZE));

            const seg = document.createElement('div');
            seg.className = 'cursor-trail-dot';
            seg.style.width = `${size}px`;
            seg.style.height = `${size}px`;
            seg.style.marginLeft = `${-size / 2}px`;
            seg.style.marginTop = `${-size / 2}px`;
            seg.style.opacity = `${(1 - t) * 0.5}`;
            seg.style.filter = `blur(${t * 1.5}px)`;
            seg.style.transform = 'translate(0, 0)';
            document.body.appendChild(seg);

            trailDots.push(seg);
            trailPos.push({ x: mouseX, y: mouseY });
        }

        window.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            if (!hasMoved) {
                hasMoved = true;
                trailPos.forEach((p) => { p.x = mouseX; p.y = mouseY; });
                trailDots.forEach((seg) => { seg.style.opacity = seg.dataset.baseOpacity || seg.style.opacity; });
            }
        });

        const animateTrail = () => {
            let targetX = mouseX;
            let targetY = mouseY;
            trailPos.forEach((pos, i) => {
                const ease = Math.max(0.15, 0.4 - i * 0.02); // segmen belakang bergerak lebih lambat -> efek uler
                pos.x += (targetX - pos.x) * ease;
                pos.y += (targetY - pos.y) * ease;
                trailDots[i].style.left = `${pos.x}px`;
                trailDots[i].style.top = `${pos.y}px`;
                targetX = pos.x;
                targetY = pos.y;
            });
            requestAnimationFrame(animateTrail);
        };
        animateTrail();

        // Start invisible until the mouse actually moves, so it doesn't flash at (0,0)
        trailDots.forEach((seg) => {
            seg.dataset.baseOpacity = seg.style.opacity;
            seg.style.opacity = '0';
        });

        document.addEventListener('mouseover', (e) => {
            if (e.target.closest && e.target.closest(HOVER_SELECTOR)) {
                trailDots.forEach((seg) => seg.classList.add('trail-hover'));
            }
        });
        document.addEventListener('mouseout', (e) => {
            if (e.target.closest && e.target.closest(HOVER_SELECTOR)) {
                trailDots.forEach((seg) => seg.classList.remove('trail-hover'));
            }
        });

        document.addEventListener('mouseleave', () => {
            trailDots.forEach((seg) => { seg.style.opacity = '0'; });
        });
        document.addEventListener('mouseenter', () => {
            if (hasMoved) {
                trailDots.forEach((seg) => { seg.style.opacity = seg.dataset.baseOpacity; });
            }
        });
    }
});



