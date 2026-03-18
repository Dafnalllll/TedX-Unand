@extends('layouts.app')

@section('title', 'Main-Event | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center relative overflow-x-hidden"
        style="background: url('{{ asset('img/event/mainevent/theunwrittenatlas.webp') }}') center center / cover no-repeat fixed;">
    <div class="absolute inset-0 bg-black bg-opacity-60 z-0"></div>
    <div class="relative z-10 w-full flex flex-col items-center justify-center">
        <!-- Title image -->
        <img src="{{ asset('img/event/mainevent/theunwrittenatlas1.webp') }}" alt="The Unwritten Atlas"
            data-aos="zoom-in" data-aos-duration="1200"
            class="float-title-img"
            style="display:block; margin:220px auto 24px; max-width:480px; position:relative; z-index:10;">
        {{-- Import maineventcard --}}
        @include('components.maineventcard')
        {{-- Import highlightmainevent --}}
        @include('components.highlightmainevent')
        {{-- Import speakerevent --}}
        @include('components.speakerevent', ['speakers' => $speakers])
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endpush
@endsection

<style>
    .sparkle-title {
        position: relative;
        animation: floatTitle 2.5s ease-in-out infinite;
    }
    @keyframes floatTitle {
        0% { transform: translateY(0); }
        50% { transform: translateY(-24px); }
        100% { transform: translateY(0); }
    }
    .float-title-img {
        animation: floatTitle 2.5s ease-in-out infinite;
    }
</style>
