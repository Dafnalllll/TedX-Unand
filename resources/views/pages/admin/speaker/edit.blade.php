@extends('layouts.app')

@section('title', 'Edit Speaker | TEDxUniversitas Andalas')
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
            <h1 class="text-3xl font-bold mb-6 mt-12 md:mt-0 text-center md:text-left">Edit Speaker</h1>
            @if ($errors->any())
                <div class="mb-4 p-4 bg-yellow-600 text-black rounded-xl shadow">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="speakerFormDesktop" action="{{ route('dashboard.speaker.speaker.update', $speaker->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-gray-800 p-8 rounded-2xl shadow-2xl max-w-none w-full" novalidate>
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-base font-semibold mb-2 text-yellow-600">Speaker Name</label>
                    <input type="text" name="name" id="name" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600"
                        placeholder="Enter the Speaker Name"
                        value="{{ old('name', $speaker->name) }}" />
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-base font-semibold mb-2 text-yellow-600">Description</label>
                    <textarea name="description" id="description" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600"
                        placeholder="Enter the Speaker Description">{{ old('description', $speaker->description) }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="photo" class="block text-base font-semibold mb-2 text-yellow-600">Speaker Photo</label>
                    <label for="photo" class="flex items-center gap-3 cursor-pointer w-full">
                        <span class="bg-yellow-600 text-white px-4 py-2 rounded-xl font-semibold shadow hover:bg-yellow-700 transition-all duration-200 hover:scale-105">
                            Upload Photo
                        </span>
                        <span id="file-name-desktop" class="text-gray-400 text-xs">
                            {{ $speaker->photo ? basename($speaker->photo) : 'No file chosen' }}
                        </span>
                        <input type="file" name="photo" id="photo" accept="image/*"
                            class="hidden"
                            onchange="document.getElementById('file-name-desktop').textContent = this.files[0]?.name || '{{ $speaker->photo ? basename($speaker->photo) : 'No file chosen' }}';" />
                    </label>
                    @if($speaker->photo)
                        <img src="{{ asset('storage/'.$speaker->photo) }}" alt="Speaker Photo" class="w-24 mt-2 rounded" />
                    @endif
                </div>
                <div class="pt-4">
                    <div class="flex justify-between items-center w-full">
                        <a href="{{ route('dashboard.speaker.speaker') }}"
                            class="bg-gray-700 text-white px-6 py-3 rounded-xl font-bold shadow-lg hover:bg-yellow-400 transition-all duration-200 flex items-center group hover:scale-105">
                            <span class="mr-2 transition-transform duration-200 group-hover:-translate-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </span>
                            Back to Speaker
                        </a>
                        <button type="submit"
                            class="bg-gradient-to-r from-red-600 via-yellow-400 to-red-600 hover:from-yellow-400 hover:to-red-700 text-black px-6 py-3 rounded-xl font-bold shadow-lg hover:scale-105 transition-all duration-200">
                            <span class="drop-shadow">Update Speaker</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- MOBILE FORM -->
        <div class="block md:hidden w-full max-w-md mx-auto">
            <div class="bg-white/90 rounded-3xl shadow-2xl border-2 border-yellow-400 p-4 mt-14 mb-8 relative overflow-hidden">
                <!-- Decorative mobile gradient -->
                <div class="absolute -top-10 -left-10 w-32 h-32 bg-gradient-to-br from-yellow-400 via-red-500 to-transparent opacity-30 rounded-full blur-2xl"></div>
                <div class="absolute bottom-0 right-0 w-24 h-24 bg-gradient-to-tr from-red-500 via-yellow-400 to-transparent opacity-20 rounded-full blur-2xl"></div>
                <h2 class="text-2xl font-extrabold text-yellow-700 mb-4 text-center drop-shadow">Edit Speaker</h2>
                @if ($errors->any())
                    <div class="mb-4 p-3 bg-yellow-600 text-black rounded-xl shadow text-sm">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="speakerFormMobile" action="{{ route('dashboard.speaker.speaker.update', $speaker->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5" novalidate>
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name" class="block text-sm font-bold mb-1 text-yellow-600">Speaker Name</label>
                        <input type="text" name="name" id="name" required
                            class="w-full px-4 py-3 rounded-xl bg-gray-100 text-gray-900 border border-yellow-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 shadow transition placeholder-gray-400"
                            placeholder="Speaker Name"
                            value="{{ old('name', $speaker->name) }}" />
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-bold mb-1 text-yellow-600">Description</label>
                        <textarea name="description" id="description" required
                            class="w-full px-4 py-3 rounded-xl bg-gray-100 text-gray-900 border border-yellow-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 shadow transition placeholder-gray-400"
                            placeholder="Description">{{ old('description', $speaker->description) }}</textarea>
                    </div>
                    <div>
                        <label for="photo" class="block text-sm font-bold mb-1 text-yellow-600">Speaker Photo</label>
                        <label for="photo" class="flex items-center gap-3 cursor-pointer w-full">
                            <span class="bg-yellow-600 text-white px-4 py-2 rounded-xl font-semibold shadow hover:bg-yellow-700 transition-all duration-200 hover:scale-105 whitespace-nowrap">
                                Upload Photo
                            </span>
                            <span id="file-name-mobile" class="text-gray-400 text-xs">
                                {{ $speaker->photo ? basename($speaker->photo) : 'No file chosen' }}
                            </span>
                            <input type="file" name="photo" id="photo" accept="image/*"
                                class="hidden"
                                onchange="document.getElementById('file-name-mobile').textContent = this.files[0]?.name || '{{ $speaker->photo ? basename($speaker->photo) : 'No file chosen' }}';" />
                        </label>
                        @if($speaker->photo)
                            <img src="{{ asset('storage/'.$speaker->photo) }}" alt="Speaker Photo" class="w-24 mt-2 rounded" />
                        @endif
                    </div>
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-red-600 via-yellow-400 to-red-600 hover:from-yellow-400 hover:to-red-700 text-black px-4 py-3 rounded-xl font-bold shadow-lg hover:scale-105 transition-all duration-200 text-base">
                        Update Speaker
                    </button>
                    <a href="{{ route('dashboard.speaker.speaker') }}"
                        class="mt-3 w-full flex items-center justify-center bg-gray-700 text-white px-4 py-3 rounded-xl font-bold shadow-lg hover:bg-yellow-400 transition-all duration-200 group">
                        <span class="mr-2 transition-transform duration-200 group-hover:-translate-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </span>
                        Back to Speaker
                    </a>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection
