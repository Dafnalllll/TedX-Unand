@php
    $events = [
        ['title' => 'Event 2',  'img' => 'img/event/event2.webp'],
        ['title' => 'The Untold Journey', 'img' => 'img/event/preevent/theuntoldjourney.webp'],
        ['title' => 'Event 3', 'img' => 'img/event/event3.webp'],
    ];
@endphp

<div x-data="{
    events: @js($events),
    active: 1,
    flip: false,
    hovered: false,
    cardWidth: 320,
    next() {
        this.flip = false;
        this.active = (this.active + 1) % this.events.length;
        this.hovered = false;
    },
    prev() {
        this.flip = false;
        this.active = (this.active - 1 + this.events.length) % this.events.length;
        this.hovered = false;
    },
    flipCard() {
        this.flip = !this.flip;
    }
}"
    class="relative w-[960px] mx-auto h-[400px] flex items-center justify-center select-none overflow-hidden"
    x-cloak>
    <!-- Left Arrow -->
    <button @click="prev" class="absolute left-0 z-20 bg-black/40 hover:bg-black/70 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg transition">
        <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
    </button>

    <!-- Cards Wrapper -->
    <div class="flex items-center h-full transition-transform duration-500 ease-in-out"
         :style="`transform: translateX(calc(50% - ${cardWidth/2}px - ${active} * ${cardWidth}px + 38px));`">
        <template x-for="(event, i) in events" :key="i">
            <div
                @mouseenter="i === active && (hovered = true)"
                @mouseleave="i === active && (hovered = false)"
                @click="i === active && flipCard()"
                :class="{
                    'z-10 scale-100 shadow-2xl cursor-pointer floating-card': i === active,
                    'z-0 scale-90 blur-sm opacity-70 shadow-xl pointer-events-none': i !== active
                }"
                class="transition-all duration-500 ease-in-out w-72 h-96 rounded-xl overflow-hidden relative mx-2 flex-shrink-0 border border-white/30"
            >
                <div
                    :class="{'flip-card-inner': true, 'flipped': flip && i === active}"
                    class="w-full h-full"
                    style="transition: transform 0.4s cubic-bezier(.4,2,.6,1); transform-style: preserve-3d;"
                >
                    <!-- Front -->
                    <div class="flip-card-front absolute w-full h-full flex flex-col items-center justify-between p-0"
                        style="backface-visibility: hidden;">
                        <!-- Gambar Full Card -->
                        <img :src="event.img" alt="" class="absolute inset-0 w-full h-full object-cover z-0" loading="lazy">

                        <!-- Ribbon Completed untuk Event 1 -->
                        <template x-if="i === 1">
                            <div class="absolute right-0 top-0 z-20">
                                <div class="origin-top-right -rotate-45 bg-orange-500 text-white text-xs font-bold px-8 py-1 shadow-lg"
                                    style="position: absolute; right: 210px; bottom: 0px; width: 140px; text-align: center;">
                                    Completed
                                </div>
                            </div>
                        </template>

                        <!-- Overlay konten -->
                        <div class="relative z-10 w-full h-full flex flex-col items-center justify-between p-6">
                            <!-- Badge Event -->
                            <span class="px-3 py-1 mb-2 rounded-full bg-gradient-to-r from-red-500 via-yellow-400 to-red-500 text-white text-xs font-semibold shadow-md tracking-widest uppercase">
                                Event
                            </span>
                            <!-- Judul (hanya muncul saat hover dan card aktif) -->
                            <div class="flex flex-col items-center">
                                <h3
                                    x-show="i === active && hovered"
                                    x-transition
                                    class="text-xl font-extrabold mb-1 drop-shadow-sm tracking-wide"
                                    x-text="event.title"
                                    style=" font-family: 'Inter', sans-serif;
                                            color: #FF512F; /* Atau warna lain sesuai keinginan */
                                            border: 2px solid;
                                            border-image: linear-gradient(90deg, #FF512F, #F09819) 1;
                                            border-radius: 8px;
                                            padding: 4px 12px;
                                            display: inline-block;
                                            background: rgb(240, 234, 234); /* opsional, supaya teks makin jelas */
                                            "
                                ></h3>
                            </div>
                        </div>
                    </div>

                    <!-- Back -->
                    <div class="flip-card-back absolute w-full h-full flex flex-col items-center justify-center p-6 bg-gradient-to-r from-red-500 via-yellow-400 to-red-500 text-white rounded-xl" style="backface-visibility: hidden; transform: rotateY(180deg);">
                        <p class="text-center">A small journey between the lines of The Unwritten Atlas, about how we learn to find direction—not only through maps, but through the courage to begin speaking.</p>
                        <button
                            class="mt-6 px-4 py-2 rounded-lg bg-white text-orange-500 font-bold shadow hover:scale-105 transition">
                            Find More
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <!-- Right Arrow -->
    <button @click="next" class="absolute right-0 z-20 bg-black/40 hover:bg-black/70 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg transition">
        <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
    </button>

    <style>
        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.4s cubic-bezier(.4,2,.6,1);
            transform-style: preserve-3d;
        }
        .flip-card-inner.flipped {
            transform: rotateY(180deg);
        }
        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
        }
        .floating-card {
            animation: floating 2.5s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: scale(1) translateY(0); }
            50% { transform: scale(1) translateY(-8px); }
        }
    </style>
</div>
