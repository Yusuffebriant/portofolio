<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    // Folder tujuan upload, relatif terhadap public/
    private string $uploadDir = 'images/projects';

    public function index()
    {
        return view('admin.projects.index', [
            'title' => 'Projects',
            'projects' => Project::ordered()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.projects.create', ['title' => 'Tambah Project']);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = Str::slug($request->title) . '-' . Str::random(4);

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request->file('image'));
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', [
            'title' => 'Edit Project',
            'project' => $project,
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $this->deleteImage($project->image);
            $data['image'] = $this->storeImage($request->file('image'));
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $this->deleteImage($project->image);

        $project->delete();

        return back()->with('success', 'Project berhasil dihapus.');
    }

    public function togglePublish(Project $project)
    {
        $project->update([
            'status' => $project->status === 'published' ? 'draft' : 'published',
        ]);

        return back()->with('success', 'Status project diperbarui.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'github_link' => ['nullable', 'url'],
            'demo_link' => ['nullable', 'url'],
            'status' => ['required', 'in:draft,published'],
            'order' => ['nullable', 'integer'],
        ]);
    }

    /**
     * Simpan file gambar langsung ke public/images/projects, tanpa lewat
     * symlink storage. Mengembalikan path relatif (disimpan ke kolom
     * `image` di database), misalnya: images/projects/1710000000_foto.png
     */
    private function storeImage($file): string
    {
        $filename = time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
        $destination = public_path($this->uploadDir);

        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $filename);

        return $this->uploadDir . '/' . $filename;
    }

    /**
     * Hapus file gambar lama dari public/images/projects, kalau ada.
     */
    private function deleteImage(?string $path): void
    {
        if (!$path) {
            return;
        }

        $fullPath = public_path($path);
        if (is_file($fullPath)) {
            unlink($fullPath);
        }
    }
}