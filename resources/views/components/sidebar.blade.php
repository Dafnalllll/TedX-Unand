<!-- Hamburger Button (mobile only) -->
<button id="sidebar-toggle"
    class="fixed top-4 left-4 z-50 bg-gradient-to-br from-red-600 via-yellow-400 to-red-600 text-white rounded-full p-3 shadow-lg md:hidden transition hover:scale-110 focus:outline-none"
    aria-label="Open Sidebar">
    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
    </svg>
</button>

<aside id="admin-sidebar"
    class="fixed left-0 top-0 w-full md:w-64 min-h-screen bg-gradient-to-b from-red-700 via-black to-gray-900 text-white flex flex-col shadow-2xl z-30
    transition-transform duration-300 -translate-y-full md:translate-y-0 md:static"
>
    <!-- Tombol Close (mobile only, pojok kanan atas) -->
    <button id="sidebar-close"
        class="absolute top-4 right-4 z-50 bg-gradient-to-br from-gray-900 via-red-600 to-yellow-400 text-white rounded-full p-2 shadow-lg md:hidden transition hover:scale-110 focus:outline-none"
        aria-label="Close Sidebar"
        style="display: none;">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M6 18L18 6"/>
        </svg>
    </button>
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
        <a href="{{ url('/admin/event') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-white/10 hover:scale-105 transition-all duration-200 font-semibold {{ request()->is('admin/event*') ? 'bg-white/10' : '' }}">
            <img src="{{ asset('img/admin/events.webp') }}" alt="Events" class="w-6 h-6 object-contain filter" style="filter: brightness(0) saturate(100%) invert(23%) sepia(99%) saturate(2000%) hue-rotate(-10deg) brightness(105%) contrast(105%);" />
            Event
        </a>
        <a href="{{ url('/admin/shop') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-white/10 hover:scale-105 transition-all duration-200 font-semibold {{ request()->is('admin/shop*') ? 'bg-white/10' : '' }}">
            <img src="{{ asset('img/admin/shop.webp') }}" alt="Shop" class="w-6 h-6 object-contain filter" style="filter: brightness(0) saturate(100%) invert(60%) sepia(100%) saturate(5000%) hue-rotate(320deg) brightness(120%) contrast(120%);" />
            Shop
        </a>
        <a href="{{ url('/admin/speaker') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-white/10 hover:scale-105 transition-all duration-200 font-semibold {{ request()->is('admin/speaker*') ? 'bg-white/10' : '' }}">
            <img src="{{ asset('img/admin/speaker.webp') }}" alt="Speakers" class="w-6 h-6 object-contain filter" style="filter: brightness(0) saturate(100%) invert(88%) sepia(99%) saturate(2000%) hue-rotate(10deg) brightness(110%) contrast(110%);" />
            Speaker
        </a>
    </nav>
    <form method="POST" action="{{ route('logout') }}" class="p-4 z-10 relative">
        @csrf
        <button type="submit" class="w-full flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-white/10 hover:scale-105 transition-all duration-200 font-semibold text-left">
            <img src="{{ asset('img/auth/logout.webp') }}" alt="Logout" class="w-6 h-6 object-contain filter" style="filter: brightness(0) saturate(100%) invert(20%) sepia(100%) saturate(2000%) hue-rotate(-30deg) brightness(110%) contrast(110%);" />
            Logout
        </button>
    </form>
    <div class="p-4 border-t border-white/10 text-sm text-gray-300 z-10 relative text-center md:text-left">
        &copy; {{ date('Y') }} <span class="font-bold text-white">TEDxUnand</span>
    </div>
</aside>

<style>
@media (max-width: 768px) {
    #admin-sidebar {
        width: 100vw !important;
        min-width: 0 !important;
        max-width: 100vw !important;
        height: auto !important;
        min-height: 0 !important;
        border-radius: 0 0 1.5rem 1.5rem;
        left: 0;
        top: 0;
        z-index: 50;
        box-shadow: 0 4px 24px 0 rgba(0,0,0,0.15);
        padding-bottom: 0.5rem;
        transform: translateY(-100%);
    }
    #admin-sidebar.show {
        transform: translateY(0) !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('admin-sidebar');
    const toggle = document.getElementById('sidebar-toggle');
    const closeBtn = document.getElementById('sidebar-close');
    // Show/hide close button on sidebar open/close
    function updateCloseBtn() {
        if (window.innerWidth < 768 && sidebar.classList.contains('show')) {
            closeBtn.style.display = 'block';
        } else {
            closeBtn.style.display = 'none';
        }
    }
    document.addEventListener('click', function(e) {
        if (window.innerWidth < 768) {
            if (!sidebar.contains(e.target) && !toggle.contains(e.target)) {
                sidebar.classList.remove('show');
                updateCloseBtn();
            }
        }
    });
    toggle.addEventListener('click', function(e) {
        e.stopPropagation();
        sidebar.classList.toggle('show');
        updateCloseBtn();
    });
    closeBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        sidebar.classList.remove('show');
        updateCloseBtn();
    });
    window.addEventListener('resize', updateCloseBtn);
});
</script>
