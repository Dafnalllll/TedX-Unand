<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Laravel')</title>
        @stack('title')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@900&family=Great+Vibes&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
        @stack('head')
        <style>
            html, body {
                cursor: auto !important; /* default cursor untuk mobile */
            }
            @media (min-width: 768px) {
                html, body, * {
                    cursor: none !important; /* hilangkan cursor hanya di desktop */
                }
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <!-- Loading Overlay -->
        @include('components.loading')
        <div class="min-h-screen flex flex-col bg-white dark:bg-gray-900">

            {{-- Navbar hanya untuk halaman user --}}
            @unless (
                request()->routeIs('dashboard.admin') ||
                request()->routeIs('dashboard.shop.*') ||
                request()->routeIs('dashboard.speaker.*') ||
                request()->routeIs('dashboard.events.*')
            )
                @include('components.navbar')
            @endunless

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1">
                @yield('content')
            </main>

            {{-- Footer di paling bawah, kecuali di dashboard admin --}}
            @unless (
                request()->routeIs('dashboard.admin') ||
                request()->routeIs('dashboard.shop.*') ||
                request()->routeIs('dashboard.speaker.*') ||
                request()->routeIs('dashboard.events.*') ||
                request()->routeIs('pages.notfound')
            )
                @include('components.footer')
            @endunless

            @stack('scripts')
        </div>
        <!-- Custom X Cursor -->
        <div id="custom-x-cursor" class="hidden md:block pointer-events-none fixed z-50" style="width:48px;height:48px;"></div>
        <script>
            const customXCursor = document.getElementById('custom-x-cursor');
            let mouseMoveHandler = null;
            let mouseLeaveHandler = null;

            function isDesktop() {
                return window.innerWidth >= 768;
            }

            function enableCustomCursor() {
                if (mouseMoveHandler) return; // sudah aktif
                mouseMoveHandler = function(e) {
                    customXCursor.style.left = (e.clientX - 24) + 'px';
                    customXCursor.style.top = (e.clientY - 24) + 'px';
                    customXCursor.innerHTML = `
                        <img src="{{ asset('img/tedunand.webp') }}" alt="TEDx Cursor" style="width:48px;height:48px;object-fit:contain;pointer-events:none;user-select:none;" draggable="false" />
                    `;
                    customXCursor.style.display = 'block';
                };
                mouseLeaveHandler = function() {
                    customXCursor.style.display = 'none';
                };
                document.addEventListener('mousemove', mouseMoveHandler);
                document.addEventListener('mouseleave', mouseLeaveHandler);
                customXCursor.style.display = 'block';
            }

            function disableCustomCursor() {
                if (!mouseMoveHandler) return; // sudah nonaktif
                document.removeEventListener('mousemove', mouseMoveHandler);
                document.removeEventListener('mouseleave', mouseLeaveHandler);
                mouseMoveHandler = null;
                mouseLeaveHandler = null;
                customXCursor.style.display = 'none';
            }

            function updateCursorState() {
                if (isDesktop()) {
                    enableCustomCursor();
                } else {
                    disableCustomCursor();
                }
            }

            // Jalankan saat load dan saat resize
            updateCursorState();
            window.addEventListener('resize', updateCursorState);
        </script>
    </body>
</html>
