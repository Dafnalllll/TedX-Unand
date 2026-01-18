<!-- filepath: d:\Dafa Code\TedXUnand\resources\views\components\preeventcard.blade.php -->
<style>
.preevent-card-grid {
    position: relative;
    width: 100%;
    min-height: 400px;
    height: 100%; /* Ubah dari 700px ke 100% */
}
.preevent-card-item {
    position: absolute;
    transition:
        transform 0.7s cubic-bezier(.68,-0.55,.27,1.55),
        box-shadow 0.3s,
        filter 0.3s;
    box-shadow: 0 6px 24px #0002;
    border-radius: 1rem;
    overflow: hidden;
    cursor: pointer;
    z-index: 2;
    animation: floatCard 3s ease-in-out infinite alternate;
    border: 3px solid transparent;
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
</style>

<div class="preevent-card-grid">
    <!-- Formasi W lebih menyebar dan lebar, dengan AOS dan delay -->
    <div class="preevent-card-item" style="top:-100px; right:850px; rotate:10deg;"
        data-aos="fade-down-right" data-aos-delay="0">
        <img src="{{ asset('img/event/preevent/theuntoldjourney/untoldjourney1.webp') }}" alt="PreEvent 1" class="preevent-card-img" />
    </div>
    <div class="preevent-card-item" style="top:250px; right:750px; rotate:8deg;"
        data-aos="fade-up-right" data-aos-delay="150">
        <img src="{{ asset('img/event/preevent/theuntoldjourney/untoldjourney2.webp') }}" alt="PreEvent 2" class="preevent-card-img" />
    </div>
    <div class="preevent-card-item" style="top:50px; left:360px; rotate:0deg;"
        data-aos="zoom-in" data-aos-delay="300">
        <img src="{{ asset('img/event/preevent/theuntoldjourney/untoldjourney1.webp') }}" alt="PreEvent 3" class="preevent-card-img" />
    </div>
    <div class="preevent-card-item" style="top:250px; left:750px; rotate:-8deg;"
        data-aos="fade-up-left" data-aos-delay="450">
        <img src="{{ asset('img/event/preevent/theuntoldjourney/untoldjourney4.webp') }}" alt="PreEvent 4" class="preevent-card-img" />
    </div>
    <div class="preevent-card-item" style="top:-95px; left:850px; rotate:-10deg;"
        data-aos="fade-down-left" data-aos-delay="600">
        <img src="{{ asset('img/event/preevent/theuntoldjourney/untoldjourney5.webp') }}" alt="PreEvent 5" class="preevent-card-img" />
    </div>
</div>
