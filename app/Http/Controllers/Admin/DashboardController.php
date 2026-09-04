<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'counts' => [
                'Total Projects' => Project::count(),
                'Published Projects' => Project::where('status', 'published')->count(),
                'Unread Messages' => Message::where('is_read', false)->count(),
            ],
        ]);
    }
}
