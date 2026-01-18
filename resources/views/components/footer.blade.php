<footer class="bg-[#0a0d14] text-white py-6 px-4">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center">
        <!-- Logo & Nama -->
        <div class="flex flex-col items-center md:items-start w-full md:w-1/3 mb-4 md:mb-0">
            <img src="{{ asset('img/TEDxUniversitasAndalas.webp') }}" alt="TEDx Unand" class="w-32 h-auto mb-2" />
        </div>
        <!-- Social Media & Quick Links (independen kiri-kanan) -->
        <div class="w-full md:w-1/3 mb-4 md:mb-0 relative h-12 flex items-center">
            <!-- Social Media (kiri) -->
            <div class="absolute -left-[12rem] flex gap-4">
                <a href="https://www.instagram.com/tedxunand/" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('img/socialmedia/instagram.webp') }}" alt="Instagram" class="w-7 h-7 invert transition-transform duration-200 hover:scale-125" />
                </a>
                <a href="https://www.linkedin.com/company/tedxuniversitasandalas/" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('img/socialmedia/linkedin.webp') }}" alt="LinkedIn" class="w-7 h-7 invert transition-transform duration-200 hover:scale-125" />
                </a>
                <a href="mailto:tedxuniversitasandalas@gmail.com" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('img/socialmedia/mail.webp') }}" alt="Email" class="w-7 h-7 invert transition-transform duration-200 hover:scale-125" />
                </a>
            </div>
            <!-- Quick Links (kanan) -->
            <div class="absolute right-[8rem] flex gap-4">
                <a href="/" class="text-xs flex flex-col items-center">
                    <img src="{{ asset('img/quicklinks/home.webp') }}" alt="Home" class="w-6 h-6 mb-1 invert transition-transform duration-200 hover:scale-125" />
                </a>
                <a href="/about" class="text-xs flex flex-col items-center">
                    <img src="{{ asset('img/quicklinks/about.webp') }}" alt="About" class="w-6 h-6 mb-1 invert transition-transform duration-200 hover:scale-125" />
                </a>
                <a href="/sponsorship" class="text-xs flex flex-col items-center">
                    <img src="{{ asset('img/quicklinks/sponsor.webp') }}" alt="Sponsor" class="w-6 h-6 mb-1 invert transition-transform duration-200 hover:scale-125" />
                </a>
                <a href="/faq" class="text-xs flex flex-col items-center">
                    <img src="{{ asset('img/quicklinks/faq.webp') }}" alt="FAQ" class="w-6 h-6 mb-1 invert transition-transform duration-200 hover:scale-125" />
                </a>
                <a href="/events" class="text-xs flex flex-col items-center">
                    <img src="{{ asset('img/quicklinks/events.webp') }}" alt="Events" class="w-6 h-6 mb-1 invert transition-transform duration-200 hover:scale-125" />
                </a>
                <a href="/shop" class="text-xs flex flex-col items-center">
                    <img src="{{ asset('img/quicklinks/shop.webp') }}" alt="Shop" class="w-6 h-6 mb-1 invert transition-transform duration-200 hover:scale-125" />
                </a>
            </div>
        </div>
        <!-- Copyright -->
        <div class="flex flex-col items-center md:items-end w-full md:w-1/3">
            <span class="text-base font-medium">&copy; 2025 All Rights Reserved</span>
            <span class="text-sm text-gray-400 mt-1 text-center md:text-right">
                This independent <span class="text-red-600 font-semibold">TEDx</span> event is operated under license from TED.
            </span>
        </div>
    </div>
</footer>




