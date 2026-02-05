@props(['events'])

@php
    $eventCards = collect($events)->map(function($event) {
        $category = $event->eventCategory ? $event->eventCategory->name : 'Uncategorized';
        if (strtolower($category) === 'mainevent' || strtolower($category) === 'main event') {
            $category = 'Main Event';
            $link = url('/events/main-event');
        } elseif (strtolower($category) === 'preevent' || strtolower($category) === 'pre event') {
            $category = 'Pre Event';
            $link = url('/events/pre-event');
        } else {
            $link = '#';
        }
        return [
            'title' => $event->title,
            'img' => $event->photo ? asset('storage/' . $event->photo) : asset('img/event/default.webp'),
            'description' => $event->description,
            'category' => $category,
            'completed' => $event->event_date < now() ? true : false,
            'link' => $link,
        ];
    })->values()->toArray();

    if (count($eventCards) > 1) {
        $latest = $eventCards[0];
        $others = array_slice($eventCards, 1);
        $middle = floor(count($eventCards) / 2);
        array_splice($others, $middle, 0, [$latest]);
        $eventCards = $others;
    }
@endphp

<div x-data="{
    events: @js($eventCards),
    active: Math.floor(@js($eventCards).length / 2),
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
    },
    isMobile: window.innerWidth < 640
}"
    x-init="window.addEventListener('resize', () => { isMobile = window.innerWidth < 640 })"
    class="relative w-full max-w-[960px] mx-auto h-[400px] flex items-center justify-center select-none overflow-hidden sm:mr-[16rem]"
    x-cloak>

    <!-- Desktop View -->
    <template x-if="!isMobile">
        <div class="w-full h-full flex items-center justify-center">
            <!-- Left Arrow -->
            <button @click="prev" class="absolute left-0 z-20 bg-gradient-to-br from-[#EC9F1E] via-red-500 to-gray-900 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg transition">
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
                                <img :src="event.img" alt="" class="absolute inset-0 w-full h-full object-cover z-0" loading="lazy">
                                <template x-if="event.completed">
                                    <div class="absolute right-0 top-0 z-20">
                                        <div class="origin-top-right -rotate-45 bg-orange-500 text-white text-xs font-bold px-8 py-1 shadow-lg"
                                            style="position: absolute; right: 210px; bottom: 0px; width: 140px; text-align: center;">
                                            Completed
                                        </div>
                                    </div>
                                </template>
                                <div class="relative z-10 w-full h-full flex flex-col items-center justify-between p-6">
                                    <span class="px-3 py-1 mb-2 rounded-full bg-gradient-to-r from-red-500 via-yellow-400 to-red-500 text-white text-xs font-semibold shadow-md tracking-widest uppercase"
                                        x-text="event.category">
                                    </span>
                                    <div class="flex flex-col items-center">
                                        <h3
                                            x-show="i === active && hovered"
                                            x-transition
                                            class="text-xl font-extrabold mb-1 drop-shadow-sm tracking-wide text-center"
                                            x-text="event.title"
                                            style=" font-family: 'Inter', sans-serif;
                                                    color: #FF512F;
                                                    border: 2px solid;
                                                    border-image: linear-gradient(90deg, #FF512F, #F09819) 1;
                                                    border-radius: 8px;
                                                    padding: 4px 12px;
                                                    display: inline-block;
                                                    background: rgb(240, 234, 234);"
                                        ></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Back -->
                            <div class="flip-card-back absolute w-full h-full flex flex-col items-center justify-center p-6 bg-gradient-to-r from-red-500 via-yellow-400 to-red-500 text-white rounded-xl" style="backface-visibility: hidden; transform: rotateY(180deg);">
                                <p class="text-center" x-text="event.description"></p>
                                <template x-if="flip && i === active">
                                    <a
                                        :href="event.link"
                                        class="absolute left-1/2 bottom-8 transform -translate-x-1/2 z-30"
                                        style="width: 220px; text-align: center;"
                                    >
                                        <span class="px-4 py-2 rounded-lg bg-white text-orange-500 font-bold shadow hover:scale-105 transition inline-block">
                                            Find More
                                        </span>
                                    </a>
                                </template>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <!-- Right Arrow -->
            <button @click="next" class="absolute right-0 z-20 bg-gradient-to-br from-[#EC9F1E] via-red-500 to-gray-900 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg transition">
                <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>
    </template>

    <!-- Mobile View -->
    <template x-if="isMobile">
        <div class="w-full h-full flex items-center justify-center">
            <!-- Left Arrow -->
            <button @click="prev" class="absolute left-2 z-20 bg-gradient-to-br from-[#EC9F1E] via-red-500 to-gray-900 text-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg transition">
                <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
            </button>
            <!-- Only Active Card -->
            <template x-for="(event, i) in events" :key="i">
                <div x-show="i === active"
                        x-ref="cardMobile"
                        @click="flipCard()"
                        class="z-10 shadow-2xl cursor-pointer floating-card w-full max-w-sm h-72 rounded-xl overflow-hidden relative mx-2 flex-shrink-0 border border-white/30 bg-white/5"
                        style="transform-style: preserve-3d;"
                    >
                    <div :class="{'flip-card-inner': true, 'flipped': flip && i === active}" class="w-full h-full"
                        style="transition: transform 0.4s cubic-bezier(.4,2,.6,1); transform-style: preserve-3d;">
                        <!-- Front -->
                        <div class="flip-card-front absolute w-full h-full flex flex-col items-center justify-between p-0"
                            style="backface-visibility: hidden;">
                            <img :src="event.img" alt="" class="absolute inset-0 w-full h-full object-cover z-0" loading="lazy">
                            <template x-if="event.completed">
                                <div class="absolute -left-4 top-12 z-20 w-24">
                                    <div class="origin-top-left -rotate-45 bg-orange-500 text-white text-xs font-bold px-2 py-1 shadow-lg text-center rounded">
                                        Completed
                                    </div>
                                </div>
                            </template>
                            <div class="relative z-10 w-full h-full flex flex-col items-center justify-between p-4">
                                <span class="px-3 py-1 mb-2 rounded-full bg-gradient-to-r from-red-500 via-yellow-400 to-red-500 text-white text-xs font-semibold shadow-md tracking-widest uppercase"
                                    x-text="event.category">
                                </span>
                                <div class="flex flex-col items-center">
                                    <!-- Judul selalu tampil di mobile -->
                                    <h3
                                        x-show="i === active"
                                        class="text-base font-extrabold mb-1 drop-shadow-sm tracking-wide text-center"
                                        x-text="event.title"
                                        style=" font-family: 'Inter', sans-serif;
                                                color: #FF512F;
                                                border: 2px solid;
                                                border-image: linear-gradient(90deg, #FF512F, #F09819) 1;
                                                border-radius: 8px;
                                                padding: 4px 12px;
                                                display: inline-block;
                                                background: rgb(240, 234, 234);"
                                    ></h3>
                                </div>
                            </div>
                        </div>
                        <!-- Back -->
                        <div class="flip-card-back absolute w-full h-full flex flex-col items-center justify-center p-4 bg-gradient-to-r from-red-500 via-yellow-400 to-red-500 text-white rounded-xl" style="backface-visibility: hidden; transform: rotateY(180deg);">
                            <p class="text-center text-xs" x-text="event.description"></p>
                            <template x-if="flip && i === active">
                                <a
                                    :href="event.link"
                                    class="absolute left-1/2 bottom-6 transform -translate-x-1/2 z-30"
                                    style="width: 160px; text-align: center;"
                                >
                                    <span class="px-3 py-2 rounded-lg bg-white text-orange-500 font-bold shadow hover:scale-105 transition inline-block text-xs">
                                        Find More
                                    </span>
                                </a>
                            </template>
                        </div>
                    </div>
                </div>
            </template>
            <!-- Right Arrow -->
            <button @click="next" class="absolute right-2 z-20 bg-gradient-to-br from-[#EC9F1E] via-red-500 to-gray-900 text-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg transition">
                <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>
    </template>

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
        .flip-card-inner.flipped .flip-card-front {
            pointer-events: none;
        }
        .flip-card-inner.flipped .flip-card-back {
            pointer-events: auto;
        }
        @media (max-width: 640px) {
            .floating-card { animation: floating 2.5s ease-in-out infinite; }
            .flip-card-inner, .flip-card-front, .flip-card-back {
                min-width: 100% !important;
                min-height: 240px !important;
            }
        }

        @layer utilities {
            .rotate-y-0 { transform: rotateY(0deg); }
            .rotate-y-90 { transform: rotateY(90deg); }
        }
    </style>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
