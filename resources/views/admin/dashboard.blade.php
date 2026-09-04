<x-admin-layout :title="$title">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($counts as $label => $value)
            <div class="border border-white/10 rounded-2xl p-6">
                <p class="text-slate-400 text-sm mb-1">{{ $label }}</p>
                <p class="text-3xl font-bold">{{ $value }}</p>
            </div>
        @endforeach
    </div>
</x-admin-layout>
