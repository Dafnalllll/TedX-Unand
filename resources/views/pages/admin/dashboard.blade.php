@extends('layouts.app')

@section('title', 'Admin | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@section('content')
    <div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-black to-red-900">
        @include('components.sidebar')
        <main class="flex-1 p-8 relative ml-64">
            <!-- Decorative Gradient Circles -->
            <div class="absolute right-0 top-0 w-72 h-72 bg-gradient-to-br from-red-500 via-yellow-400 to-transparent opacity-20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute left-1/2 bottom-0 w-64 h-64 bg-gradient-to-tr from-yellow-400 via-red-500 to-transparent opacity-10 rounded-full blur-2xl pointer-events-none"></div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <div class="relative bg-gradient-to-tr from-red-600 to-red-400 rounded-2xl shadow-2xl p-8 text-white overflow-hidden group hover:scale-105 transition-transform duration-300">
                    <div class="absolute right-4 top-4 opacity-20 group-hover:opacity-40 transition">
                        <img src="{{ asset('img/admin/events.webp') }}" alt="Event Icon" class="w-16 h-16">
                    </div>
                    <div class="text-lg font-semibold mb-2">Total Event</div>
                    <div class="text-4xl font-extrabold tracking-wider drop-shadow">{{ $totalEvents }}</div>
                </div>
                <div class="relative bg-gradient-to-tr from-yellow-500 to-yellow-300 rounded-2xl shadow-2xl p-8 text-white overflow-hidden group hover:scale-105 transition-transform duration-300">
                    <div class="absolute right-4 top-4 opacity-20 group-hover:opacity-40 transition">
                        <img src="{{ asset('img/admin/speaker.webp') }}" alt="Speaker Icon" class="w-16 h-16">
                    </div>
                    <div class="text-lg font-semibold mb-2">Total Speaker</div>
                    <div class="text-4xl font-extrabold tracking-wider drop-shadow">{{ $totalSpeakers }}</div>
                </div>
                {{-- <div class="relative bg-gradient-to-tr from-gray-800 to-gray-600 rounded-2xl shadow-2xl p-8 text-white overflow-hidden group hover:scale-105 transition-transform duration-300">
                    <div class="absolute right-4 top-4 opacity-20 group-hover:opacity-40 transition">
                        <img src="{{ asset('img/admin/ticket.webp') }}" alt="Ticket Icon" class="w-16 h-16">
                    </div>
                    <div class="text-lg font-semibold mb-2">Total Ticket</div>
                    <div class="text-4xl font-extrabold tracking-wider drop-shadow">{{ $totalTickets }}</div>
                </div> --}}
                <!-- Total Merch Sold -->
                <div class="relative bg-gradient-to-tr from-pink-600 to-pink-400 rounded-2xl shadow-2xl p-8 text-white overflow-hidden group hover:scale-105 transition-transform duration-300">
                    <div class="absolute right-4 top-4 opacity-20 group-hover:opacity-40 transition">
                        <img src="{{ asset('img/admin/merchandise.webp') }}" alt="Merch Icon" class="w-16 h-16">
                    </div>
                    <div class="text-lg font-semibold mb-2">Total Merch</div>
                    <div class="text-4xl font-extrabold tracking-wider drop-shadow">{{ $totalMerchs }}</div>
                </div>
                <!-- Total  Visitor -->
                <div class="relative bg-gradient-to-tr from-blue-600 to-blue-400 rounded-2xl shadow-2xl p-8 text-white overflow-hidden group hover:scale-105 transition-transform duration-300">
                    <div class="absolute right-4 top-4 opacity-20 group-hover:opacity-40 transition">
                        <img src="{{ asset('img/admin/visitor.webp') }}" alt="Visitor Icon" class="w-16 h-16">
                    </div>
                    <div class="text-lg font-semibold mb-2">Total Visitor</div>
                    <div class="text-4xl font-extrabold tracking-wider drop-shadow">{{ $totalVisitors }}</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-white mb-4">Quick Actions</h2>
                <div class="flex gap-4">
                    <a href="{{ route('dashboard.events.event.create') }}" class="bg-red-600 hover:bg-red-800 text-black px-6 py-3 rounded-lg font-semibold shadow hover:scale-105 transition-all">Add Event</a>
                    <a href="{{ route('dashboard.shop.shop.create') }}" class="bg-pink-400 hover:bg-pink-500 text-black px-6 py-3 rounded-lg font-semibold shadow hover:scale-105 transition-all">Add Shop</a>
                    <a href="{{ route('dashboard.speaker.speaker.create') }}" class="bg-yellow-300 hover:bg-yellow-500 text-black px-6 py-3 rounded-lg font-semibold shadow hover:scale-105 transition-all">Add Speaker</a>
                </div>
            </div>

            <!-- Recent Admin Activities -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-white mb-4">Recent Admin Activities</h2>
                <div class="bg-gray-800 rounded-xl shadow-lg p-6">
                    <ul>
                        @forelse($activities as $activity)
                            <li class="mb-2 text-white">
                                [{{ \Illuminate\Support\Carbon::parse($activity->created_at)->format('Y-m-d') }}] {!! $activity->activity !!}
                            </li>
                        @empty
                            <li class="text-gray-400">No Activities Yet.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </main>
    </div>
@endsection
