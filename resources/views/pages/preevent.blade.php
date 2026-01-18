<!-- filepath: d:\Dafa Code\TedXUnand\resources\views\pages\preevent.blade.php -->
@section('title', 'Pre-Event | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center relative"
     style="background: url('{{ asset('img/event/preevent/theuntoldjourney/untoldjourney.webp') }}') center center / cover no-repeat;">
    <div class="absolute inset-0 bg-black bg-opacity-60 z-0"></div>
    <div class="relative z-10 w-full max-w-5xl mx-auto p-8 rounded-lg shadow-2xl bg-opacity-90"
         data-aos="fade-up" data-aos-duration="1000">
        <div class="flex flex-col items-center gap-2 md:gap-4 mt-0 mb-32">
            <svg width="600" height="140" viewBox="0 0 600 140" fill="none" xmlns="http://www.w3.org/2000/svg" style="max-width:100%; position:relative;">
                <defs>
                    <linearGradient id="tedx-gradient" x1="0" y1="0" x2="600" y2="0" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#F53003"/>
                        <stop offset="0.5" stop-color="#fef08a"/>
                        <stop offset="1" stop-color="#F53003"/>
                    </linearGradient>
                    <path id="curve" d="M60,120 Q300,10 540,120" />
                    <!-- Filter sparkle -->
                    <filter id="sparkle" x="0" y="0" width="100%" height="100%">
                        <feTurbulence id="turb" type="fractalNoise" baseFrequency="0.8" numOctaves="2" seed="2" result="turb"/>
                        <feDisplacementMap in2="turb" in="SourceGraphic" scale="6" xChannelSelector="R" yChannelSelector="G"/>
                        <feGaussianBlur stdDeviation="0.5" result="blur"/>
                        <feMerge>
                            <feMergeNode in="blur"/>
                            <feMergeNode in="SourceGraphic"/>
                        </feMerge>
                    </filter>
                    <!-- Shine mask -->
                    <linearGradient id="shine" x1="0" y1="0" x2="1" y2="0">
                        <stop offset="0%" stop-color="#fff" stop-opacity="0"/>
                        <stop offset="50%" stop-color="#fff" stop-opacity="0.7"/>
                        <stop offset="100%" stop-color="#fff" stop-opacity="0"/>
                    </linearGradient>
                </defs>
                <!-- Gradient Text + Sparkle -->
                <text width="600" filter="url(#sparkle)">
                    <textPath href="#curve" startOffset="50%" text-anchor="middle"
                        font-size="48"
                        font-family="'Bebas Neue', 'Montserrat', Arial, sans-serif"
                        fill="url(#tedx-gradient)"
                        font-weight="bold"
                        letter-spacing="4"
                        style="text-shadow:0 2px 16px #F5300340;">
                        THE UNTOLD JOURNEY
                    </textPath>
                </text>
                <!-- Shine sweep animation -->
                <mask id="shine-mask">
                    <rect id="shine-rect" x="-200" y="0" width="200" height="140" fill="url(#shine)">
                        <animate attributeName="x" from="-200" to="600" dur="2.5s" repeatCount="indefinite" />
                    </rect>
                </mask>
                <text width="600" mask="url(#shine-mask)">
                    <textPath href="#curve" startOffset="50%" text-anchor="middle"
                        font-size="48"
                        font-family="'Bebas Neue', 'Montserrat', Arial, sans-serif"
                        fill="#fff"
                        font-weight="bold"
                        letter-spacing="4">
                        THE UNTOLD JOURNEY
                    </textPath>
                </text>
                <!-- Sparkle overlay (animated star) -->
                <g>
                    <!-- Star sparkle bolak-balik -->
                    <g opacity="0.85">
                        <polygon points="0,-8 2,-2 8,0 2,2 0,8 -2,2 -8,0 -2,-2"
                            fill="#fffbe6" stroke="#fff8c0" stroke-width="1.2">
                            <animateTransform attributeName="transform" type="rotate"
                                from="0 0 0" to="360 0 0" dur="1.2s" repeatCount="indefinite"/>
                        </polygon>
                        <animateMotion dur="10s" repeatCount="indefinite" keyPoints="0;1;0" keyTimes="0;0.5;1">
                            <mpath href="#curve"/>
                        </animateMotion>
                        <animate attributeName="opacity" values="0.85;0.2;0.85" dur="3s" repeatCount="indefinite"/>
                    </g>
                    <!-- Star sparkle 2 bolak-balik, dengan delay -->
                    <g opacity="0.7">
                        <polygon points="0,-5 1.5,-1 5,0 1.5,1 0,5 -1.5,1 -5,0 -1.5,-1"
                            fill="#fff" stroke="#fff8c0" stroke-width="0.8">
                            <animateTransform attributeName="transform" type="rotate"
                                from="0 0 0" to="-360 0 0" dur="1.6s" repeatCount="indefinite"/>
                        </polygon>
                        <animateMotion dur="10s" repeatCount="indefinite" keyPoints="0.2;0.8;0.2" keyTimes="0;0.5;1">
                            <mpath href="#curve"/>
                        </animateMotion>
                        <animate attributeName="opacity" values="0.7;0.2;0.7" dur="3s" repeatCount="indefinite"/>
                    </g>
                </g>
            </svg>
        </div>
         @include('components.preeventcard')
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
