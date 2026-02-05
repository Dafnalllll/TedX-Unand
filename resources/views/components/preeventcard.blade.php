<style>
.preevent-card-grid {
    position: relative;
    width: 100%;
    min-height: 300px;
    height: 100%;
}
.preevent-card-item {
    position: absolute;
    transition:
        transform 0.7s cubic-bezier(.68,-0.55,.27,1.55),
        box-shadow 0.3s,
        filter 0.3s;
    border-radius: 1rem;
    overflow: hidden;
    cursor: pointer;
    z-index: 2;
    animation: floatCard 3s ease-in-out infinite alternate;
    position: absolute;
}
.preevent-card-item:hover {
    transform: scale(1.12) rotate(-4deg) translateY(-18px);
    box-shadow: 0 16px 40px #F5300350;
    filter: brightness(1.08);
}
.preevent-card-img {
    width: 220px;
    height: 160px;
    object-fit: cover;
    display: block;
    border-radius: 1rem;
    transition: filter 0.3s;
}
.preevent-card-item:hover .preevent-card-img {
    filter: brightness(1.15) drop-shadow(0 0 24px #F53003cc);
}
@keyframes floatCard {
    0% { transform: translateY(0);}
    50% { transform: translateY(-16px);}
    100% { transform: translateY(0);}
}

/* Sparkle border effect */

@keyframes sparkleBorder {
    0% { --sparkle-angle: 0deg; }
    100% { --sparkle-angle: 360deg; }
}

/* ===== Responsive for Mobile Only ===== */
@media (max-width: 767px) {
    .preevent-card-grid {
        min-height: 0 !important;
        height: auto !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        gap: 1.5rem !important;
        position: relative !important;
    }
    .preevent-card-item {
        position: static !important;
        width: 90vw !important;
        max-width: 320px !important;
        margin: 0 auto !important;
        rotate: 0deg !important;
        animation: none !important;
        box-shadow: 0 8px 24px #F5300320;
    }
    .preevent-card-img {
        width: 100% !important;
        height: 140px !important;
    }
    
}
</style>

<div class="preevent-card-grid">
    <!-- Formasi W lebih menyebar dan lebar, dengan AOS dan delay -->
    <div class="preevent-card-item" style="top:-10px; right:750px; rotate:10deg;"
        data-aos="fade-down-right" data-aos-delay="0">
        <img src="{{ asset('img/event/preevent/theuntoldjourney/untoldjourney3.webp') }}" alt="PreEvent 1" class="preevent-card-img" />
    </div>
    <div class="preevent-card-item" style="top:280px; right:750px; rotate:8deg;"
        data-aos="fade-up-right" data-aos-delay="150">
        <img src="{{ asset('img/event/preevent/theuntoldjourney/untoldjourney7.webp') }}" alt="PreEvent 2" class="preevent-card-img" />
    </div>
    <div class="preevent-card-item" style="top:100px; left:360px; rotate:0deg;"
        data-aos="zoom-in" data-aos-delay="300">
        <img src="{{ asset('img/event/preevent/theuntoldjourney/untoldjourney1.webp') }}" alt="PreEvent 3" class="preevent-card-img" />
    </div>
    <div class="preevent-card-item" style="top:280px; left:750px; rotate:-8deg;"
        data-aos="fade-up-left" data-aos-delay="450">
        <img src="{{ asset('img/event/preevent/theuntoldjourney/untoldjourney4.webp') }}" alt="PreEvent 4" class="preevent-card-img" />
    </div>
    <div class="preevent-card-item" style="top:-10px; left:750px; rotate:-10deg;"
        data-aos="fade-down-left" data-aos-delay="600">
        <img src="{{ asset('img/event/preevent/theuntoldjourney/untoldjourney5.webp') }}" alt="PreEvent 5" class="preevent-card-img" />
    </div>
</div>

