@extends('layouts.app')

@section('title', 'Edit Event | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@section('content')
<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-black to-red-900">
    @include('components.sidebar')
    <main class="flex-1 p-8 relative overflow-y-auto h-screen ml-64">
        <!-- ...gradient circles... -->
        <div class="text-white max-w-none w-full px-8 lg:px-8">
            <h1 class="text-3xl font-bold mb-6">Edit Event</h1>
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-600 text-white rounded-xl shadow">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="eventForm" action="{{ route('dashboard.events.event.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-gray-800 p-8 rounded-2xl shadow-2xl max-w-none w-full" novalidate>
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-base font-semibold mb-2 text-red-600">Event Title</label>
                    <input type="text" name="title" id="title" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600"
                        placeholder="Enter the Event Title"
                        value="{{ old('title', $event->title) }}" />
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-base font-semibold mb-2 text-red-600">Description</label>
                    <textarea name="description" id="description" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600"
                        placeholder="Enter the Event Description">{{ old('description', $event->description) }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="event_date" class="block text-base font-semibold mb-2 text-red-600">Event Date</label>
                    <input type="date" name="event_date" id="event_date" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600"
                        value="{{ old('event_date', \Carbon\Carbon::parse($event->event_date)->format('Y-m-d')) }}" />
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-base font-semibold mb-2 text-red-600">Location</label>
                    <input type="text" name="location" id="location" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600"
                        placeholder="Enter the Event Location"
                        value="{{ old('location', $event->location) }}" />
                </div>
                <div class="mb-4">
                    <label for="photo" class="block text-base font-semibold mb-2 text-red-600">Event Photo</label>
                    <input type="file" name="photo" id="photo" class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600" />
                    @if($event->photo)
                        <img src="{{ asset('storage/'.$event->photo) }}" alt="Event Photo" class="w-24 mt-2 rounded" />
                    @endif
                </div>
                <div class="mb-4">
                    <label for="event_category_id" class="block text-base font-semibold mb-2 text-red-600">Category</label>
                    <select name="event_category_id" id="event_category_id" required class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600">
                        <option value="" disabled>Choose Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('event_category_id', $event->event_category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="registration_link" class="block text-base font-semibold mb-2 text-red-600">Registration Link</label>
                    <input type="url" name="registration_link" id="registration_link" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600"
                        placeholder="Enter registration link (https://...)"
                        value="{{ old('registration_link', $event->registration_link) }}" />
                </div>
                <div class="mb-4">
                    <label class="block text-base font-semibold mb-2 text-red-600">Speaker</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach($speakers as $speaker)
                            <label class="inline-flex items-center bg-gray-700 px-4 py-2 rounded-xl shadow text-white">
                                <input type="checkbox" name="speaker_id[]" value="{{ $speaker->id }}"
                                    class="form-checkbox h-5 w-5 text-red-600"
                                    {{ (collect(old('speaker_id', $event->speakers->pluck('id')->toArray() ?? []))->contains($speaker->id)) ? 'checked' : '' }}>
                                <span class="ml-2">{{ $speaker->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-red-600 via-yellow-400 to-red-600 hover:from-yellow-400 hover:to-red-700 text-black px-6 py-3 rounded-xl font-bold shadow-lg hover:scale-105 transition-all duration-200">
                        <span class="drop-shadow">Update Event</span>
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
