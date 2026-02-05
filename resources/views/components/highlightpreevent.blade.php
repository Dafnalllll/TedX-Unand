<div class="relative mt-[18rem] mb-[6rem] px-2">
    <div class="flex justify-center mb-14" data-aos="zoom-in" data-aos-delay="100">
        <svg width="420" height="100" viewBox="0 0 420 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <path id="curve" d="M30,80 Q210,10 390,80" />
                <linearGradient id="highlight-gradient" x1="0" y1="0" x2="420" y2="0" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FFD700"/>
                    <stop offset="0.5" stop-color="#FF512F"/>
                    <stop offset="1" stop-color="#F09819"/>
                </linearGradient>
            </defs>
            <text width="420" font-size="42" font-family="Inter, sans-serif" font-weight="bold" letter-spacing="4">
                <textPath href="#curve" startOffset="50%" text-anchor="middle" fill="url(#highlight-gradient)">
                    Highlight
                </textPath>
            </text>
        </svg>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-5xl mx-auto mt-[8rem]">
        {{-- Card 1 --}}
        <div
            class="relative bg-gradient-to-br from-yellow-400 via-red-500 to-gray-900 rounded-3xl shadow-2xl overflow-hidden transform transition duration-500 hover:scale-105 hover:-rotate-3 group"
            data-aos="fade-down-right" data-aos-delay="200"
        >
            <img src="{{ asset('img/event/preevent/theuntoldjourney/untoldjourney.webp') }}" alt="Gallery 1"
                class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110" />
            <div class="p-6">
                <p class="text-white/80 text-base">From insightful sharing sessions, interactive exercises that free you from fear, to experiences that push you out of your comfort zone, they are all small steps towards a more confident version of yourself.</p>
            </div>
        </div>
        {{-- Title The Speaker --}}
        <div class="flex flex-col items-center justify-end">
            <span class="text-2xl md:text-3xl font-bold text-white mb-4" data-aos="fade-up" data-aos-delay="250">
                The Speaker
            </span>
            {{-- Card 2 (Speaker) --}}
            <div
                class="relative bg-gradient-to-br from-yellow-400 via-red-500 to-gray-900 rounded-3xl shadow-2xl overflow-hidden transform transition duration-500 hover:scale-105 hover:rotate-2 group w-full"
                data-aos="zoom-in" data-aos-delay="350"
                style="margin-top: 0; margin-bottom: 2rem;"
            >
                <img src="{{ asset($highlightCard2['photo']) }}" alt="Gallery 2"
                    class="w-full h-70 object-cover transition-transform duration-500 group-hover:scale-105" />
                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2 drop-shadow text-center">{{ $highlightCard2['name'] }}</h3>
                    <p class="text-white/80 text-base text-center">{{ $highlightCard2['description'] }}</p>
                </div>
            </div>
        </div>
        {{-- Card 3 --}}
        <div
            class="relative bg-gradient-to-br from-yellow-400 via-red-500 to-gray-900 rounded-3xl shadow-2xl overflow-hidden transform transition duration-500 hover:scale-105 hover:-rotate-2 group"
            data-aos="fade-down-left" data-aos-delay="500"
        >
            <img src="{{ asset('img/event/preevent/theuntoldjourney/untoldjourney2.webp') }}" alt="Gallery 3"
                class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-110" />
            <div class="p-6">
                <p class="text-white/80 text-base">It's not just about English, but about finding the confidence to express yourself through stories, discussions, and firsthand experiences.</p>
            </div>
        </div>
    </div>
</div>

<style>
    @media (max-width: 767px) {
    .grid.mt-\[8rem\] {
        margin-top: 4rem !important;
    }
}
</style>
