@extends('layouts.app')

@section('title', 'TVP | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@section('content')
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />

<style>
    /* Animated gradient background */
    .tvp-bg {
        background: url('{{ asset('img/event/tvp/tvp.webp') }}') center center/cover no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    @keyframes gradientMove {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    }
    /* Glassmorphism effect */
    .glass-card {
        background: rgba(255,255,255,0.18);
        backdrop-filter: blur(16px) saturate(180%);
        border-radius: 2rem;
        border: 2px solid rgba(255,255,255,0.25);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    }
    /* Floating image animation */
    .float-img {
        animation: floatY 2.5s ease-in-out infinite;
    }
    @keyframes floatY {
        0%, 100% {transform: translateY(0) rotate(-18deg);}
        50% {transform: translateY(-12px) rotate(-18deg);}
    }
    /* Glow effect for CTA */
    .glow-btn {
        box-shadow: 0 0 18px 6px #ff3c3c, 0 0 32px 0 #EC9F1E;
        transition: box-shadow 0.3s;
    }
    .glow-btn:hover {
        box-shadow: 0 0 32px 12px #EC9F1E, 0 0 48px 0 #ff3c3c;
    }
</style>

<div class="min-h-screen tvp-bg flex flex-col items-center py-16 px-4 relative overflow-hidden">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/60 z-0"></div>
    <!-- Konten utama -->
    <div class="relative z-10">
        <!-- Card utama dengan glassmorphism -->
        <div class="max-w-4xl w-full mx-auto p-10 flex flex-col items-center mt-[8rem]" data-aos="zoom-in" data-aos-duration="1200">
            <!-- Gambar TVP floating -->
            <div class="mb-8 relative" data-aos="fade-down" data-aos-delay="200">
                <img src="{{ asset('img/tvp.png') }}" alt="TVP"
                    class="float-img w-64 h-64 object-cover " />
            </div>
            <!-- Judul dan deskripsi jadul -->
            <h1 class="text-4xl text-white drop-shadow-lg mb-2 font-mono tracking-widest uppercase text-center" style="font-family: 'Courier New', Courier, monospace;" data-aos="fade-up" data-aos-delay="400">
                The Broken Compass : Finding Direction in Self-Pursuit
            </h1>
            <p class="text-lg font-mono text-center mb-6" style="font-family: 'Courier New', Courier, monospace;" data-aos="fade-up" data-aos-delay="600">
                <span class=" text-yellow-400 px-1">A space to reflect, discuss,</span><br>
                <span class="text-yellow-400 px-1">and rediscover your direction through inspiring TED screenings</span><br>
                <span class=" text-yellow-400 px-1">and open discussions together.</span>
            </p>
        </div>
        <!-- Title SVG melengkung -->
        <div class="flex justify-center mb-12 mt-12">
            <svg width="420" height="120">
                <defs>
                    <linearGradient id="speaker-gradient" x1="0" y1="0" x2="1" y2="0">
                        <stop offset="0%" stop-color="#f59e42"/>
                        <stop offset="100%" stop-color="#ff5f6d"/>
                    </linearGradient>
                </defs>
                <path id="curve" d="M20,100 Q210,20 400,100" fill="transparent"/>
                <text font-size="42" font-family="Inter, sans-serif" font-weight="bold" letter-spacing="4">
                    <textPath href="#curve" startOffset="50%" text-anchor="middle" fill="url(#speaker-gradient)">
                        Highlight
                    </textPath>
                </text>
            </svg>
        </div>
            <!-- Section highlight dengan card foto -->
        <div class="max-w-6xl w-full mt-14 grid grid-cols-1 md:grid-cols-3 gap-8"
            data-aos="fade-up" data-aos-delay="800">
            <div class="glass-card p-0 overflow-hidden flex items-center justify-center
                        transition-transform duration-300 hover:scale-105"
                style="height: 260px; width: 100%;">
                <img src="{{ asset('img/event/tvp/tvp1.webp') }}" alt="Foto 1"
                    class="w-full h-full object-cover" style="min-width: 350px;" />
            </div>
            <div class="glass-card p-0 overflow-hidden flex items-center justify-center
                        transition-transform duration-300 hover:scale-105"
                style="height: 260px; width: 100%;">
                <img src="{{ asset('img/event/tvp/tvp2.webp') }}" alt="Foto 2"
                    class="w-full h-full object-cover" style="min-width: 350px;" />
            </div>
            <div class="glass-card p-0 overflow-hidden flex items-center justify-center
                        transition-transform duration-300 hover:scale-105"
                style="height: 260px; width: 100%;">
                <img src="{{ asset('img/event/tvp/tvp3.webp') }}" alt="Foto 3"
                    class="w-full h-full object-cover" style="min-width: 350px;" />
            </div>
        </div>
        <!-- Caption di bawah card -->
        <p class="mt-10 text-center text-lg text-white/90 font-mono max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="1200" style="font-family: 'Courier New', Courier, monospace;">
            This year, we will explore the journey of finding direction in life—about feeling lost, being afraid to take steps, doubting ourselves, and having the courage to seek the path that truly belongs to us.<br>
            We’ll discuss all of this together while watching TED Talks, having discussions, and sharing perspectives with one another.
        </p>

        <!-- Tambahan 4 card highlight di bawah caption -->
        <div class="max-w-6xl w-full mt-14 grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="1300">
            <!-- Card 1: Full photo, overlay content -->
            <div class="glass-card p-0 overflow-hidden relative h-96 group md:col-span-2" data-aos="fade-up" data-aos-delay="1400">
                <img src="{{ asset('img/event/tvp/tvp5.webp') }}" alt="Foto 4" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white z-10">
                    <h3 class="text-2xl font-bold mb-1 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                        TVP Mission
                    </h3>
                    <p class="text-sm mb-4 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 delay-100">
                        Explore your journey and find your direction.
                    </p>
                </div>
            </div>
            <!-- Card 2: Full photo, overlay content -->
            <div class="glass-card p-0 overflow-hidden relative h-96 group" data-aos="fade-right" data-aos-delay="1500">
                <img src="{{ asset('img/event/tvp/tvp4.webp') }}" alt="Foto 5" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white z-10">
                    <h3 class="text-lg font-bold mb-1 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                        Group Discussion
                    </h3>
                    <p class="text-sm mb-4 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 delay-100">
                        Share perspectives and ideas together.
                    </p>
                </div>
            </div>
            <!-- Card 3: Full photo, overlay content -->
            <div class="glass-card p-0 overflow-hidden relative h-96 group" data-aos="fade-left" data-aos-delay="1600">
                <img src="{{ asset('img/event/tvp/tvp6.webp') }}" alt="Foto 6" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white z-10">
                    <h3 class="text-lg font-bold mb-1 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                        TED Screening
                    </h3>
                    <p class="text-sm mb-4 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 delay-100">
                        Watch inspiring TED Talks together.
                    </p>
                </div>
            </div>
            <!-- Card 4: Full photo, overlay content -->
            <div class="glass-card p-0 overflow-hidden relative h-96 group md:col-span-2" data-aos="fade-up" data-aos-delay="1700">
                <img src="{{ asset('img/event/tvp/tvp7.webp') }}" alt="Foto 7" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white z-10">
                    <h3 class="text-lg font-bold mb-1 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                        Open Sharing
                    </h3>
                    <p class="text-sm mb-4 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 delay-100">
                        Courage to find your own path.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        once: false,
        mirror: true,
        duration: 1000,
    });
</script>
@endsection
