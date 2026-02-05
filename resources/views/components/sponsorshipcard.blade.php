{{-- filepath: d:\Dafa Code\TedXUnand\resources\views\components\sponsorshipcard.blade.php --}}
@php
    $sponsorships = [
        asset('img/sponsor/htgo.webp'),
        asset('img/sponsor/earnest.webp'),
        asset('img/sponsor/jamkrida.webp'),
        asset('img/sponsor/mfoundation.webp'),
        asset('img/sponsor/semenpadang.webp'),
        asset('img/sponsor/wardah.webp'),
        asset('img/sponsor/pertamina.webp'),
    ];
@endphp

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">

<style>
    .tilt-card {
        transition:
            transform 0.4s cubic-bezier(.25,.8,.25,1),
            filter 0.4s;
        will-change: transform, filter;
    }
    .tilt-card:hover {
        transform: rotateZ(-2deg) scale(1.11) translateY(-12px);
        filter: brightness(1.13) saturate(1.2) drop-shadow(0 0 24px #e62b1e55);
        z-index: 4;
    }

    .sponsor-logo {
        position: absolute;
        transition: transform 0.4s cubic-bezier(.25,.8,.25,1), filter 0.4s;
        will-change: transform, filter;
        pointer-events: auto;
        z-index: 2;
    }
    .sponsor-logo img {
        width: 140px; height: 140px;
        object-fit: contain;
        background: linear-gradient(135deg, #EC9F1E 0%, #ef4444 60%, #1a202c 100%);
        border-radius: 50%;
        padding: 0.8rem;
        transition: box-shadow 0.3s, border 0.3s;
    }
    .sponsor-logo:hover img {
        box-shadow: 0 0 32px #e62b1e77, 0 2px 16px #e62b1e22;
        border: 2px solid #e62b1e;
    }
</style>

<div class="py-8 flex flex-col gap-8 items-center justify-center">
    <div class="flex gap-6 flex-wrap justify-center">
        @foreach([
            asset('img/sponsor/htgo.webp'),
            asset('img/sponsor/earnest.webp'),
            asset('img/sponsor/jamkrida.webp'),
            asset('img/sponsor/wardah.webp'),
            asset('img/sponsor/mfoundation.webp'),
        ] as $idx => $logo)
            <div data-aos="zoom-in" data-aos-delay="{{ 100 + $idx * 100 }}">
                <div class="tilt-card">
                    <img src="{{ $logo }}" alt="Sponsor" class="w-24 h-24 sm:w-36 sm:h-36 object-contain rounded-full bg-gradient-to-br from-yellow-400 via-red-500 to-gray-900 p-2 shadow-lg" />
                </div>
            </div>
        @endforeach
    </div>
    <div class="flex gap-6 flex-wrap justify-center mt-8">
        @foreach([
            asset('img/sponsor/semenpadang.webp'),
            asset('img/sponsor/pertamina.webp'),
            asset('img/sponsor/kopidnt.webp'),
            asset('img/sponsor/maxproject.webp'),
            asset('img/sponsor/azwa.webp'),
        ] as $idx => $logo)
            <div data-aos="zoom-in" data-aos-delay="{{ 600 + $idx * 100 }}">
                <div class="tilt-card">
                    <img src="{{ $logo }}" alt="Sponsor" class="w-24 h-24 sm:w-36 sm:h-36 object-contain rounded-full bg-gradient-to-br from-yellow-400 via-red-500 to-gray-900 p-2 shadow-lg" />
                </div>
            </div>
        @endforeach
    </div>
</div>
