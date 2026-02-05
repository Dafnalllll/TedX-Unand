@extends('layouts.app')

@section('title', 'Event | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">


@section('content')
<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-black to-red-900">
    @include('components.sidebar')
    <main class="flex-1 p-8 relative overflow-y-auto h-screen overflow-x-hidden">
        <!-- Decorative Gradient Circles -->
        <div class="absolute right-0 top-0 w-72 h-72 bg-gradient-to-br from-red-500 via-yellow-400 to-transparent opacity-20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute left-1/2 bottom-0 w-64 h-64 bg-gradient-to-tr from-yellow-400 via-red-500 to-transparent opacity-10 rounded-full blur-2xl pointer-events-none"></div>

        <div class="text-white">
            <h1 class="text-3xl font-bold mb-6 mt-12 md:mt-0 text-center md:text-left">Event Management</h1>
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between mb-4">
                <p>Manage your TEDx events, update details, and monitor registrations.</p>
                <a href="{{ route('dashboard.events.event.create') }}" class="bg-red-600 hover:bg-red-800 text-black px-6 py-3 rounded-lg font-semibold shadow hover:scale-105 transition-all w-full md:w-auto text-center">Add Event</a>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-red-600 text-black rounded-xl shadow">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Event Table -->
            <h2 class="text-xl font-semibold mb-2 mt-8">Events</h2>
            <!-- Desktop Table -->
<div class="hidden md:block overflow-x-auto mb-8">
    <table class="min-w-full bg-gradient-to-br from-red-900 via-black to-gray-900 rounded-lg shadow-lg border-b border-gray-700 text-sm">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b border-gray-700 text-left font-semibold text-gray-300">Photo</th>
                <th class="px-6 py-3 border-b border-gray-700 text-left font-semibold text-gray-300">Event Name</th>
                <th class="px-6 py-3 border-b border-gray-700 text-left font-semibold text-gray-300">Category</th>
                <th class="px-6 py-3 border-b border-gray-700 text-left font-semibold text-gray-300">Date</th>
                <th class="px-6 py-3 border-b border-gray-700 text-left font-semibold text-gray-300">Location</th>
                <th class="px-6 py-3 border-b border-gray-700 text-left font-semibold text-gray-300">Speaker</th>
                <th class="px-6 py-3 border-b border-gray-700 text-left font-semibold text-gray-300 whitespace-nowrap">Register Link</th>
                <th class="px-6 py-3 border-b border-gray-700 text-left font-semibold text-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
            <tr class="hover:bg-gray-700">
                <td class="px-6 py-4 border-b border-gray-700 text-gray-200">
                    <img src="{{ $event->photo ? asset('storage/'.$event->photo) : asset('img/event/sample-event.webp') }}"
                        alt="Event Photo"
                        class="w-12 h-12 object-cover rounded cursor-pointer"
                        onclick="showModal('{{ $event->photo ? asset('storage/'.$event->photo) : asset('img/event/sample-event.webp') }}')" />
                </td>
                <td class="px-6 py-4 border-b border-gray-700 text-gray-200">{{ $event->title }}</td>
                <td class="px-6 py-4 border-b border-gray-700 text-gray-200">{{ $event->eventCategory->name ?? '-' }}</td>
                <td class="px-6 py-4 border-b border-gray-700 text-gray-200">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                <td class="px-6 py-4 border-b border-gray-700 text-gray-200">{{ $event->location }}</td>
                <td class="px-6 py-4 border-b border-gray-700 text-gray-200">{{ $event->speakers ? $event->speakers->pluck('name')->join(', ') : '-' }}</td>
                <td class="px-6 py-4 border-b border-gray-700 text-gray-200 text-center">
                    @if($event->registration_link)
                        <a href="{{ $event->registration_link }}" target="_blank">
                            <img src="{{ asset('img/admin/link.webp') }}" alt="Link"
                                class="w-6 h-6 inline hover:scale-125 transition-transform duration-200"
                                title="Open Link"
                                style="filter: invert(27%) sepia(99%) saturate(7479%) hue-rotate(-10deg) brightness(95%) contrast(101%);" />
                        </a>
                    @else
                        -
                    @endif
                </td>
                <td class="px-6 py-4 flex items-center gap-4">
                    <a href="{{ route('dashboard.events.event.edit', $event->id) }}">
                        <img src="{{ asset('img/admin/edit.webp') }}" alt="Edit" class="w-6 h-6 hover:scale-110 transition-transform mt-4" title="Edit"
                            style="filter: invert(41%) sepia(99%) saturate(7494%) hue-rotate(185deg) brightness(95%) contrast(101%);" />
                    </a>
                    <button type="button"
                        onclick="openDeleteModal('{{ route('dashboard.events.event.delete', $event->id) }}', '{{ $event->title }}')"
                        style="background: none; border: none; padding: 0;">
                        <img src="{{ asset('img/admin/delete.webp') }}" alt="Delete" class="w-6 h-6 hover:scale-110 transition-transform mt-4" title="Delete"
                            style="filter: invert(27%) sepia(99%) saturate(7479%) hue-rotate(-10deg) brightness(95%) contrast(101%);" />
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="px-6 py-6 border-b border-gray-700 text-gray-200 text-center">No Event Found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Mobile Card Slider -->
<div class="block md:hidden mb-8">
    <div id="event-card-container" class="relative">
        @foreach($events as $i => $event)
        <div class="event-card {{ $i === 0 ? '' : 'hidden' }} bg-gradient-to-br from-red-900 via-black to-gray-900 rounded-xl shadow-lg p-6 mb-4 text-white transition-all duration-300">
            <div class="flex items-center gap-4 mb-4">
                <img src="{{ $event->photo ? asset('storage/'.$event->photo) : asset('img/event/sample-event.webp') }}"
                        alt="Event Photo"
                        class="w-16 h-16 object-cover rounded cursor-pointer"
                        onclick="showModal('{{ $event->photo ? asset('storage/'.$event->photo) : asset('img/event/sample-event.webp') }}')" />
                <div>
                    <div class="font-bold text-lg">{{ $event->title }}</div>
                    <div class="text-sm text-gray-300">{{ $event->eventCategory->name ?? '-' }}</div>
                </div>
            </div>
            <div class="mb-2"><span class="font-semibold">Date:</span> {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</div>
            <div class="mb-2"><span class="font-semibold">Location:</span> {{ $event->location }}</div>
            <div class="mb-2"><span class="font-semibold">Speaker:</span> {{ $event->speakers ? $event->speakers->pluck('name')->join(', ') : '-' }}</div>
            <div class="mb-2"><span class="font-semibold">Register Link:</span>
                @if($event->registration_link)
                    <a href="{{ $event->registration_link }}" target="_blank" class="inline-block align-middle ml-2">
                        <img src="{{ asset('img/admin/link.webp') }}" alt="Link" class="w-6 h-6 inline hover:scale-125 transition-transform duration-200" title="Open Link"
                            style="filter: invert(27%) sepia(99%) saturate(7479%) hue-rotate(-10deg) brightness(95%) contrast(101%);" />
                    </a>
                @else
                    -
                @endif
            </div>
            <div class="mt-6 flex items-start gap-4 justify-start">
                <span class="font-semibold text-gray-200">Actions:</span>
                <a href="{{ route('dashboard.events.event.edit', $event->id) }}">
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 hover:bg-blue-800 transition">
                        <img src="{{ asset('img/admin/edit.webp') }}" alt="Edit" class="w-4 h-4" title="Edit" />
                    </span>
                </a>
                <button type="button"
                    onclick="openDeleteModal('{{ route('dashboard.events.event.delete', $event->id) }}', '{{ $event->title }}')"
                    style="background: none; border: none; padding: 0;">
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-600 hover:bg-red-800 transition">
                        <img src="{{ asset('img/admin/delete.webp') }}" alt="Delete" class="w-4 h-4" title="Delete" />
                    </span>
                </button>
            </div>
        </div>
        @endforeach

        <!-- Navigation Buttons -->
        <div class="flex justify-between mt-2">
            <button id="prevEvent" class="bg-gray-700 text-white px-4 py-2 rounded disabled:opacity-50" disabled>&larr; Back</button>
            <button id="nextEvent" class="bg-gray-700 text-white px-4 py-2 rounded disabled:opacity-50" {{ count($events) <= 1 ? 'disabled' : '' }}>Next &rarr;</button>
        </div>
    </div>
</div>
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
    <div class="bg-gradient-to-br from-gray-900 via-black to-red-900 rounded-2xl shadow-2xl border-2 border-red-600 max-w-md w-full p-8 relative">
        <button type="button" onclick="closeDeleteModal()"
            class="absolute top-4 right-4 flex items-center justify-center w-10 h-10 rounded-full border-2 border-red-600 bg-white text-red-600 hover:bg-red-600 hover:text-white text-2xl font-bold focus:outline-none transition-all duration-200">
            &times;
        </button>
        <div class="flex flex-col items-center">
            <div class="p-4 mb-4 flex items-center justify-center">
                <div class="bg-white rounded-full border-2 border-red-600 p-4 mb-4 shadow-lg flex items-center justify-center">
                    <img src="{{ asset('img/admin/delete.webp') }}" alt="Delete" class="w-12 h-12 object-contain" />
                </div>
            </div>
            <h2 class="text-2xl font-bold text-red-500 mb-2">Delete Event</h2>
            <p class="mb-6 text-gray-200 text-center">Are you sure you want to delete ?<br>
                <span id="deleteEventName" class="inline-block bg-white text-red-600 border border-red-600 rounded px-3 py-1 font-semibold mt-2"></span>
            </p>
            <form id="deleteForm" action="" method="POST" class="w-full flex flex-col gap-3">
                @csrf
                @method('DELETE')
                <div class="flex justify-center gap-4">
                    <button type="button" onclick="closeDeleteModal()" class="px-6 py-2 rounded bg-gray-600 text-white hover:bg-gray-700 hover:scale-105 transition-all">Cancel</button>
                    <button type="submit" class="px-6 py-2 rounded bg-red-600 text-white hover:bg-red-800 font-bold shadow transition-all hover:scale-105 ">Delete</button>
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

    // Modal Delete
    function openDeleteModal(action, eventName) {
    const modal = document.getElementById('deleteModal');
    modal.classList.remove('hidden');
    modal.classList.add('modal-enter');
    setTimeout(() => {
        modal.classList.add('modal-enter-active');
    }, 10);
    document.getElementById('deleteForm').action = action;
    document.getElementById('deleteEventName').textContent = eventName;
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
        document.getElementById('deleteEventName').textContent = '';
    }, 200);
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.event-card');
    let current = 0;
    const prevBtn = document.getElementById('prevEvent');
    const nextBtn = document.getElementById('nextEvent');

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
