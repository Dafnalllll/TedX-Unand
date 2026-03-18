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
                Speakers
            </textPath>
        </text>
    </svg>
</div>

<!-- Grid card speaker -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 px-8 max-w-8xl mx-auto mb-24">
    @foreach($speakers as $speaker)
    <div
        data-aos="zoom-in"
        class="relative group h-44 md:h-52 flex items-center overflow-hidden transform hover:-rotate-3 hover:scale-105 transition-all duration-300 rounded-2xl border-2 border-black border-opacity-40"
    >
        <div class="relative z-10 flex items-center w-full">
            <img src="{{ $speaker->photo ? asset('storage/'.$speaker->photo) : asset('img/auth/username.webp') }}"
                alt="{{ $speaker->name }}"
                class="h-32 w-32 md:h-40 md:w-40 object-cover ml-4 rounded-xl"
            >
            <div class="flex-1 pl-8 pr-8 py-4 flex flex-col">
                <h3 class="text-xl md:text-sm font-extrabold mb-2 text-white whitespace-nowrap drop-shadow-lg transition-all duration-300 opacity-0 translate-y-8 group-hover:opacity-100 group-hover:translate-y-0">
                    {{ $speaker->name }}
                </h3>
                <p class="text-sm md:text-base text-yellow-200 font-medium transition-all duration-300 opacity-0 translate-y-8 group-hover:opacity-100 group-hover:translate-y-0 delay-100">
                    {{ $speaker->description }}
                </p>
            </div>
        </div>
        <!-- Decorative SVG background -->
        <svg class="absolute right-0 top-0 w-24 h-24 opacity-30 pointer-events-none" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="40" fill="#ffe066"/>
            <circle cx="50" cy="50" r="25" fill="#ff5f6d"/>
        </svg>
    </div>
    @endforeach
</div>
