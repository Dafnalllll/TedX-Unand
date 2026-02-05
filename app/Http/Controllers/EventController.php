<?php

namespace App\Http\Controllers;

use App\Models\Event;
//use App\Models\Ticket;
use App\Models\Speaker;
use Illuminate\Http\Request;
use App\Models\AdminActivity;
use App\Models\EventCategory;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('speakers', 'eventCategory')->orderBy('event_date', 'desc')->get();
        return view('pages.admin.event', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $speakers = Speaker::all();
        $categories = EventCategory::all();
        //$tickets =  Ticket::all();
        return view('pages.admin.event.create', compact('speakers', 'categories'));
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
            'speaker_id' => 'nullable|array',
            'speaker_id.*' => 'exists:speakers,id',
            'event_category_id' => 'required|exists:eventcategories,id',
            //'ticket_id' => 'required|exists:tickets,id',
        ]);

        $data = $request->only([
            'title', 'description', 'event_date', 'location',
            'registration_link', 'event_category_id'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('events', 'public');
        }

        $event = Event::create($data);
        if ($request->filled('speaker_id')) {
            $event->speakers()->sync($request->speaker_id);
        } else {
            $event->speakers()->detach();
        }

        // Tambahkan aktivitas admin
        AdminActivity::create([
            'activity' => 'Event <span style="border:1.5px solid #dc2626; color:#dc2626; background:#fff; border-radius:6px; padding:2px 10px; font-weight:bold; display:inline-block;">' . e($event->title) . '</span> Added Successfully!.'
        ]);

        // if ($request->filled('ticket_name') && $request->filled('ticket_price')) {
        //     Ticket::create([
        //         'name' => $request->ticket_name,
        //         'price' => $request->ticket_price,
        //         'event_id' => $event->id,
        //     ]);
        // }

        return redirect()->route('dashboard.events.event')->with('success', 'Event Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::with('speakers')->findOrFail($id);
        return view('pages.admin.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::with('speakers')->findOrFail($id);
        $speakers = Speaker::all();
        $categories = EventCategory::all();
        return view('pages.admin.event.edit', compact('event', 'speakers', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::with('speakers')->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'photo' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:4096',
            'registration_link' => 'nullable|url',
            'speaker_id' => 'nullable|array',
            'speaker_id.*' => 'exists:speakers,id',
            'event_category_id' => 'required|exists:eventcategories,id',
            //'ticket_id' => 'required|exists:tickets,id',
        ]);

        $data = $request->only([
            'title', 'description', 'event_date', 'location',
            'registration_link', 'event_category_id'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('events', 'public');
        }

        $event->update($data);
        if ($request->filled('speaker_id')) {
            $event->speakers()->sync($request->speaker_id);
        } else {
            $event->speakers()->detach();
        }

        // Tambahkan aktivitas admin
        AdminActivity::create([
            'activity' => 'Event <span style="border:1.5px solid #dc2626; color:#dc2626; background:#fff; border-radius:6px; padding:2px 10px; font-weight:bold; display:inline-block;">' . e($event->title) . '</span> Updated Successfully!.'
        ]);

        return redirect()->route('dashboard.events.event')->with('success', 'Event Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::with('speakers')->findOrFail($id);
        $eventTitle = $event->title;
        $event->delete();

        // Tambahkan aktivitas admin
        AdminActivity::create([
            'activity' => 'Event <span style="border:1.5px solid #dc2626; color:#dc2626; background:#fff; border-radius:6px; padding:2px 10px; font-weight:bold; display:inline-block;">' . e($eventTitle) . '</span> Deleted Successfully!.'
        ]);

        return redirect()->route('dashboard.events.event')->with('success', 'Event Deleted Successfully!');
    }

    public function events()
    {
        $events = Event::with('speakers')->orderBy('event_date', 'desc')->take(5)->get();
        return view('pages.events', compact('events'));
    }

    public function mainEventPage()
    {
        // Ambil event dengan kategori "MainEvent" terbaru
        $mainEvent = Event::with('eventCategory')
            ->whereHas('eventCategory', function ($q) {
                $q->where('name', 'MainEvent');
            })
            ->orderBy('event_date', 'desc')
            ->first();

        return view('pages.mainevent', compact('mainEvent'));
    }


    public function preeventPage()
    {
        // Ambil speaker yang ingin ditampilkan di Card 2
        $speaker = Speaker::find(1); // Ganti 1 dengan ID speaker yang kamu inginkan

        $highlightCard2 = [
            'photo' => $speaker ? 'storage/' . $speaker->photo : '',
            'name' => $speaker ? $speaker->name : '',
            'description' => $speaker ? $speaker->description : '',
        ];

        return view('pages.preevent', compact('highlightCard2'));
    }
}
