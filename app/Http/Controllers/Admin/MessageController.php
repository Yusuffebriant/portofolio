<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin.messages.index', [
            'title' => 'Messages',
            'messages' => Message::latest()->get(),
        ]);
    }

    public function markRead(Message $message)
    {
        $message->update(['is_read' => true]);
        return back()->with('success', 'Pesan ditandai sudah dibaca.');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}
