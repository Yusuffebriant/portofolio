<x-admin-layout :title="$title">
    <a href="{{ route('admin.projects.create') }}" class="inline-block bg-white text-slate-950 text-sm font-medium px-4 py-2 rounded-full mb-6">
        + Tambah Project
    </a>

    <div class="border border-white/10 rounded-2xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-white/5 text-slate-400 text-left">
                <tr>
                    <th class="px-5 py-3">Judul</th>
                    <th class="px-5 py-3">Status</th>
                    <th class="px-5 py-3">Urutan</th>
                    <th class="px-5 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($projects as $project)
                    <tr>
                        <td class="px-5 py-3 font-medium">{{ $project->title }}</td>
                        <td class="px-5 py-3">
                            <form method="POST" action="{{ route('admin.projects.toggle', $project) }}">
                                @csrf
                                <button type="submit" class="px-2 py-1 rounded-full text-xs {{ $project->status === 'published' ? 'bg-green-500/20 text-green-400' : 'bg-slate-500/20 text-slate-400' }}">
                                    {{ $project->status }}
                                </button>
                            </form>
                        </td>
                        <td class="px-5 py-3 text-slate-400">{{ $project->order }}</td>
                        <td class="px-5 py-3 text-right space-x-3">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="text-slate-300 hover:text-white">Edit</a>
                            <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="inline" onsubmit="return confirm('Hapus project ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-5 py-6 text-center text-slate-500">Belum ada project.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
