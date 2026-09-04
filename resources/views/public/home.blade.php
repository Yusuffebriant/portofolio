<x-layout>

    {{-- ===== HERO ===== --}}
    <section id="home" class="relative min-h-screen flex flex-col items-center justify-center px-6 overflow-hidden pt-20">
        <div class="blob w-96 h-96 bg-primary -top-20 -left-20"></div>
        <div class="blob w-96 h-96 bg-indigo-500 top-40 right-0"></div>
        <div class="blob w-72 h-72 bg-blue-400 bottom-0 left-1/3"></div>

        {{-- Gelembung mengambang --}}
        <div class="bubble w-4 h-4" style="left:4%; animation-duration:14s; animation-delay:0s; --bubble-drift:15px;"></div>
        <div class="bubble w-6 h-6" style="left:11%; animation-duration:18s; animation-delay:1.5s; --bubble-drift:-25px;"></div>
        <div class="bubble w-3 h-3" style="left:18%; animation-duration:12s; animation-delay:5s; --bubble-drift:10px;"></div>
        <div class="bubble w-5 h-5" style="left:25%; animation-duration:16s; animation-delay:3.2s; --bubble-drift:-18px;"></div>
        <div class="bubble w-8 h-8" style="left:32%; animation-duration:20s; animation-delay:1s; --bubble-drift:-15px;"></div>
        <div class="bubble w-4 h-4" style="left:39%; animation-duration:13.5s; animation-delay:4.5s; --bubble-drift:22px;"></div>
        <div class="bubble w-5 h-5" style="left:45%; animation-duration:20s; animation-delay:1s; --bubble-drift:-15px;"></div>
        <div class="bubble w-3 h-3" style="left:52%; animation-duration:11s; animation-delay:6s; --bubble-drift:12px;"></div>
        <div class="bubble w-7 h-7" style="left:59%; animation-duration:17s; animation-delay:2.4s; --bubble-drift:-20px;"></div>
        <div class="bubble w-5 h-5" style="left:62%; animation-duration:16s; animation-delay:7s; --bubble-drift:20px;"></div>
        <div class="bubble w-4 h-4" style="left:68%; animation-duration:15s; animation-delay:3s; --bubble-drift:-14px;"></div>
        <div class="bubble w-3 h-3" style="left:74%; animation-duration:13s; animation-delay:3s; --bubble-drift:-10px;"></div>
        <div class="bubble w-6 h-6" style="left:80%; animation-duration:14.5s; animation-delay:5.5s; --bubble-drift:16px;"></div>
        <div class="bubble w-7 h-7" style="left:85%; animation-duration:19s; animation-delay:6s; --bubble-drift:15px;"></div>
        <div class="bubble w-4 h-4" style="left:91%; animation-duration:15s; animation-delay:4s; --bubble-drift:-20px;"></div>
        <div class="bubble w-5 h-5" style="left:96%; animation-duration:17.5s; animation-delay:2s; --bubble-drift:18px;"></div>

        <div class="relative flex flex-col items-center text-center max-w-2xl">
            <img src="{{ asset('images/profile.jpg') }}" alt="Yusuf Febrianto"
                 class="hero-entrance ring-pulse photo-zoom w-28 h-28 rounded-full object-cover mb-6 ring-4 ring-primary/40 shadow-lg shadow-primary/20">

            <h1 class="hero-entrance font-display text-5xl md:text-6xl font-extrabold rgb-text mb-3">Hallo</h1>
            <p class="hero-entrance delay-200 font-display text-xl md:text-2xl font-semibold mb-4 min-h-[2em]">
                <span id="typewriter"></span>
            </p>

            <p class="text-slate-500 dark:text-slate-400 mb-8 max-w-md min-h-[3em] md:min-h-[2em]">
                <span id="tagline-typewriter"></span>
            </p>

            <div class="hero-entrance delay-400 flex items-center gap-4 mb-10">
                <a href="https://github.com/USERNAME" target="_blank"
                   class="w-11 h-11 rounded-full bg-white dark:bg-card border border-line-soft dark:border-line flex items-center justify-center text-slate-500 dark:text-slate-300 hover:border-primary hover:text-primary hover:-translate-y-1 transition duration-300">
                    <x-social-icon platform="github" class="h-[18px] w-[18px]" />
                </a>
                <a href="https://linkedin.com/in/USERNAME" target="_blank"
                   class="w-11 h-11 rounded-full bg-white dark:bg-card border border-line-soft dark:border-line flex items-center justify-center text-slate-500 dark:text-slate-300 hover:border-primary hover:text-primary hover:-translate-y-1 transition duration-300">
                    <x-social-icon platform="linkedin" class="h-[18px] w-[18px]" />
                </a>
                <a href="https://instagram.com/USERNAME" target="_blank"
                   class="w-11 h-11 rounded-full bg-white dark:bg-card border border-line-soft dark:border-line flex items-center justify-center text-slate-500 dark:text-slate-300 hover:border-primary hover:text-primary hover:-translate-y-1 transition duration-300">
                    <x-social-icon platform="instagram" class="h-[18px] w-[18px]" />
                </a>
            </div>

            <div class="hero-entrance delay-500 flex flex-wrap items-center justify-center gap-4">
                <a href="#projects" id="magnetic-btn" class="btn-gradient pulse-shadow magnetic font-display font-semibold text-white px-8 py-3.5 rounded-full">
                    <span class="magnetic-inner">Explore My Work</span>
                </a>
                <a href="{{ asset('cv/yusuf-febrianto-cv.pdf') }}" target="_blank"
                   class="font-display font-semibold text-slate-700 dark:text-slate-200 border border-line-soft dark:border-line px-8 py-3.5 rounded-full hover:border-primary hover:text-primary hover:-translate-y-1 transition duration-300">
                    Download CV
                </a>
            </div>
        </div>

        <a href="#about" class="bounce-soft absolute bottom-8 text-slate-400 dark:text-slate-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </a>
    </section>

    {{-- ===== ABOUT ===== --}}
    <section id="about" class="relative max-w-6xl mx-auto px-6 py-24 overflow-hidden" data-reveal-group>
        <div class="blob w-80 h-80 bg-indigo-400 -top-10 -right-20"></div>
        <div class="blob w-64 h-64 bg-blue-400 bottom-0 -left-10"></div>

        <div class="relative reveal text-center mb-16">
            <h2 class="font-display text-3xl font-bold text-gradient mb-3">About Me</h2>
            <div class="w-16 h-1 bar-gradient mx-auto rounded-full"></div>
        </div>

        <div class="relative grid md:grid-cols-2 gap-14 items-center">
            <div class="reveal relative flex justify-center">
                <div class="absolute w-64 h-64 rounded-full border-[10px] border-primary/20"></div>
                <div class="absolute w-64 h-64 orbit-ring"></div>
                <div class="relative photo-frame photo-tilt w-56 h-72 rounded-2xl shadow-xl overflow-hidden">
                    <img src="{{ asset('images/profile.jpg') }}" alt="Yusuf Febrianto"
                         class="photo-zoom w-full h-full object-cover">
                    <div class="shine-sweep"></div>
                </div>
            </div>

            <div>
                <p class="reveal font-display text-lg font-semibold text-primary mb-3">Crafting Digital Masterpieces</p>
                <p class="reveal text-slate-600 dark:text-slate-300 leading-relaxed mb-8">
                    Saya adalah seorang Web Developer yang memiliki minat dalam membangun aplikasi web modern,
                    interaktif, dan responsif. Fokus saya adalah menulis kode yang bersih, membuat desain yang
                    menarik, dan memberikan solusi yang benar-benar berdampak bagi penggunanya.
                </p>

                <div class="reveal grid grid-cols-2 gap-4 mb-8">
                    <div class="info-card">
                        <div class="info-card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-wide text-slate-400">Name</p>
                            <p class="font-medium text-sm">Yusuf Febrianto</p>
                        </div>
                    </div>
                    <div class="info-card">
                        <div class="info-card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs uppercase tracking-wide text-slate-400">Email</p>
                            <p class="font-medium text-sm truncate">yusuffebriantoo95@gmail.com</p>
                        </div>
                    </div>
                    <div class="info-card">
                        <div class="info-card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-wide text-slate-400">From</p>
                            <p class="font-medium text-sm">Surakarta, Indonesia</p>
                        </div>
                    </div>
                    <div class="info-card">
                        <div class="info-card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.517l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-wide text-slate-400">Phone</p>
                            <p class="font-medium text-sm">+62 838-5420-8733</p>
                        </div>
                    </div>
                </div>

                <a href="#contact" class="reveal btn-gradient pulse-shadow inline-block font-display font-semibold text-sm text-white px-6 py-3 rounded-full">
                    Let's Connect
                </a>
            </div>
        </div>
    </section>



</section>

    {{-- ===== SKILLS ===== --}}
    <section id="skills" class="relative max-w-6xl mx-auto px-6 py-24 overflow-hidden" data-reveal-group>
        <div class="blob w-72 h-72 bg-blue-400 -top-16 -left-16"></div>
        <div class="blob w-80 h-80 bg-indigo-400 bottom-0 -right-16"></div>

        <div class="relative reveal text-center mb-16">
            <h2 class="font-display text-3xl font-bold text-gradient mb-3">My Skills</h2>
            <div class="w-16 h-1 bar-gradient mx-auto rounded-full mb-4"></div>
            <p class="text-slate-500 dark:text-slate-400 text-sm max-w-lg mx-auto">
                The tech I master to build seamless, jaw-dropping digital experiences.
            </p>
        </div>

        <div class="relative flex flex-wrap justify-center gap-5">
            @foreach(['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'MySQL', 'Tailwind CSS', 'Git', 'GitHub', 'Python'] as $skill)
                <div class="reveal group w-32 rounded-2xl border border-line-soft dark:border-line bg-white dark:bg-card p-5 flex flex-col items-center text-center hover:-translate-y-1.5 hover:border-primary/50 hover:shadow-lg hover:shadow-primary/10 transition duration-300">
                    <x-skill-icon :name="$skill" class="mb-3 transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-6" />
                    <p class="font-display text-sm font-semibold">{{ $skill }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ===== PROJECTS (DATABASE) ===== --}}
    <section id="projects" class="relative max-w-6xl mx-auto px-6 py-24 overflow-hidden" data-reveal-group>
        <div class="blob w-80 h-80 bg-indigo-400 -top-16 -right-10"></div>
        <div class="blob w-64 h-64 bg-blue-400 bottom-10 -left-16"></div>
        <div class="relative reveal text-center mb-16">
            <h2 class="font-display text-3xl font-bold text-gradient mb-3">My Projects</h2>
            <div class="w-16 h-1 bar-gradient mx-auto rounded-full mb-4"></div>
            <p class="text-slate-500 dark:text-slate-400 text-sm max-w-lg mx-auto">
                Dive into my latest projects that showcase my skills in creating dynamic, user-focused applications.
            </p>
        </div>

        <div class="relative grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($projects as $project)
                <div class="reveal group tilt-card rounded-2xl border border-line-soft dark:border-line bg-white dark:bg-card overflow-hidden hover:border-primary/50">
                    <div class="tilt-glare"></div>
                    @if($project->image)
                        <div class="overflow-hidden">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                 class="w-full h-44 object-cover group-hover:scale-105 transition duration-500">
                        </div>
                    @endif
                    <div class="p-5">
                        <h3 class="font-display font-semibold mb-2">{{ $project->title }}</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mb-4 line-clamp-3">{{ $project->description }}</p>
                        <div class="flex gap-4 text-sm font-medium">
                            @if($project->github_link)
                                <a href="{{ $project->github_link }}" target="_blank" class="text-primary hover:underline">GitHub →</a>
                            @endif
                            @if($project->demo_link)
                                <a href="{{ $project->demo_link }}" target="_blank" class="text-primary hover:underline">Live Demo →</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-slate-400 dark:text-slate-500 text-sm">
                    Belum ada project. Tambahkan lewat halaman admin.
                </p>
            @endforelse
        </div>
    </section>

    {{-- ===== EXPERIENCE ===== --}}
   <section id="experience" class="relative max-w-6xl mx-auto px-6 py-24 overflow-hidden" data-reveal-group>
        <div class="blob w-72 h-72 bg-blue-400 -top-16 -left-16"></div>
        <div class="blob w-64 h-64 bg-indigo-400 bottom-0 -right-10"></div>

        <div class="relative reveal text-center mb-16">
            <h2 class="font-display text-3xl font-bold text-gradient mb-3">Experience</h2>
            <div class="w-16 h-1 bar-gradient mx-auto rounded-full"></div>
        </div>

        <div class="relative max-w-2xl mx-auto space-y-10">

                <div class="reveal flex gap-5">
                <div class="flex flex-col items-center pt-1.5">
                    <span class="w-3 h-3 rounded-full bg-primary shadow shadow-primary/50"></span>
                </div>
                <div class="pb-2">
                    <h3 class="font-display font-semibold">Web Developer</h3>
                    <p class="text-xs text-primary font-medium mb-2">Freelance · 2025 – Sekarang</p>
                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Mengembangkan dan memelihara aplikasi web untuk berbagai klien menggunakan Laravel, Tailwind CSS, dan JavaScript.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== EDUCATION ===== --}}
    <section id="education" class="relative max-w-6xl mx-auto px-6 py-24 overflow-hidden" data-reveal-group>
        <div class="blob w-72 h-72 bg-indigo-400 -top-16 -right-16"></div>
        <div class="blob w-64 h-64 bg-blue-400 bottom-0 -left-10"></div>

        <div class="relative reveal text-center mb-16">
            <h2 class="font-display text-3xl font-bold text-gradient mb-3">Education</h2>
            <div class="w-16 h-1 bar-gradient mx-auto rounded-full"></div>
        </div>

        <div class="relative max-w-2xl mx-auto space-y-10">
            <div class="reveal flex gap-5">
                <div class="flex flex-col items-center pt-1.5">
                    <span class="w-3 h-3 rounded-full bg-primary shadow shadow-primary/50"></span>
                </div>
                <div class="pb-2">
                    <h3 class="font-display font-semibold">Universitas ...</h3>
                    <p class="text-xs text-primary font-medium mb-2">Program Studi Informatika · 2022 – 2026</p>
                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Fokus mempelajari pengembangan perangkat lunak, basis data, dan rekayasa web.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== SERVICES ===== --}}
    <section id="services" class="relative max-w-6xl mx-auto px-6 py-24 overflow-hidden" data-reveal-group>
        <div class="blob w-72 h-72 bg-blue-400 -top-16 -left-10"></div>
        <div class="blob w-64 h-64 bg-indigo-400 bottom-0 -right-16"></div>

        <div class="relative reveal text-center mb-16">
            <h2 class="font-display text-3xl font-bold text-gradient mb-3">Services</h2>
            <div class="w-16 h-1 bar-gradient mx-auto rounded-full"></div>
        </div>

        <div class="relative grid md:grid-cols-3 gap-6">
            @foreach([
                ['title' => 'Web Development', 'desc' => 'Membangun website custom dari nol sesuai kebutuhan bisnis kamu.'],
                ['title' => 'UI/UX Design', 'desc' => 'Merancang antarmuka yang intuitif dan enak digunakan.'],
                ['title' => 'Website Maintenance', 'desc' => 'Perawatan rutin, update konten, dan perbaikan bug.'],
                ['title' => 'Landing Page Development', 'desc' => 'Landing page cepat dan konversi tinggi untuk campaign kamu.'],
            ] as $service)
                <div class="reveal rounded-2xl border border-line-soft dark:border-line bg-white dark:bg-card p-6 hover:-translate-y-1.5 hover:border-primary/50 transition duration-300">
                    <h3 class="font-display font-semibold mb-2">{{ $service['title'] }}</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ $service['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ===== CONTACT ===== --}}
    <section id="contact" class="relative max-w-6xl mx-auto px-6 py-24 overflow-hidden" data-reveal-group>
        <div class="blob w-80 h-80 bg-indigo-400 -top-16 -right-10"></div>
        <div class="blob w-64 h-64 bg-blue-400 bottom-0 -left-16"></div>

        <div class="relative reveal text-center mb-16">
            <h2 class="font-display text-3xl font-bold text-gradient mb-3">Get In Touch</h2>
            <div class="w-16 h-1 bar-gradient mx-auto rounded-full mb-4"></div>
            <p class="text-slate-500 dark:text-slate-400 text-sm max-w-lg mx-auto">
                Have a project in mind or just want to say hi? Fill out the form or reach out directly — I usually reply within a day.
            </p>
        </div>

        <div class="relative grid md:grid-cols-2 gap-14">
            <div class="reveal">
                <h3 class="font-display font-semibold mb-6">Contact Details</h3>
                <div class="space-y-5 mb-8">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Email</p>
                            <p class="font-medium text-sm">yusuffebriantoo95@gmail.com</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-green-500/10 text-green-500 flex items-center justify-center">
                            <x-social-icon platform="whatsapp" class="h-5 w-5" />
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">WhatsApp</p>
                            <p class="font-medium text-sm">
                                <a href="https://wa.me/6283854208733" target="_blank" class="hover:text-primary">0838-5420-8733</a>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-slate-500/10 text-slate-500 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Location</p>
                            <p class="font-medium text-sm">Surakarta, Indonesia</p>
                        </div>
                    </div>
                </div>

                <p class="text-xs uppercase tracking-wide text-slate-400 mb-3">Stay Connected</p>
                <div class="flex items-center gap-3">
                    <a href="https://github.com/USERNAME" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-card flex items-center justify-center text-slate-500 dark:text-slate-300 hover:bg-primary hover:text-white transition">
                        <x-social-icon platform="github" class="h-4 w-4" />
                    </a>
                    <a href="https://linkedin.com/in/USERNAME" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-card flex items-center justify-center text-slate-500 dark:text-slate-300 hover:bg-primary hover:text-white transition">
                        <x-social-icon platform="linkedin" class="h-4 w-4" />
                    </a>
                    <a href="https://instagram.com/USERNAME" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-card flex items-center justify-center text-slate-500 dark:text-slate-300 hover:bg-primary hover:text-white transition">
                        <x-social-icon platform="instagram" class="h-4 w-4" />
                    </a>
                </div>
            </div>

            <div class="reveal">
                <h3 class="font-display font-semibold mb-6">Send a Message</h3>

                @if(session('success'))
                    <div class="bg-primary/10 border border-primary/30 text-primary text-sm rounded-lg px-4 py-3 mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="text-xs text-slate-400 mb-1 block">Name</label>
                        <input type="text" name="name" placeholder="Your name" required
                               class="w-full bg-slate-50 dark:bg-card border border-line-soft dark:border-line rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-primary transition">
                    </div>
                    <div>
                        <label class="text-xs text-slate-400 mb-1 block">Email</label>
                        <input type="email" name="email" placeholder="you@example.com" required
                               class="w-full bg-slate-50 dark:bg-card border border-line-soft dark:border-line rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-primary transition">
                    </div>
                    <div>
                        <label class="text-xs text-slate-400 mb-1 block">Message</label>
                        <textarea name="message" rows="4" placeholder="Tell me about your project..." required
                                  class="w-full bg-slate-50 dark:bg-card border border-line-soft dark:border-line rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-primary transition"></textarea>
                    </div>
                    <button type="submit" class="btn-gradient w-full font-display font-semibold text-white px-6 py-3.5 rounded-full shadow-lg shadow-primary/30">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>

</x-layout>