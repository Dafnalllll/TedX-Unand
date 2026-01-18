<!-- filepath: d:\Dafa Code\TedXUnand\resources\views\components\loading.blade.php -->
<div class="loading-overlay fixed inset-0 z-[99999] flex flex-col items-center justify-center bg-black/90" style="display: none;">
    <div class="relative mb-8 flex flex-col items-center">
        <!-- X bounce naik-turun dengan glow -->
        <div class="relative">
            <img src="{{ asset('img/tedx.webp') }}" alt="Loading TEDx"
                class="w-30 h-24 animate-x-fade drop-shadow-xl"
                style="filter: brightness(1.2);" />
            <span class="absolute inset-0 rounded-full blur-2xl opacity-50 pointer-events-none"
                style="background: radial-gradient(circle, #F53003 0%, transparent 70%);"></span>
        </div>
        <!-- Dots bounce -->
        <div class="flex gap-2 mt-6">
            <span class="dot-bounce" style="animation-delay:0s;"></span>
            <span class="dot-bounce" style="animation-delay:0.15s;"></span>
            <span class="dot-bounce" style="animation-delay:0.3s;"></span>
        </div>
    </div>
    <style>
        @keyframes x-fade {
            0%, 100% { opacity: 1;}
            50% { opacity: 0.2;}
        }
        .animate-x-fade {
            animation: x-fade 1.2s infinite;
        }
        .dot-bounce {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #F53003;
            opacity: 0.85;
            animation: dot-bounce 0.8s infinite cubic-bezier(.68,-0.55,.27,1.55);
        }
        @keyframes dot-bounce {
            0%, 80%, 100% { transform: translateY(0);}
            40% { transform: translateY(-18px);}
        }
    </style>
</div>
