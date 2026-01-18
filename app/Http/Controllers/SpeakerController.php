<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $speakers = Speaker::all();
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

        Speaker::create($data);

        return redirect()->route('dashboard.speaker')->with('success', 'Speaker berhasil ditambahkan!');
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

        return redirect()->route('dashboard.speaker')->with('success', 'Speaker berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $speaker = Speaker::findOrFail($id);
        $speaker->delete();

        return redirect()->route('dashboard.speaker')->with('success', 'Speaker berhasil dihapus!');
    }
}
