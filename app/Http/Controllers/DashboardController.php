<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Merch;
use App\Models\Ticket;
use App\Models\Speaker;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Models\AdminActivity;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalEvents = Event::count();
        $totalSpeakers = Speaker::count();
        $totalMerchs = Merch::count();
        $totalTickets = Ticket::count();
        $activities = AdminActivity::orderBy('created_at', 'desc')->take(10)->get();
        $onlineThreshold = now()->subMinutes(5);
        $totalVisitors = Visitor::where('last_activity', '>=', $onlineThreshold)->count();


        return view('pages.admin.dashboard', compact('totalEvents', 'totalSpeakers', 'totalMerchs', 'totalTickets', 'activities', 'totalVisitors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
