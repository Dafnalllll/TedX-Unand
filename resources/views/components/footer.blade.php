<footer class="text-white py-6 px-4 relative"
    style="background: url('{{ asset('img/footer.webp') }}') center center / cover no-repeat;">
    <div class="absolute inset-0 bg-black bg-opacity-60 pointer-events-none z-0"></div>
    <div class="relative z-10 max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between">
        <!-- Sosial Media (kiri) -->
        <div class="flex-1 flex justify-start pl-4">
            <div class="flex gap-4">
                <a href="https://www.instagram.com/tedxunand/" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('img/socialmedia/instagram.webp') }}" alt="Instagram" class="w-7 h-7 invert transition-transform duration-200 hover:scale-125" />
                </a>
                <a href="https://www.linkedin.com/company/tedxuniversitasandalas/" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('img/socialmedia/linkedin.webp') }}" alt="LinkedIn" class="w-7 h-7 invert transition-transform duration-200 hover:scale-125" />
                </a>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=tedxuniversitasandalas@gmail.com&su=Pertanyaan%20seputar%20TEDxUnand&body=Halo%20TEDxUnand%2C%20saya%20ingin%20bertanya%20tentang..." target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('img/socialmedia/mail.webp') }}" alt="Email" class="w-7 h-7 invert transition-transform duration-200 hover:scale-125 mt-1" />
                </a>
            </div>
        </div>
        <!-- Logo & Copyright (tengah) -->
        <div class="flex-1 flex flex-col items-center justify-center">
            <img src="{{ asset('img/TEDxUniversitasAndalas.webp') }}" alt="TEDx Unand" class="w-32 h-auto mb-2" />
            <span class="text-base font-medium">&copy; 2025 All Rights Reserved</span>
            <span class="text-sm text-gray-400 mt-1 text-center">
                This independent <span class="text-red-600 font-semibold">TEDx</span> event is operated under license from TED.
            </span>
        </div>
        <!-- Quick Links (kanan) -->
        <div class="flex-1 flex justify-end pr-4">
            <div class="flex gap-4">
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
                {{--  <a href="/shop" class="text-xs flex flex-col items-center">
                    <img src="{{ asset('img/quicklinks/shop.webp') }}" alt="Shop" class="w-6 h-6 mb-1 invert transition-transform duration-200 hover:scale-125" />
                </a> --}}
            </div>
        </div>
    </div>
</footer>
