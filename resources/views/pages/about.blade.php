@extends('layouts.app')

@section('title', 'About | TEDxUnand')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@section('content')
<section class="relative w-full py-16 px-4 md:px-0 overflow-x-hidden min-h-screen"
    style="background: url('{{ asset('img/about.webp') }}') center center / cover no-repeat; background-attachment: fixed;">
    <!-- Overlay hitam dengan opacity -->
    <div class="absolute inset-0 bg-black opacity-60 pointer-events-none z-0"></div>
    <div class="max-w-xl mx-auto text-center mt-[12rem] md:mt-[12rem]" data-aos="fade-down" data-aos-duration="1000">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white">
            About <span class="text-[#E62B1E]">TED</span>
        </h1>
        <p class="mt-4 text-white">A journey of inspiration and action.</p>
    </div>
    <div class="relative max-w-2xl mx-auto">
        <div class="border-l-4 border-[#E62B1E] pl-8 space-y-12">
            <div class="relative" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                <span class="absolute -left-6 top-1 w-4 h-4 bg-[#E62B1E] rounded-full border-4 border-white"></span>
                <h3 class="text-lg font-bold text-[#E62B1E] mb-1 text-left">What is TED?</h3>
                <p class="text-white/90 text-left">
                    is a global nonprofit organization dedicated to spreading Ideas, usually in the form of short talks (18 minutes or less) delivered by today's leading thinkers and influencers.
                </p>
            </div>
            <div class="relative" data-aos="fade-left" data-aos-delay="400" data-aos-duration="1000">
                <span class="absolute -left-6 top-1 w-4 h-4 bg-[#E62B1E] rounded-full border-4 border-white"></span>
                <h3 class="text-lg font-bold text-[#E62B1E] mb-1 text-left">How TED Impacts the World?</h3>
                <p class="text-white/90 text-left">
                    stands for Technology, Entertainment, and Design; and its primary focus has always been on sharing innovation and ideas across all fields. Many of these talks are given at the annual TED conference in Vancouver, British Columbia, and are freely available on TED.com.
                </p>
            </div>
        </div>
    </div>
    {{-- Section: Why TEDx --}}
    @include('components.why')
</section>

<style>
@media (max-width: 767px) {
    .mt-\[12rem\] {
        margin-top: 4rem !important;
    }
}
</style>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endpush
@endsection
