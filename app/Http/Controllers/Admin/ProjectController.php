<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
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
            $data['image'] = $request->file('image')->store('projects', 'public');
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
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

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
}
