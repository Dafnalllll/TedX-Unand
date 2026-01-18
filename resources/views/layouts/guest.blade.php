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
    <body class="font-sans text-gray-900 antialiased">
        <!-- Loading Overlay -->
        @include('components.loading')
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            {{ $slot }}
        </div>
        <!-- Custom X Cursor -->
        <img id="custom-x-cursor"
                src="{{ asset('img/tedunand.webp') }}"
                style="position:fixed;left:0;top:0;width:48px;height:48px;pointer-events:none;user-select:none;z-index:99999;transform:translate(-50%,-50%);"
                draggable="false"
                alt="TEDx Cursor" />
        <script>
            document.addEventListener('mousemove', function(e) {
                const cursor = document.getElementById('custom-x-cursor');
                if (cursor) {
                    cursor.style.left = e.clientX + 'px';
                    cursor.style.top = e.clientY + 'px';
                }
            });

            document.addEventListener('mouseleave', function() {
                customXCursor.style.display = 'none';
            });

            const loadingOverlay = document.querySelector('.loading-overlay');
            if (loadingOverlay) {
                loadingOverlay.style.display = 'flex';
                window.addEventListener('load', function() {
                    setTimeout(function() {
                        loadingOverlay.style.display = 'none';
                    }, 600); // 0.6 detik, bisa diubah sesuai selera
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
