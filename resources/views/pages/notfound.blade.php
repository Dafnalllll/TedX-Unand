<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 Not Found | TEDxUnand</title>
    <link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <style>
        html, body, a, button, [role="button"], .group, * {
            cursor: none !important;
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            background: radial-gradient(ellipse at top left, #222 60%, #1a1a1a 100%);
            overflow: hidden;
            font-family: 'Inter', Arial, sans-serif;
        }
        .container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .x-bg {
            position: absolute;
            left: 50%;
            top: 0;
            transform: translate(-50%, 0);
            opacity: 0.10;
            pointer-events: none;
            user-select: none;
            z-index: 0;
            filter: blur(2px) brightness(0.8);
            animation: x-move-down 1.2s cubic-bezier(.77,0,.18,1) 0.2s forwards;
        }
        @keyframes x-move-down {
            0% {
                top: -300px;
                opacity: 0;
                transform: translate(-50%, 0) scale(0.8);
            }
            60% {
                opacity: 0.10;
                transform: translate(-50%, 30px) scale(1.05);
            }
            100% {
                top: 50%;
                opacity: 0.10;
                transform: translate(-50%, -50%) scale(1);
            }
        }
        .x-bg img {
            width: 600px;
            animation: spin-slow 18s linear infinite;
        }
        @keyframes spin-slow {
            0% { transform: rotate(0deg);}
            100% { transform: rotate(360deg);}
        }
        .content {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
            padding: 2rem 1rem;
            background: rgba(30,30,30,0.7);
            border-radius: 2rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.25);
            backdrop-filter: blur(2px);
        }
        .error-code {
            font-size: 7rem;
            font-weight: 700;
            color: #E62B1E;
            text-shadow: 0 2px 16px rgba(0,0,0,0.4);
            margin-bottom: 0.5rem;
            animation: bounce 1.5s infinite;
            font-family: 'Inter', Arial, sans-serif;
            letter-spacing: 2px;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0);}
            50% { transform: translateY(-20px);}
        }
        .error-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 0.5rem;
            letter-spacing: 2px;
            font-family: 'Inter', Arial, sans-serif;
            text-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
        .error-desc {
            font-size: 1.15rem;
            color: #fff;
            opacity: 0.85;
            margin-bottom: 1.5rem;
            text-align: center;
            max-width: 500px;
            font-family: 'Inter', Arial, sans-serif;
            line-height: 1.7;
            text-shadow: 0 1px 4px rgba(0,0,0,0.15);
        }
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2.5rem;
            border-radius: 999px;
            background: linear-gradient(90deg, #E62B1E 60%, #ff6a3d 100%);
            color: #fff;
            font-weight: 600;
            font-size: 1.1rem;
            box-shadow: 0 2px 12px rgba(230,43,30,0.15);
            border: none;
            text-decoration: none;
            transition:
                background 0.2s,
                color 0.2s,
                border-color 0.2s,
                transform 0.18s cubic-bezier(.77,0,.18,1),
                box-shadow 0.18s cubic-bezier(.77,0,.18,1),
                filter 0.18s cubic-bezier(.77,0,.18,1);
            font-family: 'Inter', Arial, sans-serif;
            border: 2px solid #E62B1E;
            outline: none;
            will-change: transform, box-shadow, filter;
        }
        .back-btn:hover {
            background: linear-gradient(90deg, #fff 60%, #ffe5e0 100%);
            color: #E62B1E;
            border-color: #ff6a3d;
            transform: scale(1.09) translateY(-4px);
            box-shadow: 0 12px 32px rgba(230,43,30,0.22);
            filter: brightness(1.07) drop-shadow(0 0 8px #E62B1E44);
        }
        .back-btn svg {
            width: 1.5rem;
            height: 1.5rem;
            transition:
                transform 0.25s cubic-bezier(.77,0,.18,1),
                stroke 0.2s,
                color 0.2s,
                filter 0.2s;
            stroke: #fff;
        }
        .back-btn:hover svg {
            animation: house-bounce 0.7s;
            stroke: #E62B1E;
            color: #E62B1E;
            transform: scale(1.25) rotate(-12deg);
            filter: drop-shadow(0 0 6px #E62B1E88);
        }
        @keyframes house-bounce {
            0%   { transform: scale(1) rotate(0deg);}
            30%  { transform: scale(1.25) rotate(-12deg);}
            50%  { transform: scale(0.95) rotate(8deg);}
            70%  { transform: scale(1.15) rotate(-8deg);}
            100% { transform: scale(1.25) rotate(-12deg);}
        }
        #custom-x-cursor {
            position: fixed;
            z-index: 9999;
            width: 48px;
            height: 48px;
            pointer-events: none;
            user-select: none;
            display: none;
            /* mix-blend-mode: normal; */
        }
        @media (min-width: 768px) {
            .error-code { font-size: 9rem; }
            .error-title { font-size: 2.7rem; }
            .error-desc { font-size: 1.25rem; }
            .content { padding: 3rem 2rem; }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- X yang berputar, transisi ke tengah, di belakang card -->
        <div class="x-bg">
            <img src="{{ asset('img/tedunand.webp') }}" alt="TEDx X">
        </div>
        <div class="content" data-aos="zoom-in" data-aos-duration="900">
            <div class="error-code" data-aos="fade-down" data-aos-delay="200">404</div>
            <div class="error-title" data-aos="fade-up" data-aos-delay="400">Page Not Found</div>
            <div class="error-desc" data-aos="fade-up" data-aos-delay="600">
                Oops! The page you are looking for doesn’t exist or has been moved.<br>
                Let’s get you back to something inspiring!
            </div>
            <a href="{{ url('/dashboard') }}" class="back-btn" data-aos="fade-up" data-aos-delay="800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6" />
                </svg>
                Back to Home
            </a>
        </div>
    </div>
    <!-- Custom X Cursor -->
    <div id="custom-x-cursor"></div>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ once: true });

        // Custom TEDx cursor image
        const customXCursor = document.getElementById('custom-x-cursor');
        document.addEventListener('mousemove', function(e) {
            customXCursor.style.left = (e.clientX - 24) + 'px';
            customXCursor.style.top = (e.clientY - 24) + 'px';
            customXCursor.innerHTML = `
                <img src="{{ asset('img/tedunand.webp') }}" alt="TEDx Cursor"
                    style="width:48px;height:48px;object-fit:contain;pointer-events:none;user-select:none;draggable=false;" />
            `;
            customXCursor.style.display = 'block';
        });
        document.addEventListener('mouseleave', function() {
            customXCursor.style.display = 'none';
        });
    </script>
</body>
</html>
