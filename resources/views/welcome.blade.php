<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">
    <title>TEDx Universitas Andalas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
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
@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
        animation-timing-function: cubic-bezier(0.8,0,1,1);
    }
    50% {
        transform: translateY(-40px);
        animation-timing-function: cubic-bezier(0,0,0.2,1);
    }
}
.animate-bounce {
    animation: bounce 3.2s infinite;
}
.btn-fill-center {
    position: relative;
    overflow: hidden;
    z-index: 1;
    transition: color 0.3s;
}
.btn-fill-center::before {
    content: "";
    position: absolute;
    left: 50%;
    top: 0;
    width: 0;
    height: 100%;
    z-index: 0;
    background: #d61a1ad1;
    transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1),
        left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border-radius: 1.2rem;
}
.btn-fill-center:hover::before {
    left: 0;
    width: 100%;
}
.switch-btn {
    position: absolute;
    left: 50%;
    top: calc(100% + 18px);
    transform: translateX(-50%);
    background: #232323;
    color: #fff;
    border: none;
    border-radius: 1.1rem;
    padding: 0.5rem 1.4rem;
    font-size: 1.1rem;
    font-family: 'Inter', Arial, sans-serif;
    font-weight: 500;
    letter-spacing: 0.04em;
    /* Neumorphism: outer + inner shadow */
    box-shadow:
        6px 6px 18px #181818cc,    /* shadow gelap */
        -6px -6px 18px #353535cc,  /* shadow terang */
        inset 2px 2px 8px #18181899,   /* inner shadow gelap */
        inset -2px -2px 8px #35353599; /* inner shadow terang */
    opacity: 0;
    transition:
        opacity 0.25s,
        box-shadow 0.25s,
        transform 0.25s;
    pointer-events: none;
    z-index: 10;
    text-shadow: 0 1px 4px #0005;
    display: flex;
    align-items: center;
    gap: 0.7rem;
    white-space: nowrap;
    min-width: 120px;
    justify-content: center;
    /* Tambahan efek border tipis */
    outline: 1.5px solid #2d2d2d;
    outline-offset: 0px;
}
.switch-btn.active {
    opacity: 1;
    pointer-events: auto;
    box-shadow:
        8px 8px 24px #181818cc,
        -8px -8px 24px #353535cc,
        inset 2px 2px 8px #18181899,
        inset -2px -2px 8px #35353599;
    transform: translateX(-50%) scale(1.03);
}
html, body, a, button, [role="button"], .group, * {
    cursor: none !important;
}
.switch-btn img[alt="X Icon"] {
    transition: transform 0.25s cubic-bezier(.4,2,.6,1);
}
.switch-btn:hover img[alt="X Icon"],
.switch-btn:focus img[alt="X Icon"] {
    transform: scale(1.18);
}
    </style>
</head>
<body class="bg-black min-h-screen flex flex-col relative overflow-hidden">
    @include("components.loading")
    <div class="flex items-center justify-center min-h-screen relative">
        <div class="switch-btn-group relative flex items-center justify-center">
            <img src="{{ asset('img/TEDxUniversitasAndalas.webp') }}" alt="TEDx Unand"
                    id="tedx-img"
                    class="w-64 h-64 object-contain animate-bounce"
                    style="cursor:pointer;" tabindex="0" />
            <div class="switch-btn btn-fill-center" id="getready-btn" role="button" tabindex="0"
                onclick="window.location.href='{{ url('/dashboard') }}'">
                <img src="{{ asset('img/x.webp') }}" alt="X Icon"
                    style="width: 32px; height: 32px; margin-left: 0.7rem; display: inline-block; vertical-align: middle; position: relative; z-index: 2;" />
                <span class="arrow">
                    <svg viewBox="0 0 24 24">
                        <path d="M8 5l8 7-8 7" />
                    </svg>
                </span>
            </div>
        </div>
    </div>
    <div id="custom-x-cursor" class="hidden md:block pointer-events-none fixed z-50" style="width:48px;height:48px;"></div>
    <script>
        document.getElementById('tedx-img').addEventListener('click', function() {
            const btn = document.getElementById('getready-btn');
            const typeTarget = document.getElementById('getready-typewriter');
            btn.classList.add('active');
            // Typewriter animation
            const text = "Get Ready";
            let i = 0;
            typeTarget.textContent = "";
            function type() {
                if (i <= text.length) {
                    typeTarget.textContent = text.slice(0, i);
                    i++;
                    setTimeout(type, 70);
                }
            }
            type();
        });
    </script>
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
    </script>
    <script>
    // Tampilkan loading saat halaman mulai dimuat
    document.querySelector('.loading-overlay').style.display = 'flex';

    // Minimal tampil 1.8 detik
    window.addEventListener('load', function() {
        setTimeout(function() {
            document.querySelector('.loading-overlay').style.display = 'none';
        }, 1800);
    });
</script>
</body>
</html>
