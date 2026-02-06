<nav class="fixed top-0 left-0 w-full z-50 transition-colors duration-500 bg-white/50 backdrop-blur-lg shadow-lg border-b border-black/10"
    data-aos="fade-down"
    data-aos-duration="1000"
    style="background-image: url('{{ asset('img/navbar.webp') }}'); background-position: right 30px; background-repeat: no-repeat; background-size: auto 100%;">
    <!-- Gambar dekorasi -->
    <a href="/admin" class="absolute left-0 top-0 w-40 z-0 hidden md:block">
        <img src="{{ asset('img/navbar2.webp') }}"
            alt=""
            class="pointer-events-auto select-none w-40" />
    </a>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    @php
        $navItems = [
            ['name' => 'Home', 'url' => '/dashboard'],
            ['name' => 'About', 'url' => '/about'],
            ['name' => 'Sponsorship', 'url' => '/sponsorship'],
            ['name' => 'FAQ', 'url' => '/faq'],
        ];
    @endphp

    <!-- DESKTOP NAVBAR -->
    <div class="hidden md:flex flex-col w-full">
        <!-- Logo Tengah -->
        <div class="flex flex-col items-center pt-1">
            <img src="{{ asset('img/TEDxUniversitasAndalas.webp') }}" alt="TEDx Andalas University Logo" class="h-16 w-auto mx-auto" />
        </div>
        <!-- Menu Navigasi Tengah -->
        <div class="flex justify-center items-center gap-24 py-1 border-t border-black/10">
            @foreach ($navItems as $item)
                <a href="{{ $item['url'] }}"
                    class="relative text-black font-semibold text-lg transition duration-200
                            hover:text-red-600
                            after:absolute after:left-0 after:-bottom-1 after:w-0 after:h-0.5 after:bg-red-600 after:transition-all after:duration-300
                            hover:after:w-full
                            {{ request()->is(ltrim($item['url'], '/')) ? 'text-red-600 after:w-full' : '' }}">
                    {{ $item['name'] }}
                </a>
            @endforeach

            <!-- Events parent (tanpa dropdown menu) -->
            <div class="relative flex items-center gap-1 group pb-4 mt-4"
                    id="events-dropdown-parent"
                    onmouseenter="showDropdown('events')" onmouseleave="hideDropdown('events')">
                <a href="/events" class="text-black font-semibold text-lg transition duration-200 hover:text-red-600 {{ request()->is('events') ? 'text-red-600' : '' }}">
                    Events
                </a>
                <button type="button" class="flex items-center focus:outline-none text-black">
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Dropdown menu (Events) - letakkan di luar flex utama -->
        <div id="events-dropdown-menu"
            class="fixed left-1/2 top-48 z-40 hidden -translate-x-1/2 w-[700px] max-w-full
                bg-gradient-to-br from-[#EC9F1E] via-red-500 to-gray-900
                backdrop-blur-xl rounded-3xl shadow-2xl border border-yellow-300/40 ring-2 ring-yellow-400/10
                transition-all duration-300 py-10 flex justify-center gap-0"
            onmouseenter="showDropdown('events')" onmouseleave="hideDropdown('events')">
            <!-- Card 1: Pre Event -->
            <a href="/events/pre-event"
                class="dropdown-card-item group flex flex-col items-center px-8 py-6 transition-all duration-300"
                style="margin-right: 40px; margin-top: 10px;">
                <div class="relative">
                    <img src="{{ asset('img/preevent.png') }}" alt="Pre-Event"
                        class="w-34 h-40  transition-all duration-500
                            group-hover:scale-110 group-hover:rotate-6 group-hover:blur-[2px]" />
                    <div class="absolute bg-gradient-to-t from-red-700/70
                        scale-y-0 origin-bottom group-hover:scale-y-100 transition-transform duration-500 ease-out"></div>
                    <span class="absolute bottom-4 left-1/2 -translate-x-1/2 text-xl font-bold text-white
                        opacity-0 group-hover:opacity-100 group-hover:animate-bounceIn
                        whitespace-nowrap transition-all duration-500">Pre Event</span>
                </div>
            </a>
            <div class="w-px bg-gray-700/60 rounded-full"
                style="height: 180px; margin-right: 80px; margin-left: 10px;"></div>
            <!-- Card 2: Main Event -->
            <a href="/events/main-event"
                class="dropdown-card-item group flex flex-col items-center px-8 py-6 transition-all duration-300"
                style="margin-top: 30px;">
                <div class="relative">
                    <img src="{{ asset('img/mainevent.png') }}" alt="Main Event"
                        class="w-34 h-40  transition-all duration-500
                            group-hover:scale-110 group-hover:-rotate-6 group-hover:blur-[2px]" />
                    <div class="absolute bg-gradient-to-t from-yellow-600/70
                        scale-y-0 origin-bottom group-hover:scale-y-100 transition-transform duration-500 ease-out"></div>
                    <span class="absolute bottom-4 left-1/2 -translate-x-1/2 text-xl font-bold text-white
                        opacity-0 group-hover:opacity-100 group-hover:animate-bounceIn
                    whitespace-nowrap transition-all duration-500">Main Event</span>
                </div>
            </a>
        </div>
    </div>

    <!-- MOBILE NAVBAR -->
    <div class="md:hidden flex flex-col w-full">
        <div class="flex justify-between items-center px-4 py-2 bg-black shadow">
            <a href="/admin">
                <img src="{{ asset('img/TEDxUniversitasAndalas.webp') }}" alt="TEDx Andalas University Logo" class="h-12 w-auto cursor-pointer" />
            </a>
            <button id="navbar-toggle" class="text-white focus:outline-none transition-transform duration-300">
                <span id="navbar-toggle-icon">
                    <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <line x1="4" y1="6" x2="20" y2="6"/>
                        <line x1="4" y1="12" x2="20" y2="12"/>
                        <line x1="4" y1="18" x2="20" y2="18"/>
                    </svg>
                </span>
            </button>
        </div>
        <div id="navbar-menu"
            class="fixed top-0 left-0 w-full h-full background-black/50 backdrop-blur-sm
                z-[9999] px-0 pt-24 pb-8 transition-all duration-500 ease-in-out
                transform -translate-y-full opacity-0 pointer-events-none">

            <!-- Tombol close absolute di pojok kanan atas -->
            <button id="navbar-close" type="button"
                class="absolute top-6 right-6 z-[10001] bg-white/80 rounded-full p-2 shadow-lg focus:outline-none">
                <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                    <line x1="6" y1="6" x2="18" y2="18"/>
                    <line x1="6" y1="18" x2="18" y2="6"/>
                </svg>
            </button>

            <!-- Logo TEDx di tengah atas -->
            <div class="flex flex-col items-center mt-4 mb-8">
                <img src="{{ asset('img/TEDxUniversitasAndalas.webp') }}"
                    alt="TEDx Universitas Andalas Logo"
                    class="w-32 drop-shadow-xl mb-2" />
            </div>

            <!-- Container isi menu dengan efek glassmorphism -->
            <div class="bg-red-800 backdrop-blur-md rounded-2xl p-4 shadow-2xl space-y-6 mx-4">
                @foreach ($navItems as $item)
                    <a href="{{ $item['url'] }}"
                        class="block text-xl font-bold py-2 px-4 rounded-lg transition
                        {{ request()->is(ltrim($item['url'], '/')) ? 'bg-red-600 text-white shadow' : 'text-black hover:bg-red-100' }}">
                        {{ $item['name'] }}
                    </a>
                @endforeach
                <div class="border-t border-gray-300 mt-2 pt-4">
                    <div class="flex items-center gap-2 w-full">
                        <a href="/events" class="flex-1 text-xl font-bold text-black hover:text-red-600 transition focus:outline-none">
                            Events
                        </a>
                        <button id="mobile-events-toggle" type="button"
                            class="flex items-center focus:outline-none"
                            style="padding:0;">
                            <svg class="w-5 h-5 transition-transform duration-200" id="mobile-events-arrow" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M6 9l6 6 6-6"/>
                            </svg>
                        </button>
                    </div>
                    <div id="mobile-events-menu" class="pl-4 mt-2 space-y-2 hidden">
                        <a href="/events/pre-event"
                            class="block text-base py-2 px-3 rounded-lg transition
                            {{ request()->is('events/pre-event') ? 'bg-red-600 text-white shadow' : 'text-black hover:bg-red-100' }}">
                            Pre-Event
                        </a>
                        <a href="/events/main-event"
                            class="block text-base py-2 px-3 rounded-lg transition
                            {{ request()->is('events/main-event') ? 'bg-red-600 text-white shadow' : 'text-black hover:bg-red-100' }}">
                            Main Event
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .font-[Playfair_Display] {
            font-family: 'Playfair Display', serif !important;
        }
        nav, nav * {
            font-family: 'Inter', Arial, sans-serif !important;
        }
        .dropdown-card-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            transition: transform 0.2s;
        }
        .dropdown-card-item:hover {
            transform: translateY(-8px) scale(1.03);
            z-index: 2;
        }
        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: translateY(30px) scale(0.8);
            }
            60% {
                opacity: 1;
                transform: translateY(-10px) scale(1.05);
            }
            80% {
                transform: translateY(2px) scale(0.98);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        .animate-bounceIn {
            animation: bounceIn 0.7s cubic-bezier(.68,-0.55,.27,1.55) both;
        }
    </style>
    <script>
        // Desktop dropdown
        let dropdownTimeout = null;
        function showDropdown(type) {
            clearTimeout(dropdownTimeout);
            document.getElementById(type + '-dropdown-menu').classList.remove('hidden');
        }
        function hideDropdown(type) {
            dropdownTimeout = setTimeout(() => {
                document.getElementById(type + '-dropdown-menu').classList.add('hidden');
            }, 120);
        }
    </script>

    <style>
    #navbar-menu.active {
        transform: translateY(0);
        opacity: 1;
        pointer-events: auto;
        z-index: 9999;
    }
    #navbar-menu {
        transition: transform 0.4s cubic-bezier(.4,2,.6,1), opacity 0.3s;
        z-index: 9999;
    }
    #navbar-close {
        z-index: 10001;
    }
    </style>
<script>
    // Mobile menu toggle
    const navbarToggle = document.getElementById('navbar-toggle');
    const navbarMenu = document.getElementById('navbar-menu');
    const navbarToggleIcon = document.getElementById('navbar-toggle-icon');
    const navbarClose = document.getElementById('navbar-close');
    let menuOpen = false;

    navbarToggle.onclick = function() {
    menuOpen = !menuOpen;
    navbarMenu.classList.toggle('active', menuOpen);
    if (menuOpen) {
        document.body.style.overflow = 'hidden'; // lock scroll
    } else {
        document.body.style.overflow = '';
    }
};

    // Tombol close di pojok kanan atas
    navbarClose.onclick = function() {
        navbarMenu.classList.remove('active');
        menuOpen = false;
        document.body.style.overflow = '';
        // Kembalikan icon hamburger
        navbarToggleIcon.innerHTML = `
            <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <line x1="4" y1="6" x2="20" y2="6"/>
                <line x1="4" y1="12" x2="20" y2="12"/>
                <line x1="4" y1="18" x2="20" y2="18"/>
            </svg>
        `;
    };

    // Mobile events dropdown
    document.getElementById('mobile-events-toggle').onclick = function() {
        var menu = document.getElementById('mobile-events-menu');
        var arrow = document.getElementById('mobile-events-arrow');
        menu.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    };
</script>
</nav>
