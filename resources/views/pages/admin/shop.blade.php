@extends('layouts.app')

@section('title', 'Shop | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@section('content')
<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-black to-red-900">
    @include('components.sidebar')
    <main class="flex-1 p-8 relative overflow-y-auto h-screen overflow-x-hidden">
        <!-- Decorative Gradient Circles -->
        <div class="absolute right-0 top-0 w-72 h-72 bg-gradient-to-br from-pink-500 via-yellow-400 to-transparent opacity-20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute left-1/2 bottom-0 w-64 h-64 bg-gradient-to-tr from-yellow-400 via-pink-500 to-transparent opacity-10 rounded-full blur-2xl pointer-events-none"></div>

        <div class="text-white">
            <h1 class="text-3xl font-bold mb-6 mt-12 md:mt-0 text-center md:text-left">Shop Management</h1>
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between mb-4">
                <p>Manage your merchandise and ticket sales, track inventory, and view sales statistics.</p>
                <a href="{{ route('dashboard.shop.shop.create') }}" class="bg-pink-400 hover:bg-pink-500 text-black px-6 py-3 rounded-lg font-semibold shadow hover:scale-105 transition-all w-full md:w-auto text-center">Add Items</a>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-pink-400 text-black rounded-xl shadow">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Merchandise Table -->
            <h2 class="text-xl font-semibold mb-2 mt-8">Merchandise</h2>
            <!-- Desktop Table -->
            <div class="hidden md:block overflow-x-auto mb-8">
                <table class="min-w-full bg-gradient-to-br from-red-900 via-black to-gray-900 rounded-lg shadow-lg border-b border-gray-700 text-sm">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-700 text-left font-semibold text-gray-300">Photo</th>
                            <th class="px-6 py-3 border-b border-gray-700 text-left font-semibold text-gray-300">Item</th>
                            <th class="px-6 py-3 border-b border-gray-700 text-left font-semibold text-gray-300">Price</th>
                            <th class="px-6 py-3 border-b border-gray-700 text-left font-semibold text-gray-300">Stock</th>
                            <th class="px-6 py-3 border-b border-gray-700 text-center font-semibold text-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($merchs as $merch)
                        <tr class="hover:bg-gray-700">
                            <td class="px-6 py-4 border-b border-gray-700 text-gray-200">
                                <img src="{{ $merch->photo ? asset('storage/'.$merch->photo) : asset('img/merch/sample-merch.webp') }}"
                                    alt="Merch Photo"
                                    class="w-12 h-12 object-cover rounded cursor-pointer"
                                    onclick="showModal('{{ $merch->photo ? asset('storage/'.$merch->photo) : asset('img/merch/sample-merch.webp') }}')" />
                            </td>
                            <td class="px-6 py-4 border-b border-gray-700 text-gray-200">{{ $merch->item }}</td>
                            <td class="px-6 py-4 border-b border-gray-700 text-gray-200">Rp {{ number_format($merch->price, 2) }}</td>
                            <td class="px-6 py-4 border-b border-gray-700 text-gray-200">{{ $merch->stock }}</td>
                            <td class="px-6 py-4 flex items-center gap-4 justify-center ">
                                <a href="{{ route('dashboard.shop.shop.edit', $merch->id) }}">
                                    <img src="{{ asset('img/admin/edit.webp') }}" alt="Edit" class="w-6 h-6 hover:scale-110 transition-transform mt-3" title="Edit"
                                        style="filter: invert(41%) sepia(99%) saturate(7494%) hue-rotate(185deg) brightness(95%) contrast(101%);" />
                                </a>
                                <button type="button"
                                    onclick="openDeleteModal('{{ route('dashboard.shop.shop.delete', $merch->id) }}', '{{ $merch->item }}')"
                                    style="background: none; border: none; padding: 0;">
                                    <img src="{{ asset('img/admin/delete.webp') }}" alt="Delete" class="w-6 h-6 hover:scale-110 transition-transform mt-3" title="Delete"
                                        style="filter: invert(27%) sepia(99%) saturate(7479%) hue-rotate(-10deg) brightness(95%) contrast(101%);" />
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-400 py-8">No Merchandise Found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile Card Slider -->
            <div class="block md:hidden mb-8">
                <div id="merch-card-container" class="relative">
                    @foreach($merchs as $i => $merch)
                    <div class="merch-card {{ $i === 0 ? '' : 'hidden' }} bg-gradient-to-br from-red-900 via-black to-gray-900 rounded-xl shadow-lg p-6 mb-4 text-white transition-all duration-300">
                        <div class="flex items-center gap-4 mb-4">
                            <img src="{{ $merch->photo ? asset('storage/'.$merch->photo) : asset('img/merch/sample-merch.webp') }}"
                                alt="Merch Photo"
                                class="w-16 h-16 object-cover rounded cursor-pointer"
                                onclick="showModal('{{ $merch->photo ? asset('storage/'.$merch->photo) : asset('img/merch/sample-merch.webp') }}')" />
                            <div>
                                <div class="font-bold text-lg">{{ $merch->item }}</div>
                            </div>
                        </div>
                        <div class="mb-2"><span class="font-semibold">Price:</span> Rp {{ number_format($merch->price, 2) }}</div>
                        <div class="mb-2"><span class="font-semibold">Stock:</span> {{ $merch->stock }}</div>
                        <div class="mt-6 flex items-start gap-4 justify-start">
                            <span class="font-semibold text-gray-200">Actions:</span>
                            <a href="{{ route('dashboard.shop.shop.edit', $merch->id) }}">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 hover:bg-blue-800 transition">
                                    <img src="{{ asset('img/admin/edit.webp') }}" alt="Edit" class="w-4 h-4" title="Edit" />
                                </span>
                            </a>
                            <button type="button"
                                onclick="openDeleteModal('{{ route('dashboard.shop.shop.delete', $merch->id) }}', '{{ $merch->item }}')"
                                style="background: none; border: none; padding: 0;">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-pink-500 hover:bg-pink-700 transition">
                                    <img src="{{ asset('img/admin/delete.webp') }}" alt="Delete" class="w-4 h-4" title="Delete" />
                                </span>
                            </button>
                        </div>
                    </div>
                    @endforeach

                    <!-- Navigation Buttons -->
                    <div class="flex justify-between mt-2">
                        <button id="prevMerch" class="bg-gray-700 text-white px-4 py-2 rounded disabled:opacity-50" disabled>&larr; Back</button>
                        <button id="nextMerch" class="bg-gray-700 text-white px-4 py-2 rounded disabled:opacity-50" {{ count($merchs) <= 1 ? 'disabled' : '' }}>Next &rarr;</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Modal for Image Preview -->
<div id="imgModal" class="fixed inset-0 bg-black bg-opacity-70 items-center justify-center z-50 hidden">
    <span class="absolute top-8 right-10 text-white text-4xl cursor-pointer" onclick="closeModal()">&times;</span>
    <img id="modalImg" src="" class="max-h-[80vh] max-w-[90vw] rounded shadow-lg border-4 border-white" />
</div>

<!-- Modal Delete -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden">
    <div class="bg-gradient-to-br from-gray-900 via-black to-pink-400 rounded-2xl shadow-2xl border-2 border-pink-400 max-w-md w-full p-8 relative">
        <button type="button" onclick="closeDeleteModal()"
            class="absolute top-4 right-4 flex items-center justify-center w-10 h-10 rounded-full border-2 border-pink-400 bg-white text-pink-400 hover:bg-pink-400 hover:text-white text-2xl font-bold focus:outline-none transition-all duration-200">
            &times;
        </button>
        <div class="flex flex-col items-center">
            <div class="p-4 mb-4 flex items-center justify-center">
                <div class="bg-white rounded-full border-2 border-pink-400 p-4 mb-4 shadow-lg flex items-center justify-center">
                    <img src="{{ asset('img/admin/delete.webp') }}" alt="Delete" class="w-12 h-12 object-contain" />
                </div>
            </div>
            <h2 class="text-2xl font-bold text-pink-400 mb-2">Delete Merchandise</h2>
            <p class="mb-6 text-gray-200 text-center">Are you sure you want to delete?<br>
                <span id="deleteMerchName" class="inline-block bg-white text-pink-600 border border-pink-400 rounded px-3 py-1 font-semibold mt-2"></span>
            </p>
            <form id="deleteForm" action="" method="POST" class="w-full flex flex-col gap-3">
                @csrf
                @method('DELETE')
                <div class="flex justify-center gap-4">
                    <button type="button" onclick="closeDeleteModal()" class="px-6 py-2 rounded bg-gray-600 text-white hover:bg-gray-700 hover:scale-105 transition-all">Cancel</button>
                    <button type="submit" class="px-6 py-2 rounded bg-pink-400 text-black hover:bg-pink-500 font-bold shadow transition-all hover:scale-105 ">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function showModal(src) {
        document.getElementById('modalImg').src = src;
        document.getElementById('imgModal').className =
            "fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50";
    }
    function closeModal() {
        document.getElementById('imgModal').className =
            "fixed inset-0 bg-black bg-opacity-70 items-center justify-center z-50 hidden";
        document.getElementById('modalImg').src = '';
    }
    function openDeleteModal(action, merchName) {
        const modal = document.getElementById('deleteModal');
        modal.classList.remove('hidden');
        modal.classList.add('modal-enter');
        setTimeout(() => {
            modal.classList.add('modal-enter-active');
        }, 10);
        document.getElementById('deleteForm').action = action;
        document.getElementById('deleteMerchName').textContent = merchName;
    }
    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.remove('modal-enter-active');
        modal.classList.add('modal-leave');
        setTimeout(() => {
            modal.classList.remove('modal-leave');
            modal.classList.remove('modal-enter');
            modal.classList.add('hidden');
            document.getElementById('deleteForm').action = '';
            document.getElementById('deleteMerchName').textContent = '';
        }, 200);
    }

    // Mobile card slider
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.merch-card');
        let current = 0;
        const prevBtn = document.getElementById('prevMerch');
        const nextBtn = document.getElementById('nextMerch');

        function updateCards() {
            cards.forEach((card, i) => {
                card.classList.toggle('hidden', i !== current);
            });
            prevBtn.disabled = current === 0;
            nextBtn.disabled = current === cards.length - 1;
        }

        prevBtn && prevBtn.addEventListener('click', function() {
            if (current > 0) {
                current--;
                updateCards();
            }
        });

        nextBtn && nextBtn.addEventListener('click', function() {
            if (current < cards.length - 1) {
                current++;
                updateCards();
            }
        });
    });
</script>
@endsection

<style>
    .modal-enter {
        opacity: 0;
        transform: scale(0.95);
        transition: opacity 0.3s cubic-bezier(.4,0,.2,1), transform 0.3s cubic-bezier(.4,0,.2,1);
    }
    .modal-enter-active {
        opacity: 1;
        transform: scale(1);
    }
    .modal-leave {
        opacity: 1;
        transform: scale(1);
        transition: opacity 0.2s cubic-bezier(.4,0,.2,1), transform 0.2s cubic-bezier(.4,0,.2,1);
    }
    .modal-leave-active {
        opacity: 0;
        transform: scale(0.95);
    }
</style>
