<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('public.home', [
            'projects' => Project::published()->ordered()->get(),
        ]);
    }

    /**
     * Contact form tetap disimpan ke database (fitur ini tidak diminta dihapus,
     * hanya INFORMASI kontak yang ditampilkan yang di-hardcode).
     */
    public function sendMessage(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        Message::create($data);

        return back()->with('success', 'Pesan berhasil dikirim, terima kasih!');
    }
}
