<x-admin-layout :title="$title">
    <div class="space-y-4">
        @forelse($messages as $message)
            <div class="border {{ $message->is_read ? 'border-white/10' : 'border-white/30 bg-white/5' }} rounded-2xl p-5">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="font-medium">{{ $message->name }} <span class="text-slate-500 font-normal">— {{ $message->email }}</span></p>
                        @if($message->subject)
                            <p class="text-sm text-slate-400 mt-1">{{ $message->subject }}</p>
                        @endif
                    </div>
                    @if(!$message->is_read)
                        <span class="text-xs bg-blue-500/20 text-blue-400 px-2 py-1 rounded-full whitespace-nowrap">Belum dibaca</span>
                    @endif
                </div>
                <p class="text-sm text-slate-300 mt-3">{{ $message->message }}</p>
                <div class="flex gap-4 mt-4 text-sm">
                    @if(!$message->is_read)
                        <form method="POST" action="{{ route('admin.messages.read', $message) }}">
                            @csrf
                            <button type="submit" class="text-slate-300 hover:text-white">Tandai dibaca</button>
                        </form>
                    @endif
                    <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Hapus pesan ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-slate-500">Belum ada pesan masuk.</p>
        @endforelse
    </div>
</x-admin-layout>
