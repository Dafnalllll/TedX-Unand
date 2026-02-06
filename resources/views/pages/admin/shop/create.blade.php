@extends('layouts.app')

@section('title', 'Create Shop | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@section('content')
<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-black to-red-900">
    @include('components.sidebar')
    <main class="flex-1 p-8 relative overflow-y-auto h-screen overflow-x-hidden">
        <!-- Decorative Gradient Circles -->
        <div class="absolute right-0 top-0 w-72 h-72 bg-gradient-to-br from-pink-500 via-yellow-400 to-transparent opacity-20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute left-1/2 bottom-0 w-64 h-64 bg-gradient-to-tr from-yellow-400 via-pink-500 to-transparent opacity-10 rounded-full blur-2xl pointer-events-none"></div>

        <!-- DESKTOP FORM -->
        <div class="hidden md:block text-white max-w-none w-full px-8 lg:px-8">
            <h1 class="text-3xl font-bold mb-6 mt-12 md:mt-0 text-center md:text-left">Create Merch</h1>
            @if ($errors->any())
                <div class="mb-4 p-4 bg-pink-600 text-white rounded-xl shadow">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="shopFormDesktop" action="{{ route('dashboard.shop.shop.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-gray-800 p-8 rounded-2xl shadow-2xl max-w-none w-full" novalidate>
                @csrf
                <div class="mb-4">
                    <label for="category_id" class="block text-base font-semibold mb-2 text-pink-400">Category</label>
                    <select name="category_id" id="category_id" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-pink-600 focus:ring-2 focus:ring-pink-400 shadow-lg transition-all duration-200"
                        readonly style="pointer-events: none; background-color: #444;">
                        @php
                            $merchCategory = $categories->firstWhere('name', 'Merchandise');
                        @endphp
                        <option value="{{ $merchCategory->id }}" selected>Merchandise</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="item" class="block text-base font-semibold mb-2 text-pink-400">Item Name</label>
                    <input type="text" name="item" id="item" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-pink-600 focus:ring-2 focus:ring-pink-400 shadow-lg transition-all duration-200 placeholder-gray-400"
                        placeholder="Enter the Item Name" />
                </div>
                <div class="mb-4">
                    <label for="stock" class="block text-base font-semibold mb-2 text-pink-400">Stock</label>
                    <input type="number" name="stock" id="stock" required min="0"
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-pink-600 focus:ring-2 focus:ring-pink-400 shadow-lg transition-all duration-200 placeholder-gray-400"
                        placeholder="Enter the Stock" />
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-base font-semibold mb-2 text-pink-400">Price</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-pink-400 font-semibold select-none">Rp</span>
                        <input type="number" name="price" id="price" required min="0"
                            class="w-full pl-12 pr-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-pink-600 focus:ring-2 focus:ring-pink-400 shadow-lg transition-all duration-200 placeholder-gray-400"
                            placeholder="Enter the Price" />
                    </div>
                </div>
                <div class="mb-4">
                    <label for="photo" class="block text-base font-semibold mb-2 text-pink-400">Item Photo</label>
                    <label for="photo" class="flex items-center gap-3 cursor-pointer w-full">
                        <span class="bg-pink-500 text-white px-5 py-2 rounded-xl font-semibold shadow hover:bg-pink-600 transition-all duration-200 hover:scale-105">
                            Upload Photo
                        </span>
                        <span id="file-name-desktop" class="text-gray-400 text-xs">No file chosen</span>
                        <input type="file" name="photo" id="photo" accept="image/*"
                            class="hidden" onchange="document.getElementById('file-name-desktop').textContent = this.files[0]?.name || 'No file chosen';" />
                    </label>
                </div>
                <div class="pt-4">
                    <div class="flex justify-between items-center w-full">
                        <a href="{{ route('dashboard.shop.shop') }}"
                            class="bg-gray-700 text-white px-6 py-3 rounded-xl font-bold shadow-lg hover:bg-pink-500 transition-all duration-200 flex items-center group hover:scale-105">
                            <span class="mr-2 transition-transform duration-200 group-hover:-translate-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </span>
                            Back to Shop
                        </a>
                        <button type="submit"
                            class="bg-gradient-to-r from-red-600 via-yellow-400 to-red-600 hover:from-yellow-400 hover:to-red-700 text-black px-6 py-3 rounded-xl font-bold shadow-lg hover:scale-105 transition-all duration-200">
                            <span class="drop-shadow">Create Shop</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- MOBILE FORM -->
        <div class="block md:hidden w-full max-w-md mx-auto">
            <div class="bg-white/90 rounded-3xl shadow-2xl border-2 border-pink-400 p-4 mt-12 mb-8 relative overflow-hidden">
                <!-- Decorative mobile gradient -->
                <div class="absolute -top-10 -left-10 w-32 h-32 bg-gradient-to-br from-pink-500 via-yellow-400 to-transparent opacity-30 rounded-full blur-2xl"></div>
                <div class="absolute bottom-0 right-0 w-24 h-24 bg-gradient-to-tr from-yellow-400 via-pink-500 to-transparent opacity-20 rounded-full blur-2xl"></div>
                <h2 class="text-2xl font-extrabold text-pink-700 mb-4 text-center drop-shadow">Create Shop</h2>
                @if ($errors->any())
                    <div class="mb-4 p-3 bg-pink-600 text-white rounded-xl shadow text-sm">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="shopFormMobile" action="{{ route('dashboard.shop.shop.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5" novalidate>
                    @csrf
                    <div>
                        <label for="category_id_mobile" class="block text-sm font-bold mb-1 text-pink-600">Category</label>
                        <select name="category_id" id="category_id_mobile" required
                            class="w-full px-4 py-3 rounded-xl bg-gray-100 text-gray-900 border border-pink-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 shadow transition"
                            readonly style="pointer-events: none; background-color: #eee;">
                            @php
                                $merchCategory = $categories->firstWhere('name', 'Merchandise');
                            @endphp
                            <option value="{{ $merchCategory->id }}" selected>Merchandise</option>
                        </select>
                    </div>
                    <div>
                        <label for="item_mobile" class="block text-sm font-bold mb-1 text-pink-600">Item Name</label>
                        <input type="text" name="item" id="item_mobile" required
                            class="w-full px-4 py-3 rounded-xl bg-gray-100 text-gray-900 border border-pink-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 shadow transition placeholder-gray-400"
                            placeholder="Item Name" />
                    </div>
                    <div>
                        <label for="stock_mobile" class="block text-sm font-bold mb-1 text-pink-600">Stock</label>
                        <input type="number" name="stock" id="stock_mobile" required min="0"
                            class="w-full px-4 py-3 rounded-xl bg-gray-100 text-gray-900 border border-pink-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 shadow transition placeholder-gray-400"
                            placeholder="Stock" />
                    </div>
                    <div>
                        <label for="price_mobile" class="block text-sm font-bold mb-1 text-pink-600">Price</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-pink-400 font-semibold select-none">Rp</span>
                            <input type="number" name="price" id="price_mobile" required min="0"
                                class="w-full pl-12 pr-4 py-3 rounded-xl bg-gray-100 text-gray-900 border border-pink-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 shadow transition placeholder-gray-400"
                                placeholder="Price" />
                        </div>
                    </div>
                    <div>
                        <label for="photo-mobile" class="block text-sm font-bold mb-1 text-pink-600">Item Photo</label>
                        <label for="photo-mobile" class="flex items-center gap-3 cursor-pointer w-full">
                            <span class="bg-pink-500 text-white px-5 py-2 rounded-xl font-semibold shadow hover:bg-pink-600 transition-all duration-200 hover:scale-105 whitespace-nowrap">
                                Upload Photo
                            </span>
                            <span id="file-name-mobile" class="text-gray-400 text-xs">No file chosen</span>
                            <input type="file" name="photo" id="photo-mobile" accept="image/*"
                                class="hidden" onchange="this.parentNode.querySelector('span.text-gray-400').textContent = this.files[0]?.name || 'No file chosen';" />
                        </label>
                    </div>
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-red-600 via-yellow-400 to-red-600 hover:from-yellow-400 hover:to-red-700 text-black px-4 py-3 rounded-xl font-bold shadow-lg hover:scale-105 transition-all duration-200 text-base">
                        <span class="drop-shadow">Create Shop</span>
                    </button>
                    <a href="{{ route('dashboard.shop.shop') }}"
                        class="mt-3 w-full flex items-center justify-center bg-gray-700 text-white px-4 py-3 rounded-xl font-bold shadow-lg hover:bg-pink-500 transition-all duration-200 group">
                        <span class="mr-2 transition-transform duration-200 group-hover:-translate-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </span>
                        Back to Shop
                    </a>
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
    const shopFormDesktop = document.getElementById('shopFormDesktop');
    if (shopFormDesktop) {
        shopFormDesktop.addEventListener('submit', function(e) {
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
    // Mobile validation
    const shopFormMobile = document.getElementById('shopFormMobile');
    if (shopFormMobile) {
        shopFormMobile.addEventListener('submit', function(e) {
            const item = shopFormMobile.querySelector('[name="item"]')?.value.trim();
            const stock = shopFormMobile.querySelector('[name="stock"]')?.value.trim();
            const price = shopFormMobile.querySelector('[name="price"]')?.value.trim();
            const photo = shopFormMobile.querySelector('[name="photo"]')?.files.length;
            const category = shopFormMobile.querySelector('[name="category_id"]')?.value;

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
