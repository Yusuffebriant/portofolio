<x-admin-layout :title="$title">
    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="space-y-4 max-w-xl">
        @csrf
        @include('admin.projects._form')
        <button type="submit" class="bg-white text-slate-950 font-medium px-6 py-3 rounded-full">Simpan</button>
    </form>
</x-admin-layout>
