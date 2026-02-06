<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;
use App\Models\AdminActivity;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $speakers = Speaker::orderBy('created_at', 'desc')->get();
        return view('pages.admin.speaker', compact('speakers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.speaker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:4096',
        ]);

        $data = $request->only(['name', 'description']);

        // Handle upload photo jika ada
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('speakers', 'public');
        }

        $speaker = Speaker::create($data);

        // Tambahkan aktivitas admin
        AdminActivity::create([
            'activity' => 'Speaker <span style="border:1.5px solid #fde047; color:#fde047; background:#fff; border-radius:6px; padding:2px 10px; font-weight:bold; display:inline-block;">' . e($speaker->name) . '</span> Added Successfully!.'
        ]);

        return redirect()->route('dashboard.speaker.speaker')->with('success', 'Speaker Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $speaker = Speaker::findOrFail($id);
        return view('pages.admin.speaker.edit', compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $speaker = Speaker::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:4096',
        ]);

        $data = $request->only(['name', 'description', 'photo']);

        // Handle upload photo jika ada
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('speakers', 'public');
        }

        $speaker->update($data);

        // Tambahkan aktivitas admin
        AdminActivity::create([
            'activity' => 'Speaker <span style="border:1.5px solid #fde047; color:#fde047; background:#fff; border-radius:6px; padding:2px 10px; font-weight:bold; display:inline-block;">' . e($speaker->name) . '</span> Updated Successfully!.'
        ]);

        return redirect()->route('dashboard.speaker.speaker')->with('success', 'Speaker Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $speaker = Speaker::findOrFail($id);
        $speakerName = $speaker->name;
        $speaker->delete();

        // Tambahkan aktivitas admin
        AdminActivity::create([
            'activity' => 'Speaker <span style="border:1.5px solid #fde047; color:#fde047; background:#fff; border-radius:6px; padding:2px 10px; font-weight:bold; display:inline-block;">' . e($speakerName) . '</span> Deleted Successfully!.'
        ]);

        return redirect()->route('dashboard.speaker.speaker')->with('success', 'Speaker Deleted Successfully!');
    }
}
