@extends('layouts.app')

@section('title', 'Create Speaker | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@section('content')
<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-black to-red-900">
    @include('components.sidebar')
    <main class="flex-1 p-8 relative ml-64">
        <!-- Decorative Gradient Circles -->
        <div class="absolute right-0 top-0 w-72 h-72 bg-gradient-to-br from-red-500 via-yellow-400 to-transparent opacity-20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute left-1/2 bottom-0 w-64 h-64 bg-gradient-to-tr from-yellow-400 via-red-500 to-transparent opacity-10 rounded-full blur-2xl pointer-events-none"></div>

        <div class="text-white">
            <h1 class="text-3xl font-bold mb-6">Create New Speaker</h1>

            <form id="speakerForm" action="{{ route('dashboard.speaker.speaker.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-gray-800 p-6 rounded-lg shadow-lg" novalidate>
                @csrf
                <div>
                    <!-- Speaker Name -->
                            <label for="name" class="block text-base font-semibold mb-2 text-yellow-600  items-center gap-2">
                                <!-- Heroicon: PencilSquare -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.862 3.487a2.25 2.25 0 113.182 3.182l-9.193 9.193a2.25 2.25 0 01-1.06.592l-3.25.813a.75.75 0 01-.91-.91l.813-3.25a2.25 2.25 0 01.592-1.06l9.193-9.193z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 6.75L17.25 4.5" />
                                </svg>
                                Speaker Name
                            </label>
                            <input type="text" name="name" id="name" required
                                class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-yellow-600 focus:ring-2 focus:ring-yellow-400 shadow-lg transition-all duration-200 placeholder-gray-400"
                                placeholder="Enter the Speaker Name" />
                </div>
                <div>
                    <!-- Description -->
                            <label for="description" class="block text-base font-semibold mb-2 text-yellow-600  items-center gap-2">
                                <!-- Heroicon: DocumentText -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Description
                            </label>
                            <textarea name="description" id="description" required
                                class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-yellow-600 focus:ring-2 focus:ring-yellow-400 shadow-lg transition-all duration-200 placeholder-gray-400"
                                placeholder="Enter the Speaker Description"></textarea>
                </div>
                <div>
                    <label for="photo" class="block text-base font-semibold mb-2 text-yellow-600  items-center gap-2">
                                <!-- Heroicon: Photo -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7.5A2.25 2.25 0 015.25 5.25h13.5A2.25 2.25 0 0121 7.5v9a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 16.5v-9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16.5l5.25-5.25a2.25 2.25 0 013.182 0l5.25 5.25" />
                                    <circle cx="8.25" cy="8.25" r="1.25" />
                                </svg>
                                Speaker Photo
                            </label>
                    <label for="photo" class="flex items-center gap-3 cursor-pointer w-full">
                                <span class="bg-yellow-600 text-white px-5 py-2 rounded-xl font-semibold shadow hover:bg-yellow-700 transition-all duration-200 hover:scale-105">
                                    Upload Photo
                                </span>
                                <span id="file-name" class="text-gray-400">No file chosen</span>
                                <input type="file" name="photo" id="photo" accept="image/*"
                                    class="hidden" onchange="document.getElementById('file-name').textContent = this.files[0]?.name || 'No file chosen';" />
                            </label>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-yellow-300 hover:bg-yellow-500 text-black px-6 py-3 rounded-lg font-semibold shadow hover:scale-105 transition-all">Create Speaker</button>
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
    const speakerForm = document.querySelector('form[action="{{ route('dashboard.speaker.speaker.store') }}"]');
    if (speakerForm) {
        speakerForm.addEventListener('submit', function(e) {
            const name = document.getElementById('name')?.value.trim();
            const description = document.getElementById('description')?.value.trim();
            const photo = document.getElementById('photo')?.files.length;

            if (!name || !description || !photo) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Incomplete Data',
                    text: 'Please fill in all fields before creating the speaker!',
                    confirmButtonColor: '#d32f2f'
                });
            }
        });
    }
});
</script>
@endpush
