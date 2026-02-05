@extends('layouts.app')

@section('title', 'Event | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center relative overflow-x-hidden"
        style="background: url('{{ asset('img/event1.webp') }}') center center / cover no-repeat; background-attachment: fixed;">
    <div class="absolute inset-0 bg-black bg-opacity-60 z-0"></div>
    <div class="relative z-10 w-full max-w-5xl mx-auto p-8 "
            data-aos="fade-up" data-aos-duration="1000">
        <!-- OUR EVENTS Judul -->
        <div class="flex flex-col items-center gap-2 md:gap-4 mt-[4rem] -mr-[1rem]">
            <svg width="600" height="140" viewBox="0 0 600 140" fill="none" xmlns="http://www.w3.org/2000/svg" style="max-width:100%; position:relative;">
                <defs>
                    <linearGradient id="tedx-gradient" x1="0" y1="0" x2="600" y2="0" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#F53003"/>
                        <stop offset="0.5" stop-color="#fef08a"/>
                        <stop offset="1" stop-color="#F53003"/>
                    </linearGradient>
                    <!-- Perbesar path -->
                    <path id="curve" d="M20,120 Q300,-10 580,120" />
                </defs>
                <text width="600">
                    <textPath href="#curve" startOffset="50%" text-anchor="middle"
                        font-size="36"
                        font-family="'Bebas Neue', 'Montserrat', Arial, sans-serif"
                        fill="url(#tedx-gradient)"
                        font-weight="bold"
                        letter-spacing="2"
                        style="text-shadow:0 2px 16px #F5300340;">
                        OUR EVENTS
                    </textPath>
                </text>
            </svg>
        </div>

            <x-eventscard :events="$events" />
    </div>
</div>

<!-- Animated TEDx X background, multiple spots -->
<div style="
    position: fixed;
    left: 15%; top: 20%;
    width: 220px; height: 220px;
    transform: translate(-50%, -50%);
    opacity: 0.10;
    z-index: 0;
    pointer-events: none;
    user-select: none;
    background: url('{{ asset('img/tedunand.webp') }}') center center / contain no-repeat;
    animation: tedx-spin 60s linear infinite;
"></div>
<div style="
    position: fixed;
    left: 80%; top: 25%;
    width: 160px; height: 160px;
    transform: translate(-50%, -50%);
    opacity: 0.08;
    z-index: 0;
    pointer-events: none;
    user-select: none;
    background: url('{{ asset('img/tedunand.webp') }}') center center / contain no-repeat;
    animation: tedx-spin-rev 80s linear infinite;
"></div>
<div style="
    position: fixed;
    left: 30%; top: 75%;
    width: 120px; height: 120px;
    transform: translate(-50%, -50%);
    opacity: 0.12;
    z-index: 0;
    pointer-events: none;
    user-select: none;
    background: url('{{ asset('img/tedunand.webp') }}') center center / contain no-repeat;
    animation: tedx-spin 50s linear infinite;
"></div>
<div style="
    position: fixed;
    left: 70%; top: 70%;
    width: 180px; height: 180px;
    transform: translate(-50%, -50%);
    opacity: 0.09;
    z-index: 0;
    pointer-events: none;
    user-select: none;
    background: url('{{ asset('img/tedunand.webp') }}') center center / contain no-repeat;
    animation: tedx-spin-rev 70s linear infinite;
"></div>
<div style="
    position: fixed;
    left: 50%; top: 50%;
    width: 480px; height: 480px;
    transform: translate(-50%, -50%);
    opacity: 0.08;
    z-index: 0;
    pointer-events: none;
    user-select: none;
    background: url('{{ asset('img/tedunand.webp') }}') center center / contain no-repeat;
    animation: tedx-spin 40s linear infinite;
"></div>

<div id="cursor-anim-bg" style="position:fixed; inset:0; pointer-events:none; z-index:1;"></div>



@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
const cursorBg = document.getElementById('cursor-anim-bg');
document.addEventListener('mousemove', function(e) {
    cursorBg.innerHTML = `
        <div style="
            position: fixed;
            left: ${e.clientX - 100}px;
            top: ${e.clientY - 100}px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(245,48,3,0.25) 0%, rgba(245,48,3,0.08) 70%, transparent 100%);
            pointer-events: none;
            transition: left 0.1s, top 0.1s;
            filter: blur(8px);
            z-index: 1;
        "></div>
    `;
});
</script>
@endpush
<style>
@keyframes tedx-spin {
    0% { transform: translate(-50%, -50%) rotate(0deg);}
    100% { transform: translate(-50%, -50%) rotate(360deg);}
}
@keyframes tedx-spin-rev {
    0% { transform: translate(-50%, -50%) rotate(0deg);}
    100% { transform: translate(-50%, -50%) rotate(-360deg);}
}
</style>
@endsection
