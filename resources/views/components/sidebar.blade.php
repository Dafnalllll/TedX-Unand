<aside class="w-64 min-h-screen bg-gradient-to-b from-red-700 via-black to-gray-900 text-white flex flex-col shadow-2xl relative overflow-hidden">
    <!-- Decorative Gradient Circles -->
    <div class="absolute -top-10 -left-10 w-32 h-32 bg-red-500 opacity-30 rounded-full blur-2xl"></div>
    <div class="absolute bottom-10 right-0 w-24 h-24 bg-yellow-400 opacity-20 rounded-full blur-2xl"></div>
    <div class="absolute top-1/2 left-1/2 w-16 h-16 bg-white opacity-10 rounded-full blur-xl"></div>
    <!-- Logo -->
    <div class="p-6 flex flex-col items-start  z-10 relative">
        <img src="{{ asset('img/TEDxUniversitasAndalas.webp') }}" alt="TEDx Unand Logo" class="w-32 h-32 object-contain mb-2 drop-shadow" />
    </div>
    <nav class="flex-1 p-4 space-y-8 z-10 relative">
        <a href="{{ url('/admin') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-white/10 hover:scale-105 transition-all duration-200 font-semibold {{ request()->is('admin') ? 'bg-white/10' : '' }}">
            <img src="{{ asset('img/admin/admin.webp') }}" alt="Dashboard" class="w-6 h-6 object-contain filter" style="filter: brightness(0) saturate(100%) invert(80%) sepia(100%) saturate(5000%) hue-rotate(90deg) brightness(120%) contrast(120%);" />
            Dashboard
        </a>
        <a href="{{ url('/admin/event') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-white/10 hover:scale-105 transition-all duration-200 font-semibold {{ request()->is('admin/event') ? 'bg-white/10' : '' }}">
            <img src="{{ asset('img/admin/events.webp') }}" alt="Events" class="w-6 h-6 object-contain filter" style="filter: brightness(0) saturate(100%) invert(23%) sepia(99%) saturate(2000%) hue-rotate(-10deg) brightness(105%) contrast(105%);" />
            Events
        </a>
        <a href="{{ url('/admin/shop') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-white/10 hover:scale-105 transition-all duration-200 font-semibold {{ request()->is('admin/shop') ? 'bg-white/10' : '' }}">
            <img src="{{ asset('img/admin/shop.webp') }}" alt="Shop" class="w-6 h-6 object-contain filter" style="filter: brightness(0) saturate(100%) invert(60%) sepia(100%) saturate(5000%) hue-rotate(320deg) brightness(120%) contrast(120%);" />
            Shop
        </a>
        <a href="{{ url('/admin/speaker') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-white/10 hover:scale-105 transition-all duration-200 font-semibold {{ request()->is('admin/speaker') ? 'bg-white/10' : '' }}">
            <img src="{{ asset('img/admin/speaker.webp') }}" alt="Speakers" class="w-6 h-6 object-contain filter" style="filter: brightness(0) saturate(100%) invert(88%) sepia(99%) saturate(2000%) hue-rotate(10deg) brightness(110%) contrast(110%);" />
            Speakers
        </a>
    </nav>
    <div class="p-4 border-t border-white/10 text-sm text-gray-300 z-10 relative">
        &copy; {{ date('Y') }} <span class="font-bold text-white">TEDxUnand</span>
    </div>
</aside>
