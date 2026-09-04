@php $p = $project ?? null; @endphp

@if ($errors->any())
    <div class="bg-red-500/10 border border-red-500/30 text-red-400 text-sm rounded-lg px-4 py-3">
        <ul class="list-disc pl-4">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <label class="text-sm text-slate-400 mb-1 block">Judul</label>
    <input type="text" name="title" value="{{ old('title', $p->title ?? '') }}" required
           class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-sm">
</div>
<div>
    <label class="text-sm text-slate-400 mb-1 block">Deskripsi</label>
    <textarea name="description" rows="4"
              class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-sm">{{ old('description', $p->description ?? '') }}</textarea>
</div>
<div>
    <label class="text-sm text-slate-400 mb-1 block">Gambar Project</label>
    @if($p && $p->image)
        <img src="{{ asset('storage/' . $p->image) }}" class="w-40 h-24 object-cover rounded-lg mb-2 border border-white/10">
    @endif
    <input type="file" name="image" accept="image/*"
           class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-sm file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:bg-white file:text-slate-950 file:text-sm">
    <p class="text-xs text-slate-500 mt-1">Maks 2MB. Biarkan kosong kalau tidak ingin mengganti gambar.</p>
</div>
<div>
    <label class="text-sm text-slate-400 mb-1 block">Link GitHub</label>
    <input type="url" name="github_link" value="{{ old('github_link', $p->github_link ?? '') }}"
           class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-sm">
</div>
<div>
    <label class="text-sm text-slate-400 mb-1 block">Link Demo</label>
    <input type="url" name="demo_link" value="{{ old('demo_link', $p->demo_link ?? '') }}"
           class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-sm">
</div>
<div>
    <label class="text-sm text-slate-400 mb-1 block">Status</label>
    <select name="status" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-sm">
        <option value="draft" {{ old('status', $p->status ?? '') === 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ old('status', $p->status ?? '') === 'published' ? 'selected' : '' }}>Published</option>
    </select>
</div>
<div>
    <label class="text-sm text-slate-400 mb-1 block">Urutan</label>
    <input type="number" name="order" value="{{ old('order', $p->order ?? 0) }}"
           class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-sm">
</div>
