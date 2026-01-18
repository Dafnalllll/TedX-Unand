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
                cursor: none !important;
            }
            @media (min-width: 768px) {
                html, body, * {
                    cursor: none !important;
                }
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <!-- Loading Overlay -->
        @include('components.loading')
        <div class="min-h-screen flex flex-col bg-white dark:bg-gray-900">
            {{-- Navbar di paling atas --}}
            @include('components.navbar')

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
            @unless (request()->routeIs('dashboard.admin'))
                @include('components.footer')
            @endunless

            @stack('scripts')
        </div>
        <!-- Custom X Cursor -->
        <div id="custom-x-cursor" class="hidden md:block pointer-events-none fixed z-50" style="width:48px;height:48px;"></div>
        <script>
            const customXCursor = document.getElementById('custom-x-cursor');
            document.addEventListener('mousemove', function(e) {
                customXCursor.style.left = (e.clientX - 24) + 'px';
                customXCursor.style.top = (e.clientY - 24) + 'px';
                customXCursor.innerHTML = `
                    <img src="{{ asset('img/tedunand.webp') }}" alt="TEDx Cursor" style="width:48px;height:48px;object-fit:contain;pointer-events:none;user-select:none;" draggable="false" />
                `;
                customXCursor.style.display = 'block';
            });
            document.addEventListener('mouseleave', function() {
                customXCursor.style.display = 'none';
            });

            // Loading overlay logic
            const loadingOverlay = document.querySelector('.loading-overlay');
            if (loadingOverlay) {
                loadingOverlay.style.display = 'flex';
                window.addEventListener('load', function() {
                    setTimeout(function() {
                        loadingOverlay.style.display = 'none';
                    }, 600); // 1.2 detik, bisa diubah sesuai selera
                });
                // Optional: show loading on internal link click
                document.querySelectorAll('a').forEach(function(link) {
                    link.addEventListener('click', function(e) {
                        if (
                            link.target !== '_blank' &&
                            link.href &&
                            !link.href.startsWith('javascript:') &&
                            link.href.indexOf('#') === -1 &&
                            link.hostname === window.location.hostname
                        ) {
                            loadingOverlay.style.display = 'flex';
                        }
                    });
                });
            }
        </script>
    </body>
</html>
