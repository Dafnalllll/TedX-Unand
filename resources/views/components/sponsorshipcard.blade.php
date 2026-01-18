{{-- filepath: d:\Dafa Code\TedXUnand\resources\views\components\sponsorshipcard.blade.php --}}
@php
    $sponsorships = [
        [
            'logo' => asset('img/sponsor/htgo.webp'),
        ],
        [
            'logo' => asset('img/sponsor/earnest.webp'),
        ],
    ];
@endphp

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">

<style>
    .tilt-card {
        transition:
            transform 0.4s cubic-bezier(.25,.8,.25,1),
            box-shadow 0.4s,
            filter 0.4s;
        will-change: transform, filter;
    }
    .tilt-card:hover {
        transform: rotateZ(-2deg) scale(1.06) translateY(-10px);
        filter: brightness(1.07) saturate(1.2);
        animation: floaty 1.6s ease-in-out infinite alternate;
    }
    @keyframes floaty {
        0% { transform: rotateZ(-2deg) scale(1.06) translateY(-10px);}
        100% { transform: rotateZ(2deg) scale(1.08) translateY(-18px);}
    }
</style>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-8 p-6 justify-center">
    @foreach($sponsorships as $i => $sponsor)
        <div
            data-aos="zoom-in-up"
            data-aos-delay="{{ 100 * $i }}"
            class="w-full h-full flex justify-center"
        >
            <div
                class="tilt-card relative p-8 flex flex-col items-center overflow-hidden min-h-[220px] justify-center"
            >
                <img src="{{ $sponsor['logo'] }}" alt="Sponsorship Logo"
                    class="w-40 h-40 mb-6 object-contain">
            </div>
        </div>
    @endforeach
</div>
