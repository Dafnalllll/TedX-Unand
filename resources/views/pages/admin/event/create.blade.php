@extends('layouts.app')

@section('title', 'Create Event | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@section('content')
        <div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-black to-red-900">
            @include('components.sidebar')
            <main class="flex-1 p-8 relative overflow-y-auto h-screen ml-64">
                <!-- Decorative Gradient Circles -->
                <div class="absolute right-0 top-0 w-72 h-72 bg-gradient-to-br from-red-500 via-yellow-400 to-transparent opacity-20 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute left-1/2 bottom-0 w-64 h-64 bg-gradient-to-tr from-yellow-400 via-red-500 to-transparent opacity-10 rounded-full blur-2xl pointer-events-none"></div>
                <div class="text-white max-w-none w-full px-8 lg:px-8">
                    <h1 class="text-3xl font-bold mb-6">Create New Event</h1>
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-600 text-white rounded-xl shadow">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="eventForm" action="{{ route('dashboard.events.event.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-gray-800 p-8 rounded-2xl shadow-2xl max-w-none w-full" novalidate>
                        @csrf
                        <div class="mb-4">
                            <!-- Event Title -->
                            <label for="title" class="block text-base font-semibold mb-2 text-red-600  items-center gap-2">
                                <!-- Heroicon: PencilSquare -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.862 3.487a2.25 2.25 0 113.182 3.182l-9.193 9.193a2.25 2.25 0 01-1.06.592l-3.25.813a.75.75 0 01-.91-.91l.813-3.25a2.25 2.25 0 01.592-1.06l9.193-9.193z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 6.75L17.25 4.5" />
                                </svg>
                                Event Title
                            </label>
                            <input type="text" name="title" id="title" required
                                class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-red-400 focus:ring-2 focus:ring-red-300 shadow-lg transition-all duration-200 placeholder-gray-400"
                                placeholder="Enter the Event Title" />
                        </div>
                        <div class="mb-4">
                            <!-- Description -->
                            <label for="description" class="block text-base font-semibold mb-2 text-red-600  items-center gap-2">
                                <!-- Heroicon: DocumentText -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Description
                            </label>
                            <textarea name="description" id="description" required
                                class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-red-400 focus:ring-2 focus:ring-red-300 shadow-lg transition-all duration-200 placeholder-gray-400"
                                placeholder="Enter the Event Description"></textarea>
                        </div>
                        <div class="mb-4">
                            <!-- Event Date -->
                            <label for="event_date" class="block text-base font-semibold mb-2 text-red-600  items-center gap-2">
                                <!-- Heroicon: CalendarDays -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.75 3v2.25M17.25 3v2.25M3.75 7.5h16.5m-16.5 0v10.125A2.625 2.625 0 006.375 20.25h11.25a2.625 2.625 0 002.625-2.625V7.5m-16.5 0V6.375A2.625 2.625 0 016.375 3.75h11.25a2.625 2.625 0 012.625 2.625V7.5" />
                                </svg>
                                Event Date
                            </label>
                            <input type="date" name="event_date" id="event_date" required
                                class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-red-400 focus:ring-2 focus:ring-red-300 shadow-lg transition-all duration-200 placeholder-gray-400" />
                        </div>
                        <div class="mb-4">
                            <!-- Location -->
                            <label for="location" class="block text-base font-semibold mb-2 text-red-600  items-center gap-2">
                                <!-- Heroicon: MapPin -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21.75c-3.728-3.728-7.5-7.5-7.5-11.25A7.5 7.5 0 0112 3a7.5 7.5 0 017.5 7.5c0 3.75-3.772 7.522-7.5 11.25z" />
                                    <circle cx="12" cy="10.5" r="2.25" />
                                </svg>
                                Location
                            </label>
                            <input type="text" name="location" id="location" required
                                class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-red-400 focus:ring-2 focus:ring-red-300 shadow-lg transition-all duration-200 placeholder-gray-400"
                                placeholder="Enter the Event Location" />
                        </div>
                        <div class="mb-4">
                            <!-- Event Photo -->
                            <label for="photo" class="block text-base font-semibold mb-2 text-red-600  items-center gap-2">
                                <!-- Heroicon: Photo -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7.5A2.25 2.25 0 015.25 5.25h13.5A2.25 2.25 0 0121 7.5v9a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 16.5v-9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16.5l5.25-5.25a2.25 2.25 0 013.182 0l5.25 5.25" />
                                    <circle cx="8.25" cy="8.25" r="1.25" />
                                </svg>
                                Event Photo
                            </label>
                            <label for="photo" class="flex items-center gap-3 cursor-pointer w-full">
                                <span class="bg-red-600 text-white px-5 py-2 rounded-xl font-semibold shadow hover:bg-red-700 transition-all duration-200 hover:scale-105">
                                    Upload Photo
                                </span>
                                <span id="file-name" class="text-gray-400">No file chosen</span>
                                <input type="file" name="photo" id="photo" accept="image/*"
                                    class="hidden" onchange="document.getElementById('file-name').textContent = this.files[0]?.name || 'No file chosen';" />
                            </label>
                        </div>
                        <div class="mb-4">
                            <!-- Category -->
                            <label for="event_category_id" class="block text-base font-semibold mb-2 text-red-600  items-center gap-2">
                                <!-- Heroicon: Tag -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.5 7.5l9 9m0-9l-9 9" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Category
                            </label>
                            <select name="event_category_id" id="event_category_id" required
                                class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-red-500 focus:ring-2 focus:ring-red-400 shadow-lg transition-all duration-200">
                                <option value="" disabled selected>Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <!-- Registration Link -->
                            <label for="registration_link" class="block text-base font-semibold mb-2 text-red-600 items-center gap-2">
                                <!-- Heroicon: Link -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 010 5.656l-3.536 3.536a4 4 0 01-5.656-5.656l1.414-1.414m6.364-6.364a4 4 0 015.656 5.656l-1.414 1.414" />
                                </svg>
                                Registration Link
                            </label>
                            <input type="url" name="registration_link" id="registration_link" required
                                class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-red-500 focus:ring-2 focus:ring-red-400 shadow-lg transition-all duration-200 placeholder-gray-400"
                                placeholder="Enter registration link (https://...)" />
                        </div>
                        <div class="mb-4">
                            <!-- Speaker -->
                            <label for="speaker_id" class="block text-base font-semibold mb-2 text-red-600  items-center gap-2">
                                <!-- Heroicon: User -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Speaker
                            </label>
                            <div class="flex flex-wrap gap-4">
                                @foreach($speakers as $speaker)
                                    <label class="inline-flex items-center bg-gray-700 px-4 py-2 rounded-xl shadow text-white">
                                        <input type="checkbox" name="speaker_id[]" value="{{ $speaker->id }}"
                                            class="form-checkbox h-5 w-5 text-red-600"
                                            {{ (collect(old('speaker_id', isset($event) ? $event->speakers->pluck('id')->toArray() : []))->contains($speaker->id)) ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $speaker->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="mb-4">
                            <!-- Ticket -->
                            <label for="ticket_id" class="block text-base font-semibold mb-2 text-red-600 items-center gap-2">
                                <!-- Modern Ticket Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 24 24" fill="none">
                                    <rect x="3" y="7" width="18" height="10" rx="2" fill="currentColor" opacity="0.15"/>
                                    <rect x="3" y="7" width="18" height="10" rx="2" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M7 12h10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    <circle cx="8.5" cy="12" r="1" fill="currentColor"/>
                                    <circle cx="15.5" cy="12" r="1" fill="currentColor"/>
                                </svg>
                                Ticket
                            </label>
                            <select name="ticket_id" id="ticket_id" required
                                class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-red-500 focus:ring-2 focus:ring-red-400 shadow-lg transition-all duration-200">
                                <option value="" disabled selected>Choose Ticket</option>
                                @foreach($tickets as $ticket)
                                    <option value="{{ $ticket->id }}">{{ $ticket->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="pt-4">
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-red-600 via-yellow-400 to-red-600 hover:from-yellow-400 hover:to-red-700 text-black px-6 py-3 rounded-xl font-bold shadow-lg hover:scale-105 transition-all duration-200">
                                <span class="drop-shadow">Create Event</span>
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const eventForm = document.getElementById('eventForm');
    if (eventForm) {
        eventForm.addEventListener('submit', function(e) {
            const title = document.getElementById('title')?.value.trim();
            const date = document.getElementById('event_date')?.value.trim();
            const location = document.getElementById('location')?.value.trim();
            const photo = document.getElementById('photo')?.files.length;
            const category = document.getElementById('event_category_id')?.value;

            if (!title || !date || !location || !photo || !category) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Incomplete Data',
                    text: 'Please fill in all fields before creating the event!',
                    confirmButtonColor: '#d32f2f'
                });
            }
        });
    }
});
</script>
@endpush
