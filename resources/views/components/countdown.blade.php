<div class="text-center mb-10">
        <img src="{{ asset('img/event/mainevent/theunwrittenatlas1.webp') }}"
            alt="The Unwritten Atlas"
            class="mx-auto mb-4 max-w-xs md:max-w-sm rounded-xl shadow-lg animate-pulse border border-white/30 bg-yellow-600"
            data-aos="zoom-in"
            data-aos-duration="1200"
            data-aos-delay="200"
        />
        <span class="text-gray-100 text-base tracking-wider font-semibold"
            data-aos="fade-up"
            data-aos-duration="1200"
            data-aos-delay="600"
        >
            Let’s count down together to a day full of innovation, inspiration, and impact!
        </span>
    </div>
<div id="countdown" class="flex gap-2 md:gap-10 justify-center items-center text-white text-3xl md:text-5xl font-bold">
    <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">
        <span id="days" class="bg-black/60 px-6 py-4 rounded-xl shadow-lg border-2 border-red-500 animate-bounce">00</span>
        <span class="text-xs md:text-base mt-2 tracking-widest text-red-300">DAYS</span>
    </div>
    <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
        <span id="hours" class="bg-black/60 px-6 py-4 rounded-xl shadow-lg border-2 border-red-500 animate-bounce">00</span>
        <span class="text-xs md:text-base mt-2 tracking-widest text-red-300">HOURS</span>
    </div>
    <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
        <span id="minutes" class="bg-black/60 px-6 py-4 rounded-xl shadow-lg border-2 border-red-500 animate-bounce">00</span>
        <span class="text-xs md:text-base mt-2 tracking-widest text-red-300">MINUTES</span>
    </div>
    <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
        <span id="seconds" class="bg-black/60 px-6 py-4 rounded-xl shadow-lg border-2 border-red-500 animate-bounce">00</span>
        <span class="text-xs md:text-base mt-2 tracking-widest text-red-300">SECONDS</span>
    </div>
</div>

@push('scripts')
<script>
    // Pastikan event_date dalam format ISO 8601
    const eventDateString = "{{ $eventDate ?? '2026-03-14T09:00:00' }}";
    const eventDate = new Date(eventDateString).getTime();

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = eventDate - now;

        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("days").textContent = days.toString().padStart(2, '0');
        document.getElementById("hours").textContent = hours.toString().padStart(2, '0');
        document.getElementById("minutes").textContent = minutes.toString().padStart(2, '0');
        document.getElementById("seconds").textContent = seconds.toString().padStart(2, '0');

        if (distance < 0) {
            document.getElementById("countdown").innerHTML = "<span class='text-4xl text-red-400 font-bold animate-pulse'>The Event Has Started!</span>";
        }
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
</script>
@endpush
