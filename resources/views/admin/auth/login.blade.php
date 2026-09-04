<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex items-center justify-center px-6">

    <div class="w-full max-w-sm">
        <h1 class="text-2xl font-bold mb-1">Admin Login</h1>
        <p class="text-slate-400 text-sm mb-8">Masuk untuk mengelola isi website.</p>

        @if ($errors->any())
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 text-sm rounded-lg px-4 py-3 mb-6">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
            @csrf
            <div>
                <label class="text-sm text-slate-400 mb-1 block">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-white/30">
            </div>
            <div>
                <label class="text-sm text-slate-400 mb-1 block">Password</label>
                <input type="password" name="password" required
                       class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-white/30">
            </div>
            <label class="flex items-center gap-2 text-sm text-slate-400">
                <input type="checkbox" name="remember" class="rounded border-white/20 bg-white/5">
                Ingat saya
            </label>
            <button type="submit" class="w-full bg-white text-slate-950 font-medium px-4 py-3 rounded-lg hover:bg-slate-200 transition">
                Masuk
            </button>
        </form>
    </div>

</body>
</html>
