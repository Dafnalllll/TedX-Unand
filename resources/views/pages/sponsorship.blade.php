@section('title', 'Sponsorship | TEDxUnand')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@extends('layouts.app')

@section('content')

<!-- Background utama sponsorship.webp -->
<div style="
    position: fixed;
    inset: 0;
    width: 100vw;
    height: 100vh;
    z-index: 0;
    background: url('{{ asset('img/sponsorship.webp') }}') center center / cover no-repeat;
    opacity: 0.18;
    pointer-events: none;
    user-select: none;
"></div>

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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
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

<div class="relative z-10">
    <h2 class="text-7xl font-bold text-center mb-[8rem] mt-[12rem] text-red-700" data-aos="fade-down">Our Sponsor</h2>
    @include('components.sponsorshipcard')
    <h2 class="text-7xl font-bold text-center mb-[8rem] mt-[12rem] text-red-700" data-aos="fade-down">Our Medpart</h2>
    @include('components.medpart')
    <h2 class="text-7xl font-bold text-center mb-[8rem] mt-[12rem] text-red-700" data-aos="fade-down">Our Contact</h2>
    @include('components.contact')
</div>

@endsection

