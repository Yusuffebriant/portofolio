<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }} — Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-100" x-data="{ sidebarOpen: false }">

    <div class="flex min-h-screen">

        {{-- ===== SIDEBAR ===== --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
               class="fixed md:static inset-y-0 left-0 z-40 w-64 bg-slate-900 border-r border-white/5 p-6 transition-transform md:translate-x-0">
            <p class="font-semibold text-lg mb-8">Admin Panel</p>
            <nav class="space-y-1 text-sm">
                @php
                    $links = [
                        'admin.dashboard' => 'Dashboard',
                        'admin.projects.index' => 'Projects',
                        'admin.messages.index' => 'Messages',
                    ];
                @endphp
                @foreach($links as $route => $label)
                    <a href="{{ route($route) }}"
                       class="block px-3 py-2 rounded-lg {{ request()->routeIs($route.'*') ? 'bg-white text-slate-950 font-medium' : 'text-slate-300 hover:bg-white/5' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>

            <form method="POST" action="{{ route('admin.logout') }}" class="mt-8">
                @csrf
                <button type="submit" class="w-full text-left px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5">
                    Logout
                </button>
            </form>
        </aside>

        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black/50 z-30 md:hidden" style="display:none"></div>

        {{-- ===== MAIN CONTENT ===== --}}
        <div class="flex-1 min-w-0">
            <header class="md:hidden flex items-center justify-between px-6 py-4 border-b border-white/5">
                <span class="font-semibold">Admin Panel</span>
                <button @click="sidebarOpen = !sidebarOpen" class="text-slate-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </header>

            <main class="p-6 md:p-10">
                @if(session('success'))
                    <div class="bg-green-500/10 border border-green-500/30 text-green-400 text-sm rounded-lg px-4 py-3 mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <h1 class="text-2xl font-bold mb-8">{{ $title ?? 'Dashboard' }}</h1>

                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>
