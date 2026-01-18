<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminActivity;

class AdminActivityController extends Controller
{
    // Menampilkan daftar aktivitas admin (misal untuk dashboard)
    public function index()
    {
        $activities = AdminActivity::orderBy('created_at', 'desc')->take(10)->get();
        return view('pages.admin.dashboard', compact('activities'));
    }

    // Menyimpan aktivitas baru (bisa dipanggil dari aksi lain)
    public function store(Request $request)
    {
        $request->validate([
            'activity' => 'required|string|max:255',
        ]);

        AdminActivity::create([
            'activity' => $request->activity,
        ]);

        return redirect()->back()->with('success', 'Activity added!');
    }
}
