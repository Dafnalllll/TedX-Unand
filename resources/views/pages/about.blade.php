<!-- filepath: d:\Dafa Code\TedXUnand\resources\views\pages\about.blade.php -->
@section('title', 'About | TEDxUnand')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center relative"
     style="background: url('{{ asset('img/tedabout.webp') }}') center center / cover no-repeat;">
    <div class="absolute inset-0 z-0"></div>
    <div class="relative z-10 max-w-3xl mx-auto p-8 rounded-lg shadow-2xl "
         data-aos="fade-up" data-aos-duration="1000">
        <h1 class="text-4xl font-extrabold text-red-600 mb-4 text-center"
            data-aos="zoom-in" data-aos-delay="200">About TEDxUnand</h1>
        <p class="text-lg text-white leading-relaxed text-center"
           data-aos="fade-up" data-aos-delay="400">
            TEDxUnand is an independent event organized by the Universitas Andalas community, featuring inspiring speakers, fresh ideas, and experiences that can transform the way we see the world. Join us in celebrating innovation, creativity, and the spirit of sharing.
        </p>
    </div>
      <!-- Overlay hitam dengan opacity -->
    <div class="absolute inset-0 bg-black opacity-60 pointer-events-none z-0"></div>
</div>
<div id="cursor-anim-bg" style="position:fixed; inset:0; pointer-events:none; z-index:1;"></div>

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
@endsection
