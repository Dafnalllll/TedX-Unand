@extends('layouts.app')

@section('title', 'Edit Shop | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@section('content')
<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-black to-red-900">
    @include('components.sidebar')
    <main class="flex-1 p-8 relative ml-64">
        <!-- Decorative Gradient Circles -->
        <div class="absolute right-0 top-0 w-72 h-72 bg-gradient-to-br from-red-500 via-yellow-400 to-transparent opacity-20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute left-1/2 bottom-0 w-64 h-64 bg-gradient-to-tr from-yellow-400 via-red-500 to-transparent opacity-10 rounded-full blur-2xl pointer-events-none"></div>

        <div class="text-white">
            <h1 class="text-3xl font-bold mb-6">Edit Merch</h1>

            <form id="shopForm" action="{{ route('dashboard.shop.shop.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-gray-800 p-6 rounded-lg shadow-lg" novalidate>
                @csrf
                @method('PUT')
                <div>
                    <!-- Category -->
                    <label for="category_id" class="block text-base font-semibold mb-2 text-pink-400 items-center gap-2">
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
                        Item Name
                    </label>
                    <input type="text" name="item" id="item" required
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-pink-600 focus:ring-2 focus:ring-pink-400 shadow-lg transition-all duration-200 placeholder-gray-400"
                        placeholder="Enter the Item Name"
                        value="{{ old('item', $item->item) }}" />
                </div>
                <div>
                    <!-- Stock -->
                    <label for="stock" class="block text-base font-semibold mb-2 text-pink-400 items-center gap-2">
                        Stock
                    </label>
                    <input type="number" name="stock" id="stock" required min="0"
                        class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-pink-600 focus:ring-2 focus:ring-pink-400 shadow-lg transition-all duration-200 placeholder-gray-400"
                        placeholder="Enter the Stock"
                        value="{{ old('stock', $item->stock) }}" />
                </div>
                <div>
                    <!-- Price -->
                    <label for="price" class="block text-base font-semibold mb-2 text-pink-400 items-center gap-2">
                        Price
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-pink-400 font-semibold select-none">Rp</span>
                        <input type="number" name="price" id="price" required min="0"
                            class="w-full pl-12 pr-5 py-3 rounded-xl bg-gray-700 text-white border-2 border-gray-600 focus:border-pink-600 focus:ring-2 focus:ring-pink-400 shadow-lg transition-all duration-200 placeholder-gray-400"
                            placeholder="Enter the Price"
                            value="{{ old('price', $item->price) }}" />
                    </div>
                </div>
                <div>
                    <!-- Shop Item Photo -->
                    <label for="photo" class="block text-base font-semibold mb-2 text-pink-400 items-center gap-2">
                        Item Photo
                    </label>
                    <label for="photo" class="flex items-center gap-3 cursor-pointer w-full">
                        <span class="bg-pink-500 text-white px-5 py-2 rounded-xl font-semibold shadow hover:bg-pink-600 transition-all duration-200 hover:scale-105">
                            Upload Photo
                        </span>
                        <span id="file-name" class="text-gray-400">
                            {{ $item->photo ? basename($item->photo) : 'No file chosen' }}
                        </span>
                        <input type="file" name="photo" id="photo" accept="image/*"
                            class="hidden"
                            onchange="document.getElementById('file-name').textContent = this.files[0]?.name || '{{ $item->photo ? basename($item->photo) : 'No file chosen' }}';" />
                    </label>
                    @if($item->photo)
                        <img src="{{ asset('storage/'.$item->photo) }}" alt="Merch Photo" class="w-24 mt-2 rounded" />
                    @endif
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-black px-6 py-3 rounded-lg font-semibold shadow hover:scale-105 transition-all">Update Shop Item</button>
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
            const category = document.getElementById('category_id')?.value;
            // Photo tidak wajib saat edit
            if (!item || !stock || !price || !category) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Incomplete Data',
                    text: 'Please fill in all fields before updating the shop item!',
                    confirmButtonColor: '#d32f2f'
                });
            }
        });
    }
});
</script>
@endpush
