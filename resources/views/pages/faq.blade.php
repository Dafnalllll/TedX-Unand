@section('title', 'FAQ | TEDxUnand')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center relative"
     style="background: url('{{ asset('img/tedabout.webp') }}') center center / cover no-repeat;">
    <div class="absolute inset-0 bg-black bg-opacity-60 z-0"></div>
    <div class="relative z-10 max-w-5xl mx-auto p-8"
         data-aos="fade-up" data-aos-duration="1000">
        <h1 class="text-4xl font-extrabold text-red-600 mb-10 text-center tracking-wide drop-shadow-lg" data-aos="zoom-in" data-aos-delay="200">
            Frequently Asked Questions
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-stretch">
            <div class="flex h-full" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                <div class="p-8 rounded-2xl bg-white bg-opacity-90 shadow-xl transition-transform duration-300 hover:scale-105 flex flex-col h-full border border-red-100 hover:border-red-400 cursor-pointer">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="bg-red-600/10 rounded-full p-2">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 8v4m0 4h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h2 class="font-bold text-lg text-gray-900">Apa itu TEDxUnand?</h2>
                    </div>
                    <p class="text-gray-700 pl-2 flex-1">TEDxUnand adalah acara independen berlisensi TED yang diselenggarakan oleh komunitas Universitas Andalas untuk berbagi ide, inspirasi, dan inovasi.</p>
                </div>
            </div>
            <div class="flex h-full" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1500">
                <div class="p-8 rounded-2xl bg-white bg-opacity-90 shadow-xl transition-transform duration-300 hover:scale-105 flex flex-col h-full border border-red-100 hover:border-red-400 cursor-pointer">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="bg-red-600/10 rounded-full p-2">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 8v4m0 4h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h2 class="font-bold text-lg text-gray-900">Siapa saja yang bisa mengikuti acara ini?</h2>
                    </div>
                    <p class="text-gray-700 pl-2 flex-1">Acara ini terbuka untuk umum, baik mahasiswa, dosen, maupun masyarakat luas yang ingin mendapatkan inspirasi dan pengetahuan baru.</p>
                </div>
            </div>
            <div class="flex h-full" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                <div class="p-8 rounded-2xl bg-white bg-opacity-90 shadow-xl transition-transform duration-300 hover:scale-105 flex flex-col h-full border border-red-100 hover:border-red-400 cursor-pointer">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="bg-red-600/10 rounded-full p-2">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 8v4m0 4h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h2 class="font-bold text-lg text-gray-900">Bagaimana cara mendaftar?</h2>
                    </div>
                    <p class="text-gray-700 pl-2 flex-1">Informasi pendaftaran dapat ditemukan di halaman Events atau melalui sosial media resmi TEDxUnand.</p>
                </div>
            </div>
            <div class="flex h-full" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1500">
                <div class="p-8 rounded-2xl bg-white bg-opacity-90 shadow-xl transition-transform duration-300 hover:scale-105 flex flex-col h-full border border-red-100 hover:border-red-400 cursor-pointer">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="bg-red-600/10 rounded-full p-2">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 8v4m0 4h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h2 class="font-bold text-lg text-gray-900">Apakah acara ini berbayar?</h2>
                    </div>
                    <p class="text-gray-700 pl-2 flex-1">Beberapa sesi mungkin berbayar, namun ada juga sesi gratis. Detail biaya akan diinformasikan pada pengumuman resmi.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endpush
@endsection
