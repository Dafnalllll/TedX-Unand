@extends('layouts.app')

@section('title', 'Create Event | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@section('content')
<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-black to-red-900">
    @include('components.sidebar')
    <main class="flex-1 p-8 relative overflow-y-auto h-screen overflow-x-hidden">
        <!-- Decorative Gradient Circles -->
        <div class="absolute right-0 top-0 w-72 h-72 bg-gradient-to-br from-red-500 via-yellow-400 to-transparent opacity-20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute left-1/2 bottom-0 w-64 h-64 bg-gradient-to-tr from-yellow-400 via-red-500 to-transparent opacity-10 rounded-full blur-2xl pointer-events-none"></div>

        <!-- DESKTOP FORM -->
        <div class="hidden md:block text-white max-w-none w-full px-8 lg:px-8">
            <h1 class="text-3xl font-bold mb-6 mt-12 md:mt-0 text-center md:text-left">Create New Event</h1>
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-600 text-white rounded-xl shadow">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="eventFormDesktop" action="{{ route('dashboard.events.event.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-gray-800 p-8 rounded-2xl shadow-2xl max-w-none w-full" novalidate>
                @csrf
                <!-- Semua field desktop tetap seperti semula -->
                <div class="mb-4">
                    <label for="title" class="block text-base font-semibold mb-2 text-red-600">Event Title</label>
                    <input type="text" name="title" id="title" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-red-400 focus:ring-2 focus:ring-red-300 shadow-lg transition-all duration-200 placeholder-gray-400"
                        placeholder="Enter the Event Title" />
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-base font-semibold mb-2 text-red-600">Description</label>
                    <textarea name="description" id="description" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-red-400 focus:ring-2 focus:ring-red-300 shadow-lg transition-all duration-200 placeholder-gray-400"
                        placeholder="Enter the Event Description"></textarea>
                </div>
                <div class="mb-4">
                    <label for="event_date" class="block text-base font-semibold mb-2 text-red-600">Event Date</label>
                    <input type="date" name="event_date" id="event_date" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-red-400 focus:ring-2 focus:ring-red-300 shadow-lg transition-all duration-200 placeholder-gray-400" />
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-base font-semibold mb-2 text-red-600">Location</label>
                    <input type="text" name="location" id="location" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-red-400 focus:ring-2 focus:ring-red-300 shadow-lg transition-all duration-200 placeholder-gray-400"
                        placeholder="Enter the Event Location" />
                </div>
                <div class="mb-4">
                    <label for="photo" class="block text-base font-semibold mb-2 text-red-600">Event Photo</label>
                    <label for="photo" class="flex items-center gap-3 cursor-pointer w-full">
                        <span class="bg-red-600 text-white px-4 py-2 rounded-xl font-semibold shadow hover:bg-red-700 transition-all duration-200 hover:scale-105">
                            Upload Photo
                        </span>
                        <span id="file-name-desktop" class="text-gray-400 text-xs">No file chosen</span>
                        <input type="file" name="photo" id="photo" accept="image/*"
                            class="hidden" onchange="document.getElementById('file-name-desktop').textContent = this.files[0]?.name || 'No file chosen';" />
                    </label>
                </div>
                <div class="mb-4">
                    <label for="event_category_id" class="block text-base font-semibold mb-2 text-red-600">Category</label>
                    <select name="event_category_id" id="event_category_id" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-red-500 focus:ring-2 focus:ring-red-400 shadow-lg transition-all duration-200">
                        <option value="" disabled selected>Choose Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="registration_link" class="block text-base font-semibold mb-2 text-red-600">Registration Link</label>
                    <input type="url" name="registration_link" id="registration_link" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-red-500 focus:ring-2 focus:ring-red-400 shadow-lg transition-all duration-200 placeholder-gray-400"
                        placeholder="Enter registration link (https://...)" />
                </div>
                <div class="mb-4">
                    <label for="speaker_id" class="block text-base font-semibold mb-2 text-red-600">Speaker</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach($speakers as $speaker)
                            <label class="inline-flex items-center bg-gray-700 px-4 py-2 rounded-xl shadow text-white">
                                <input type="checkbox" name="speaker_id[]" value="{{ $speaker->id }}"
                                    class="form-checkbox h-5 w-5 text-red-600">
                                <span class="ml-2">{{ $speaker->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-red-600 via-yellow-400 to-red-600 hover:from-yellow-400 hover:to-red-700 text-black px-6 py-3 rounded-xl font-bold shadow-lg hover:scale-105 transition-all duration-200">
                        <span class="drop-shadow">Create Event</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- MOBILE FORM -->
        <div class="block md:hidden w-full max-w-md mx-auto">
            <div class="bg-white/90 rounded-3xl shadow-2xl border-2 border-red-400 p-4 mt-12 mb-8 relative overflow-hidden">
                <!-- Decorative mobile gradient -->
                <div class="absolute -top-10 -left-10 w-32 h-32 bg-gradient-to-br from-red-500 via-yellow-400 to-transparent opacity-30 rounded-full blur-2xl"></div>
                <div class="absolute bottom-0 right-0 w-24 h-24 bg-gradient-to-tr from-yellow-400 via-red-500 to-transparent opacity-20 rounded-full blur-2xl"></div>
                <h2 class="text-2xl font-extrabold text-red-700 mb-4 text-center drop-shadow">Create Event</h2>
                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-600 text-white rounded-xl shadow text-sm">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="eventFormMobile" action="{{ route('dashboard.events.event.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5" novalidate>
                    @csrf
                    <div>
                        <label for="title" class="block text-sm font-bold mb-1 text-red-600">Event Title</label>
                        <input type="text" name="title" id="title" required
                            class="w-full px-4 py-3 rounded-xl bg-gray-100 text-gray-900 border border-red-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 shadow transition placeholder-gray-400"
                            placeholder="Event Title" />
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-bold mb-1 text-red-600">Description</label>
                        <textarea name="description" id="description" required
                            class="w-full px-4 py-3 rounded-xl bg-gray-100 text-gray-900 border border-red-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 shadow transition placeholder-gray-400"
                            placeholder="Description"></textarea>
                    </div>
                    <div>
                        <label for="event_date" class="block text-sm font-bold mb-1 text-red-600">Event Date</label>
                        <input type="date" name="event_date" id="event_date" required
                            class="w-full px-4 py-3 rounded-xl bg-gray-100 text-gray-900 border border-red-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 shadow transition" />
                    </div>
                    <div>
                        <label for="location" class="block text-sm font-bold mb-1 text-red-600">Location</label>
                        <input type="text" name="location" id="location" required
                            class="w-full px-4 py-3 rounded-xl bg-gray-100 text-gray-900 border border-red-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 shadow transition placeholder-gray-400"
                            placeholder="Location" />
                    </div>
                    <div>
                        <label for="photo" class="block text-sm font-bold mb-1 text-red-600">Event Photo</label>
                        <label for="photo" class="flex items-center gap-3 cursor-pointer w-full">
                            <span class="bg-red-600 text-white px-4 py-2 rounded-xl font-semibold shadow hover:bg-red-700 transition-all duration-200 hover:scale-105">
                                Upload Photo
                            </span>
                            <span id="file-name-mobile" class="text-gray-400 text-xs">No file chosen</span>
                            <input type="file" name="photo" id="photo" accept="image/*"
                                class="hidden" onchange="document.getElementById('file-name-mobile').textContent = this.files[0]?.name || 'No file chosen';" />
                        </label>
                    </div>
                    <div>
                        <label for="event_category_id" class="block text-sm font-bold mb-1 text-red-600">Category</label>
                        <select name="event_category_id" id="event_category_id" required
                            class="w-full px-4 py-3 rounded-xl bg-gray-100 text-gray-900 border border-red-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 shadow transition">
                            <option value="" disabled selected>Choose Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="registration_link" class="block text-sm font-bold mb-1 text-red-600">Registration Link</label>
                        <input type="url" name="registration_link" id="registration_link" required
                            class="w-full px-4 py-3 rounded-xl bg-gray-100 text-gray-900 border border-red-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 shadow transition placeholder-gray-400"
                            placeholder="https://..." />
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1 text-red-600">Speaker</label>
                        <div class="flex flex-wrap gap-2">
                            @foreach($speakers as $speaker)
                                <label class="inline-flex items-center bg-gray-100 px-2 py-1 rounded-xl shadow text-gray-900 border border-red-200">
                                    <input type="checkbox" name="speaker_id[]" value="{{ $speaker->id }}"
                                        class="form-checkbox h-4 w-4 text-red-600">
                                    <span class="ml-2 text-xs">{{ $speaker->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-red-600 via-yellow-400 to-red-600 hover:from-yellow-400 hover:to-red-700 text-black px-4 py-3 rounded-xl font-bold shadow-lg hover:scale-105 transition-all duration-200 text-base">
                        <span class="drop-shadow">Create Event</span>
                    </button>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Desktop validation
    const eventFormDesktop = document.getElementById('eventFormDesktop');
    if (eventFormDesktop) {
        eventFormDesktop.addEventListener('submit', function(e) {
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
    // Mobile validation
    const eventFormMobile = document.getElementById('eventFormMobile');
    if (eventFormMobile) {
        eventFormMobile.addEventListener('submit', function(e) {
            const title = eventFormMobile.querySelector('[name="title"]')?.value.trim();
            const date = eventFormMobile.querySelector('[name="event_date"]')?.value.trim();
            const location = eventFormMobile.querySelector('[name="location"]')?.value.trim();
            const photo = eventFormMobile.querySelector('[name="photo"]')?.files.length;
            const category = eventFormMobile.querySelector('[name="event_category_id"]')?.value;

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
