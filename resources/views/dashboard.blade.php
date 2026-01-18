<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">
        <title>Home | TEDxUniversitas Andalas</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <!-- Tambahkan font baru -->
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Montserrat:wght@900&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
        @endif

        <!-- AOS CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

        <style>
            html, body, a, button, [role="button"], .group, * {
                cursor: none !important;
            }

            @keyframes tedx-spin {
                0% { transform: translate(-50%, -50%) rotate(0deg);}
                100% { transform: translate(-50%, -50%) rotate(360deg);}
            }
            @keyframes tedx-spin-rev {
                0% { transform: translate(-50%, -50%) rotate(0deg);}
                100% { transform: translate(-50%, -50%) rotate(-360deg);}
            }
        </style>
    </head>
    <body class="bg-[#FDFDFC] text-[#1b1b18] min-h-screen flex flex-col relative overflow-x-hidden"
    style="background: url('{{ asset('img/tedbg.webp') }}') center center / cover no-repeat;">

    {{-- Import Loading --}}
    @include('components.loading')
    <!-- Overlay hitam dengan opacity -->
    <div class="absolute inset-0 bg-black opacity-60 pointer-events-none z-0"></div>

    <!-- Animated cursor background effect -->
    <div id="cursor-anim-bg" class="pointer-events-none fixed top-0 left-0 w-full h-full z-10"></div>
    <div id="custom-x-cursor" class="hidden md:block pointer-events-none fixed z-50" style="width:48px;height:48px;"></div>

    {{-- Import Navbar --}}
    <x-navbar class="relative z-20" />

    <div class="relative z-20 flex-1 flex items-center">
        <!-- Konten utama di sini -->
        <div class="w-full max-w-xl md:ml-24 ml-0 flex flex-col items-start px-4 md:px-6 py-10 mx-auto"
                data-aos="fade-right"
                data-aos-duration="1000"
        >
            <!-- Typewriter Image -->
        <div id="typewriter-img-wrapper" class="mb-3" style="position: relative; display: inline-block; width: 340px; height: 80px;">
            <img id="typewriter-img" src="{{ asset('img/maintheme.webp') }}" alt="Main Theme"
                    style="width: 340px; height: 80px; object-fit: contain; display: block; clip-path: inset(0 100% 0 0); transition: clip-path 0.08s linear;">

            <!-- Cursor -->
            <span id="typewriter-cursor" style="position: absolute; top: 0; left: 0; width: 2px; height: 100%; background: #fff; display: none;"></span>
        </div>
            <a href="/about"
                class="group inline-block bg-[#F53003] hover:bg-[#c41e00] text-white font-bold px-5 py-2 rounded-md shadow transition-all duration-200 text-base transform hover:scale-105"
                style="font-family: 'Inter', Arial, sans-serif;">
                Explore Us
                <img src="{{ asset('img/explore.webp') }}" alt="Explore Icon"
                style="width: 22px; height: 22px; display: inline-block; vertical-align: middle; margin-left: 0.5rem;" />
            </a>
        </div>
    </div>

    <x-footer class="relative z-10" />

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- Cursor animation background -->
    <script>
        // Animated background effect
        const cursorBg = document.getElementById('cursor-anim-bg');
        const customXCursor = document.getElementById('custom-x-cursor');
        document.addEventListener('mousemove', function(e) {
            // Background anim
            cursorBg.innerHTML = `
                <div style="
                    position: absolute;
                    left: ${e.clientX - 100}px;
                    top: ${e.clientY - 100}px;
                    width: 200px;
                    height: 200px;
                    border-radius: 50%;
                    background: radial-gradient(circle, rgba(245,48,3,0.25) 0%, rgba(245,48,3,0.08) 70%, transparent 100%);
                    pointer-events: none;
                    transition: left 0.1s, top 0.1s;
                    filter: blur(8px);
                    z-index: 10;
                "></div>
            `;
            // Custom TEDx cursor image
            customXCursor.style.left = (e.clientX - 24) + 'px';
            customXCursor.style.top = (e.clientY - 24) + 'px';
            customXCursor.innerHTML = `
                <img src="{{ asset('img/tedunand.webp') }}" alt="TEDx Cursor" style="width:48px;height:48px;object-fit:contain;pointer-events:none;user-select:none;" draggable="false" />
            `;
            customXCursor.style.display = 'block';
        });
        document.addEventListener('mouseleave', function() {
            cursorBg.innerHTML = '';
            customXCursor.style.display = 'none';
        });
    </script>

    <!-- Animated TEDx X background, multiple spots -->
    <div style="
        position: fixed;
        left: 15%; top: 20%;
        width: 220px; height: 220px;
        transform: translate(-50%, -50%);
        opacity: 0.10;
        z-index: 0;
        pointer-events: none;
        user-select: none;
        background: url('{{ asset('img/tedunand.webp') }}') center center / contain no-repeat;
        animation: tedx-spin 60s linear infinite;
    "></div>
    <div style="
        position: fixed;
        left: 80%; top: 25%;
        width: 160px; height: 160px;
        transform: translate(-50%, -50%);
        opacity: 0.08;
        z-index: 0;
        pointer-events: none;
        user-select: none;
        background: url('{{ asset('img/tedunand.webp') }}') center center / contain no-repeat;
        animation: tedx-spin-rev 80s linear infinite;
    "></div>
    <div style="
        position: fixed;
        left: 30%; top: 75%;
        width: 120px; height: 120px;
        transform: translate(-50%, -50%);
        opacity: 0.12;
        z-index: 0;
        pointer-events: none;
        user-select: none;
        background: url('{{ asset('img/tedunand.webp') }}') center center / contain no-repeat;
        animation: tedx-spin 50s linear infinite;
    "></div>
    <div style="
        position: fixed;
        left: 70%; top: 70%;
        width: 180px; height: 180px;
        transform: translate(-50%, -50%);
        opacity: 0.09;
        z-index: 0;
        pointer-events: none;
        user-select: none;
        background: url('{{ asset('img/tedunand.webp') }}') center center / contain no-repeat;
        animation: tedx-spin-rev 70s linear infinite;
    "></div>
    <div style="
        position: fixed;
        left: 50%; top: 50%;
        width: 480px; height: 480px;
        transform: translate(-50%, -50%);
        opacity: 0.08;
        z-index: 0;
        pointer-events: none;
        user-select: none;
        background: url('{{ asset('img/tedunand.webp') }}') center center / contain no-repeat;
        animation: tedx-spin 40s linear infinite;
    "></div>

    <script>
document.addEventListener("DOMContentLoaded", function() {
    const img = document.getElementById("typewriter-img");
    const cursor = document.getElementById("typewriter-cursor");
    const steps = 34; // Semakin besar, semakin halus
    let i = 0;
    cursor.style.display = 'block';

    function reveal() {
        if (i <= steps) {
            let percent = (i / steps) * 100;
            img.style.clipPath = `inset(0 ${100 - percent}% 0 0)`;
            cursor.style.left = (img.width * percent / 100) + 'px';
            i++;
            setTimeout(reveal, 60);
        } else {
            cursor.style.display = 'none';
        }
    }
    reveal();
});
</script>

<!-- Tambahkan script loader sebelum </body> -->
<script>
    // Tampilkan loading saat halaman mulai dimuat
    document.querySelector('.loading-overlay').style.display = 'flex';

    // Sembunyikan loading setelah halaman selesai dimuat (dengan delay agar smooth)
    window.addEventListener('load', function() {
        setTimeout(function() {
            document.querySelector('.loading-overlay').style.display = 'none';
        }, 1200); // 1.2 detik, bisa diubah sesuai selera
    });

    // (Opsional) Tampilkan loading saat klik link internal
    document.querySelectorAll('a').forEach(function(link) {
        link.addEventListener('click', function(e) {
            if (
                link.target !== '_blank' &&
                link.href &&
                !link.href.startsWith('javascript:') &&
                link.href.indexOf('#') === -1 &&
                link.hostname === window.location.hostname
            ) {
                document.querySelector('.loading-overlay').style.display = 'flex';
            }
        });
    });
</script>
</body>
</html>
