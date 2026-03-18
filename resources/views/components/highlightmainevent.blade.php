<!-- Tambahkan Tailwind CSS jika belum ada -->
<div class="w-full py-10 mb-8 mt-24">
  <!-- SVG dekoratif -->
  <div class="flex justify-center mb-4">
    <svg width="420" height="120">
      <defs>
        <linearGradient id="highlight-gradient" x1="0" y1="0" x2="1" y2="0">
          <stop offset="0%" stop-color="#f59e42"/>
          <stop offset="100%" stop-color="#ff5f6d"/>
        </linearGradient>
      </defs>
      <path id="curve" d="M20,100 Q210,20 400,100" fill="transparent"/>
      <text font-size="42" font-family="Inter, sans-serif" font-weight="bold" letter-spacing="4">
        <textPath href="#curve" startOffset="50%" text-anchor="middle" fill="url(#highlight-gradient)">
          Highlight
        </textPath>
      </text>
    </svg>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-4 max-w-6xl mx-auto">
    <!-- Card 1: Full photo, overlay content -->
    <div data-aos="fade-up" class="relative rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition h-96 md:col-span-2 group">
      <img src="/img/event/mainevent/theunwrittenatlas/theunwrittenatlas6.webp" alt="Event 1" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
      <div class="absolute bottom-0 left-0 right-0 p-6 text-white z-10">
        <h3 class="text-2xl font-bold mb-1 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
            The Unwritten Atlas
        </h3>
        <p class="text-sm mb-4 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 delay-100">
         Charting new paths together to #RechartTheWorld🗺.
        </p>
      </div>
    </div>
    <!-- Card 2: Full photo, overlay content -->
    <div data-aos="fade-right" class="relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition h-96 group">
      <img src="/img/event/mainevent/theunwrittenatlas/theunwrittenatlas10.webp" alt="Event 2" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
      <div class="absolute bottom-0 left-0 right-0 p-6 text-white z-10">
        <h3 class="text-lg font-bold mb-1 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
        Monologue
        </h3>
        <p class="text-sm mb-4 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 delay-100">
          Najwa Amilus
        </p>
      </div>
    </div>
    <!-- Card 3: Full photo, overlay content -->
    <div data-aos="fade-left" class="relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition h-96 group">
      <img src="/img/event/mainevent/theunwrittenatlas/speaker8.webp" alt="Event 3" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
      <div class="absolute bottom-0 left-0 right-0 p-6 text-white z-10">
        <h3 class="text-lg font-bold mb-1 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
          Student Speaker
        </h3>
        <p class="text-sm mb-4 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 delay-100">
          Muhammad Athaya Budiman
        </p>
      </div>
    </div>
    <!-- Card 4: Full photo, overlay content -->
    <div data-aos="fade-up" class="relative rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition h-96 md:col-span-2 group">
      <img src="/img/event/mainevent/theunwrittenatlas/theunwrittenatlas9.webp" alt="Event 4" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
       <div class="absolute bottom-0 left-0 right-0 p-6 text-white z-10">
        <h3 class="text-lg font-bold mb-1 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
          FW Youth Orchestra
        </h3>
        <p class="text-sm mb-4 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 delay-100">
            The Art of Harmony
        </p>
      </div>
    </div>
  </div>
</div>
