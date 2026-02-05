@extends('layouts.app')

@section('title', 'Shop | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@section('content')
<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-black to-red-900">
        @include('components.sidebar')
        <main class="flex-1 p-8 relative overflow-y-auto h-screen">
            <!-- Decorative Gradient Circles -->
            <div class="absolute right-0 top-0 w-72 h-72 bg-gradient-to-br from-red-500 via-yellow-400 to-transparent opacity-20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute left-1/2 bottom-0 w-64 h-64 bg-gradient-to-tr from-yellow-400 via-red-500 to-transparent opacity-10 rounded-full blur-2xl pointer-events-none"></div>

            <div class="text-white">
                <h1 class="text-3xl font-bold mb-6"> Shop Management</h1>
                <div class="flex items-center justify-between mb-4">
                    <p>Manage your merchandise and ticket sales, track inventory, and view sales statistics.</p>

                    {{-- Add Item --}}
                    <a href="{{ route('dashboard.shop.shop.create') }}" class="bg-pink-400 hover:bg-pink-500 text-black px-6 py-3 rounded-lg font-semibold shadow hover:scale-105 transition-all">Add Items</a>
                </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-pink-400 text-black rounded-xl shadow">
                            {{ session('success') }}
                        </div>
                    @endif

                <!-- Merchandise Table -->
                <h2 class="text-xl font-semibold mb-2 mt-8">Merchandise</h2>
                <div class="overflow-x-auto mb-8">
                    <table class="min-w-full bg-gradient-to-br from-red-900 via-black to-gray-900 rounded-lg shadow-lg border-b border-gray-700">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-700 text-left text-sm font-semibold text-gray-300">Photo</th>
                                <th class="px-6 py-3 border-b border-gray-700 text-left text-sm font-semibold text-gray-300">Item</th>
                                <th class="px-6 py-3 border-b border-gray-700 text-left text-sm font-semibold text-gray-300">Price</th>
                                <th class="px-6 py-3 border-b border-gray-700 text-left text-sm font-semibold text-gray-300">Stock</th>
                                <th class="px-6 py-3 border-b border-gray-700 text-center  text-sm font-semibold text-gray-300">Actions</th>
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

                {{-- <!-- Ticket Table -->
                <h2 class="text-xl font-semibold mb-2 mt-8">Ticket</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-gradient-to-br from-red-900 via-black to-gray-900 rounded-lg shadow-lg">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-700 text-left text-sm font-semibold text-gray-300">Event</th>
                                <th class="px-6 py-3 border-b border-gray-700 text-left text-sm font-semibold text-gray-300">Price</th>
                                <th class="px-6 py-3 border-b border-gray-700 text-left text-sm font-semibold text-gray-300">Available</th>
                                <th class="px-6 py-3 border-b border-gray-700 text-left text-sm font-semibold text-gray-300">Sold</th>
                                <th class="px-6 py-3 border-b border-gray-700 text-left text-sm font-semibold text-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tickets as $ticket)
                            <tr class="hover:bg-gray-700">
                                <td class="px-6 py-4 border-b border-gray-700 text-gray-200">{{ $ticket->event_name ?? '-' }}</td>
                                <td class="px-6 py-4 border-b border-gray-700 text-gray-200">${{ number_format($ticket->price, 2) }}</td>
                                <td class="px-6 py-4 border-b border-gray-700 text-gray-200">{{ $ticket->available }}</td>
                                <td class="px-6 py-4 border-b border-gray-700 text-gray-200">{{ $ticket->sold }}</td>
                                <td class="px-6 py-4 border-b border-gray-700 flex items-center gap-4">
                                    <a href="#">
                                        <img src="{{ asset('img/admin/edit.webp') }}" alt="Edit" class="w-6 h-6 hover:scale-110 transition-transform" title="Edit"
                                            style="filter: invert(41%) sepia(99%) saturate(7494%) hue-rotate(185deg) brightness(95%) contrast(101%);" />
                                    </a>
                                    <a href="#">
                                        <img src="{{ asset('img/admin/delete.webp') }}" alt="Delete" class="w-6 h-6 hover:scale-110 transition-transform" title="Delete"
                                            style="filter: invert(27%) sepia(99%) saturate(7479%) hue-rotate(-10deg) brightness(95%) contrast(101%);" />
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-gray-400 py-8">No Ticket Found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> --}}
            </div>
        </main>
</div>

<!-- Modal for Image Preview -->
<div id="imgModal" class="fixed inset-0 bg-black bg-opacity-70  items-center justify-center z-50 hidden">
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
