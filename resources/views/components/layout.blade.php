<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yusuf Febrianto — Web Developer</title>
    <meta name="description" content="Portfolio Yusuf Febrianto, Web Developer yang suka membangun produk digital.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        (function () {
            const saved = localStorage.getItem('theme');
            document.documentElement.classList.toggle('dark', saved ? saved === 'dark' : true);
        })();
    </script>
</head>
<body class="bg-navy-light text-slate-800 dark:bg-navy dark:text-slate-200 antialiased selection:bg-primary selection:text-white" x-data="{ mobileOpen: false }">

    {{-- ===== NAVBAR ===== --}}
    <header class="fixed top-0 inset-x-0 z-50 backdrop-blur-md bg-white/70 dark:bg-navy/70 border-b border-line-soft dark:border-line">
        <nav class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="#home" class="font-display text-xl font-bold text-gradient">
                Yusuf Febrianto
            </a>

            <ul id="nav-links" class="relative hidden md:flex items-center gap-1 text-sm font-medium">
                <div id="nav-indicator"></div>
                <li><a href="#home" data-nav="home" class="nav-link px-4 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:text-primary transition-colors">Home</a></li>
                <li><a href="#about" data-nav="about" class="nav-link px-4 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:text-primary transition-colors">About</a></li>
                <li><a href="#skills" data-nav="skills" class="nav-link px-4 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:text-primary transition-colors">Skills</a></li>
                <li><a href="#projects" data-nav="projects" class="nav-link px-4 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:text-primary transition-colors">Projects</a></li>
                <li><a href="#experience" data-nav="experience" class="nav-link px-4 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:text-primary transition-colors">Experience</a></li>
                <li><a href="#contact" data-nav="contact" class="nav-link px-4 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:text-primary transition-colors">Contact</a></li>
            </ul>

            <div class="flex items-center gap-3">
                <button onclick="toggleTheme()" class="text-slate-500 dark:text-slate-400 hover:text-primary transition" aria-label="Toggle theme">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </button>

                <button @click="mobileOpen = !mobileOpen" class="md:hidden text-slate-600 dark:text-slate-200">
                    <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display:none">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </nav>

        <div x-show="mobileOpen" x-transition class="md:hidden px-6 pb-5 space-y-3 text-sm font-medium" style="display:none">
            <a @click="mobileOpen=false" href="#home" class="block text-slate-600 dark:text-slate-300">Home</a>
            <a @click="mobileOpen=false" href="#about" class="block text-slate-600 dark:text-slate-300">About</a>
            <a @click="mobileOpen=false" href="#skills" class="block text-slate-600 dark:text-slate-300">Skills</a>
            <a @click="mobileOpen=false" href="#projects" class="block text-slate-600 dark:text-slate-300">Projects</a>
            <a @click="mobileOpen=false" href="#experience" class="block text-slate-600 dark:text-slate-300">Experience</a>
            <a @click="mobileOpen=false" href="#contact" class="block text-slate-600 dark:text-slate-300">Contact</a>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="border-t border-line-soft dark:border-line pt-14 pb-8">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6 pb-8">
                <div>
                    <p class="font-display text-xl font-bold text-gradient mb-2">Yusuf Febrianto</p>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Turning ideas into digital realities.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="https://github.com/USERNAME" target="_blank"
                       class="w-10 h-10 rounded-full bg-slate-100 dark:bg-card flex items-center justify-center text-slate-500 dark:text-slate-300 hover:bg-primary hover:text-white transition">
                        <x-social-icon platform="github" class="h-4 w-4" />
                    </a>
                    <a href="https://linkedin.com/in/USERNAME" target="_blank"
                       class="w-10 h-10 rounded-full bg-slate-100 dark:bg-card flex items-center justify-center text-slate-500 dark:text-slate-300 hover:bg-primary hover:text-white transition">
                        <x-social-icon platform="linkedin" class="h-4 w-4" />
                    </a>
                    <a href="https://instagram.com/USERNAME" target="_blank"
                       class="w-10 h-10 rounded-full bg-slate-100 dark:bg-card flex items-center justify-center text-slate-500 dark:text-slate-300 hover:bg-primary hover:text-white transition">
                        <x-social-icon platform="instagram" class="h-4 w-4" />
                    </a>
                </div>
            </div>

            <div class="border-t border-line-soft dark:border-line pt-6 flex flex-col md:flex-row items-center justify-between gap-3 text-xs text-slate-500 dark:text-slate-500">
                <p>&copy; {{ date('Y') }} Yusuf Febrianto. All rights reserved.</p>
                <div class="flex items-center gap-5">
                    <a href="#" class="hover:text-primary transition">Privacy Policy</a>
                    <a href="#" class="hover:text-primary transition">Terms of Service</a>
                    <a href="#home" class="hover:text-primary transition">Back to Top ↑</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>