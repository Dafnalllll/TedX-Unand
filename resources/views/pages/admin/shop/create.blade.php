@extends('layouts.app')

@section('title', 'Create Shop  | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@section('content')
<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-black to-red-900">
    @include('components.sidebar')
    <main class="flex-1 p-8 relative ml-64">
        <!-- Decorative Gradient Circles -->
        <div class="absolute right-0 top-0 w-72 h-72 bg-gradient-to-br from-red-500 via-yellow-400 to-transparent opacity-20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute left-1/2 bottom-0 w-64 h-64 bg-gradient-to-tr from-yellow-400 via-red-500 to-transparent opacity-10 rounded-full blur-2xl pointer-events-none"></div>

        <div class="text-white">
            <h1 class="text-3xl font-bold mb-6">Create Merch</h1>

            <form id="shopForm" action="{{ route('dashboard.shop.shop.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-gray-800 p-6 rounded-lg shadow-lg" novalidate>
                @csrf
                <div>
                    <!-- Category -->
                    <label for="category_id" class="block text-base font-semibold mb-2 text-pink-400 items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <rect x="4" y="4" width="16" height="16" rx="2" stroke="currentColor" stroke-width="2" fill="none"/>
                            <path d="M4 9h16M9 4v16" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        Category
                    </label>
                    <select name="category_id" id="category_id" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-pink-600 focus:ring-2 focus:ring-pink-400 shadow-lg transition-all duration-200"
                        readonly style="pointer-events: none; background-color: #444;">
                        @php
                            $merchCategory = $categories->firstWhere('name', 'Merchandise');
                        @endphp
                        <option value="{{ $merchCategory->id }}" selected>Merchandise</option>
                    </select>
                </div>
                <div>
                    <!-- Shop Item Name -->
                    <label for="item" class="block text-base font-semibold mb-2 text-pink-400 items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M3 11.25V7.5A2.25 2.25 0 015.25 5.25h3.75c.298 0 .583.118.793.329l8.378 8.378a2.25 2.25 0 010 3.182l-4.243 4.243a2.25 2.25 0 01-3.182 0l-8.378-8.378A1.125 1.125 0 013 11.25z" />
                        </svg>
                        Item Name
                    </label>
                    <input type="text" name="item" id="item" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-pink-600 focus:ring-2 focus:ring-pink-400 shadow-lg transition-all duration-200 placeholder-gray-400"
                        placeholder="Enter the Item Name" />
                </div>
                <div>
                    <!-- Stock -->
                    <label for="stock" class="block text-base font-semibold mb-2 text-pink-400 items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7.5V16a2.5 2.5 0 01-2.5 2.5h-11A2.5 2.5 0 014 16V7.5M12 3l8 4.5M12 3L4 7.5M12 3v9.5" />
                        </svg>
                        Stock
                    </label>
                    <input type="number" name="stock" id="stock" required min="0"
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-pink-600 focus:ring-2 focus:ring-pink-400 shadow-lg transition-all duration-200 placeholder-gray-400"
                        placeholder="Enter the Stock" />
                </div>
                <div>
                    <!-- Price -->
                    <label for="price" class="block text-base font-semibold mb-2 text-pink-400 items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-400" fill="none" viewBox="0 0 24 24">
                            <rect x="2" y="7" width="20" height="10" rx="3" fill="currentColor" opacity="0.12"/>
                            <rect x="2" y="7" width="20" height="10" rx="3" stroke="currentColor" stroke-width="1.5"/>
                            <path d="M8 12h8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            <circle cx="12" cy="12" r="2" fill="currentColor"/>
                            <path d="M12 10v4" stroke="#fff" stroke-width="1.2" stroke-linecap="round"/>
                            <path d="M11 13h2" stroke="#fff" stroke-width="1.2" stroke-linecap="round"/>
                        </svg>
                        Price
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-pink-400 font-semibold select-none">Rp</span>
                        <input type="number" name="price" id="price" required min="0"
                            class="w-full pl-12 pr-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-pink-600 focus:ring-2 focus:ring-pink-400 shadow-lg transition-all duration-200 placeholder-gray-400"
                            placeholder="Enter the Price" />
                    </div>
                </div>
                <div>
                    <!-- Shop Item Photo -->
                    <label for="photo" class="block text-base font-semibold mb-2 text-pink-400 items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7.5A2.25 2.25 0 015.25 5.25h13.5A2.25 2.25 0 0121 7.5v9a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 16.5v-9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16.5l5.25-5.25a2.25 2.25 0 013.182 0l5.25 5.25" />
                            <circle cx="8.25" cy="8.25" r="1.25" />
                        </svg>
                        Item Photo
                    </label>
                    <label for="photo" class="flex items-center gap-3 cursor-pointer w-full">
                        <span class="bg-pink-500 text-white px-5 py-2 rounded-xl font-semibold shadow hover:bg-pink-600 transition-all duration-200 hover:scale-105">
                            Upload Photo
                        </span>
                        <span id="file-name" class="text-gray-400">No file chosen</span>
                        <input type="file" name="photo" id="photo" accept="image/*"
                            class="hidden" onchange="document.getElementById('file-name').textContent = this.files[0]?.name || 'No file chosen';" />
                    </label>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-black px-6 py-3 rounded-lg font-semibold shadow hover:scale-105 transition-all">Create Shop Item</button>
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
    const shopForm = document.getElementById('shopForm');
    if (shopForm) {
        shopForm.addEventListener('submit', function(e) {
            const item = document.getElementById('item')?.value.trim();
            const stock = document.getElementById('stock')?.value.trim();
            const price = document.getElementById('price')?.value.trim();
            const photo = document.getElementById('photo')?.files.length;
            const category = document.getElementById('category_id')?.value;

            if (!item || !stock || !price || !photo || !category) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Incomplete Data',
                    text: 'Please fill in all fields before creating the shop item!',
                    confirmButtonColor: '#d32f2f'
                });
            }
        });
    }
});
</script>
@endpush
