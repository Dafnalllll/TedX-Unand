<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Speaker;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('speaker')->get();
        return view('pages.admin.event', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $speakers = Speaker::all();
        return view('pages.admin.event.create', compact('speakers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'photo' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:4096',
            'registration_link' => 'nullable|url',
            'speaker_id' => 'nullable|exists:speakers,id',
            'category' => 'nullable|string|max:100',
            'ticket_price' => 'nullable|numeric|min:0',
        ]);

        $data = $request->only([
            'title', 'description', 'event_date', 'location',
            'registration_link', 'speaker_id', 'category', 'ticket_price'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('events', 'public');
        }

        Event::create($data);

        return redirect()->route('dashboard.events')->with('success', 'Event berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::with('speaker')->findOrFail($id);
        return view('pages.admin.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $speakers = Speaker::all();
        return view('pages.admin.event.edit', compact('event', 'speakers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'photo' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:4096',
            'registration_link' => 'nullable|url',
            'speaker_id' => 'nullable|exists:speakers,id',
            'category' => 'nullable|string|max:100',
            'ticket_price' => 'nullable|numeric|min:0',
        ]);

        $data = $request->only([
            'title', 'description', 'event_date', 'location',
            'registration_link', 'speaker_id', 'category', 'ticket_price'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('dashboard.events')->with('success', 'Event berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('dashboard.events')->with('success', 'Event berhasil dihapus!');
    }
}
