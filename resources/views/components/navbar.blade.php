<nav id="main-navbar" class="fixed w-full z-50 transition-colors duration-500"
data-aos="fade-down"
data-aos-duration="1000">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-16">
        <!-- Logo -->
        <div class="flex-shrink-0 flex items-center gap-2">
            <button onclick="window.location.href='{{ url('/') }}'"
                style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">
                <img src="{{ asset('img/TEDxUniversitasAndalas.webp') }}" alt="TEDx Andalas University Logo" class="h-14 w-auto" />
            </button>
        </div>
        @php
            $navItems = [
                ['name' => 'Home', 'url' => '/dashboard'],
                ['name' => 'About', 'url' => '/about'],
                ['name' => 'Sponsorship', 'url' => '/sponsorship'],
                ['name' => 'FAQ', 'url' => '/faq'],
            ];
        @endphp
        <div class="hidden md:flex items-center gap-8">
            @foreach ($navItems as $item)
                <a href="{{ $item['url'] }}"
                    class="relative text-white font-light transition duration-200
                            hover:text-red-600
                            after:absolute after:left-0 after:-bottom-1 after:w-0 after:h-0.5 after:bg-red-600 after:transition-all after:duration-300
                            hover:after:w-full
                            {{ request()->is(ltrim($item['url'], '/')) ? 'text-red-600 after:w-full' : '' }}">
                        {{ $item['name'] }}
                </a>
            @endforeach
            <!-- Events with dropdown (click to open) -->
            <div class="relative flex items-center gap-1" id="events-dropdown-parent">
                <a href="/events"
                    class="text-white font-medium transition duration-200 hover:text-red-600
                    {{ request()->is('events') ? 'text-red-600' : '' }}">
                    Events
                </a>
                <button type="button" id="events-dropdown-arrow-btn"
                    class="flex items-center focus:outline-none text-white">
                    <svg class="w-4 h-4 transition-transform duration-200" id="events-dropdown-arrow" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="events-dropdown-menu"
                    class="absolute -left-8 mt-2 md:mt-[14.5rem] min-w-[220px] bg-gradient-to-br from-black via-gray-900 to-black bg-opacity-95 rounded-2xl shadow-2xl py-4 z-20 hidden ring-1 ring-red-600/40 border border-red-600/20">
                    <div class="px-4 pb-2 text-xs uppercase tracking-widest text-red-400 font-bold">Category</div>
                    <a href="/events/pre-event"
                        class="flex items-center gap-3 px-5 py-3 text-white font-semibold hover:bg-gradient-to-r hover:from-red-600 hover:to-yellow-400 hover:text-white transition rounded-xl duration-200 mb-2 group">
                        <span class="flex items-center justify-center w-9 h-9 rounded-full bg-white/10 shadow group-hover:bg-white/20 transition">
                            <img src="{{ asset('img/preevent.webp') }}" alt="Pre-Event" class="w-6 h-6" />
                        </span>
                        <span class="flex-1">
                            <span class="block text-base font-bold">Pre Event</span>
                        </span>
                        <svg class="w-4 h-4 text-red-400 opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <a href="/events/main-event"
                        class="flex items-center gap-3 px-5 py-3 text-white font-semibold hover:bg-gradient-to-r hover:from-yellow-400 hover:to-red-600 hover:text-white transition rounded-xl duration-200 group">
                        <span class="flex items-center justify-center w-9 h-11 rounded-full bg-white/10 shadow group-hover:bg-white/20 transition">
                            <img src="{{ asset('img/mainevent.webp') }}" alt="Main Event" class="w-6 h-8" />
                        </span>
                        <span class="flex-1">
                            <span class="block text-base font-bold">Main Event</span>

                        </span>
                        <svg class="w-4 h-4 text-yellow-400 opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
            <!-- Shop with dropdown (click to open) -->
            <div class="relative flex items-center gap-1" id="shop-dropdown-parent">
                <a href="/shop"
                    class="text-white font-medium transition duration-200 hover:text-red-600
                    {{ request()->is('shop') ? 'text-red-600' : '' }}">
                    Shop
                </a>
                <button type="button" id="shop-dropdown-arrow-btn"
                    class="flex items-center focus:outline-none text-white">
                    <svg class="w-4 h-4 transition-transform duration-200" id="shop-dropdown-arrow" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="shop-dropdown-menu"
                    class="absolute -left-[6rem] mt-[14rem] min-w-[180px] w-64 max-w-xs bg-gradient-to-br from-black via-gray-900 to-black bg-opacity-95 rounded-2xl shadow-2xl py-4 z-20 hidden ring-1 ring-red-600/40 border border-red-600/20 overflow-x-auto">
                    <div class="px-4 pb-2 text-xs uppercase tracking-widest text-red-400 font-bold">Category</div>
                    <a href="/shop/tickets"
                        class="flex items-center gap-3 px-5 py-3 text-white font-semibold hover:bg-gradient-to-r hover:from-red-600 hover:to-yellow-400 hover:text-white transition rounded-xl duration-200 mb-2 group">
                        <span class="flex items-center justify-center w-9 h-9 rounded-full bg-white/10 shadow group-hover:bg-white/20 transition">
                            <img src="{{ asset('img/shop/ticket.webp') }}" alt="Tickets" class="w-8 h-8" />
                        </span>
                        <span class="flex-1">
                            <span class="block text-base font-bold">Tickets</span>
                        </span>
                        <!-- Tambahkan panah di sini -->
                        <svg class="w-4 h-4 text-red-400 opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <a href="/shop/merchs"
                        class="flex items-center gap-3 px-5 py-3 text-white font-semibold hover:bg-gradient-to-r hover:from-yellow-400 hover:to-red-600 hover:text-white transition rounded-xl duration-200 group">
                            <span class="flex items-center justify-center w-10 h-11 rounded-full bg-white/10 shadow group-hover:bg-white/20 transition">
                                <img src="{{ asset('img/shop/merch.webp') }}" alt="Merchs" class="w-12 h-12" />
                            </span>
                            <span class="flex-1">
                                <span class="block text-base font-bold">Merchs</span>
                            </span>
                            <!-- Tambahkan panah di sini -->
                            <svg class="w-4 h-4 text-yellow-400 opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
        </div>
        <!-- Mobile menu button -->
        <div class="md:hidden flex items-center">
            <button id="navbar-toggle" class="text-white focus:outline-none">
                <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <line x1="4" y1="6" x2="20" y2="6"/>
                    <line x1="4" y1="12" x2="20" y2="12"/>
                    <line x1="4" y1="18" x2="20" y2="18"/>
                </svg>
            </button>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div id="navbar-menu" class="md:hidden bg-black bg-opacity-95 px-4 pt-2 pb-4 space-y-2 hidden">
        @foreach ($navItems as $item)
            <a href="{{ $item['url'] }}"
                class="block text-white font-medium transition hover:text-red-600 {{ request()->is(ltrim($item['url'], '/')) ? 'text-red-600' : '' }}">
                {{ $item['name'] }}
            </a>
        @endforeach
        <!-- Events with dropdown for mobile -->
        <div class="border-t border-gray-700 mt-2 pt-2">
            <button id="mobile-events-toggle" class="flex items-center gap-1 w-full text-left text-white font-medium transition hover:text-red-600 focus:outline-none">
                Events
                <svg class="w-4 h-4 transition-transform duration-200" id="mobile-events-arrow" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6"/>
                </svg>
            </button>
            <div id="mobile-events-menu" class="pl-4 mt-1 space-y-1 hidden">
                <a href="/events/pre-event" class="block text-white hover:text-red-600 transition">Pre-Event</a>
                <a href="/events/main-event" class="block text-white hover:text-red-600 transition">Main Event</a>
            </div>
        </div>
        <!-- Shop with dropdown for mobile -->
        <div class="border-t border-gray-700 mt-2 pt-2">
            <button id="mobile-shop-toggle" class="flex items-center gap-1 w-full text-left text-white font-medium transition hover:text-red-600 focus:outline-none">
                Shop
                <svg class="w-4 h-4 transition-transform duration-200" id="mobile-shop-arrow" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6"/>
                </svg>
            </button>
            <div id="mobile-shop-menu" class="pl-4 mt-1 space-y-1 hidden">
                <a href="/shop/tickets" class="block text-white hover:text-red-600 transition">Tickets</a>
                <a href="/shop/merchs" class="block text-white hover:text-red-600 transition">Merchs</a>
            </div>
        </div>
    </div>
    <style>
        #custom-x-cursor {
            pointer-events: none !important;
            z-index: 9999 !important;
        }
        .font-inter, nav, nav * {
        font-family: 'Inter', Arial, sans-serif !important;
    }
    #main-navbar {
        background: transparent;
        /* transition already in class */
    }
    .navbar-scrolled {
        background: rgba(24, 24, 32, 0.93);
        backdrop-filter: blur(8px);
        box-shadow: 0 4px 24px 0 #0005;
    }
    </style>
    <script>
        document.getElementById('navbar-toggle').onclick = function() {
            var menu = document.getElementById('navbar-menu');
            menu.classList.toggle('hidden');
        };
        // Mobile events dropdown
        document.getElementById('mobile-events-toggle').onclick = function() {
            var menu = document.getElementById('mobile-events-menu');
            var arrow = document.getElementById('mobile-events-arrow');
            menu.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
        };
        // Desktop events dropdown (click to open/close)
        document.getElementById('events-dropdown-arrow-btn').onclick = function(e) {
            e.stopPropagation();
            var eventsMenu = document.getElementById('events-dropdown-menu');
            var eventsArrow = document.getElementById('events-dropdown-arrow');
            var shopMenu = document.getElementById('shop-dropdown-menu');
            var shopArrow = document.getElementById('shop-dropdown-arrow');
            // Tutup shop jika sedang terbuka
            shopMenu.classList.add('hidden');
            shopArrow.classList.remove('rotate-180');
            // Toggle events
            eventsMenu.classList.toggle('hidden');
            eventsArrow.classList.toggle('rotate-180');
        };
        // Desktop shop dropdown (click to open/close)
        document.getElementById('shop-dropdown-arrow-btn').onclick = function(e) {
            e.stopPropagation();
            var shopMenu = document.getElementById('shop-dropdown-menu');
            var shopArrow = document.getElementById('shop-dropdown-arrow');
            var eventsMenu = document.getElementById('events-dropdown-menu');
            var eventsArrow = document.getElementById('events-dropdown-arrow');
            // Tutup events jika sedang terbuka
            eventsMenu.classList.add('hidden');
            eventsArrow.classList.remove('rotate-180');
            // Toggle shop
            shopMenu.classList.toggle('hidden');
            shopArrow.classList.toggle('rotate-180');
        };
        // Close events dropdown when clicking outside
        document.addEventListener('click', function(e) {
            var menu = document.getElementById('events-dropdown-menu');
            var btn = document.getElementById('events-dropdown-arrow-btn');
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
                document.getElementById('events-dropdown-arrow').classList.remove('rotate-180');
            }
        });
        // Close shop dropdown when clicking outside
        document.addEventListener('click', function(e) {
            var menu = document.getElementById('shop-dropdown-menu');
            var btn = document.getElementById('shop-dropdown-arrow-btn');
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
                document.getElementById('shop-dropdown-arrow').classList.remove('rotate-180');
            }
        });
        // Mobile shop dropdown
        document.getElementById('mobile-shop-toggle').onclick = function() {
            var menu = document.getElementById('mobile-shop-menu');
            var arrow = document.getElementById('mobile-shop-arrow');
            menu.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
        };
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('main-navbar');
            if (window.scrollY > 30) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    </script>
</nav>
