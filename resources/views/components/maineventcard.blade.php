<style>
.mainevent-card-grid {
    position: relative;
    width: 100%;
    min-height: 480px;
    height: 100%;
    margin-top: 60px; /* atau sesuaikan dengan kebutuhan */
}
.mainevent-card-item {
    position: absolute;
    width: 220px;
    height: 250px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 2;
    animation: float 3s ease-in-out infinite;
}
.hexagon-img {
    width: 220px;
    height: 250px;
    object-fit: cover;
    clip-path: polygon(50% 0%, 95% 25%, 95% 75%, 50% 100%, 5% 75%, 5% 25%);
    transition: filter 0.4s;
    box-shadow: 0 12px 32px #6C2EBF40;
}

.hexagon-overlay {
    position: absolute;
    width: 220px;
    height: 250px;
    clip-path: polygon(50% 0%, 95% 25%, 95% 75%, 50% 100%, 5% 75%, 5% 25%);
    background: linear-gradient(135deg, #F53003cc 0%, #6C2EBFcc 100%);
    opacity: 0;
    transition: opacity 0.4s;
    display: flex;
    align-items: center;
    justify-content: center;
}
.mainevent-card-item:hover .hexagon-overlay {
    opacity: 0.7;
}
.hexagon-icon {
    position: absolute;
    width: 60px;
    height: 60px;
    color: #fff;
    font-size: 3rem;
    opacity: 0;
    transition: opacity 0.4s, transform 0.4s;
    transform: scale(0.8);
    display: flex;
    align-items: center;
    justify-content: center;
}
.mainevent-card-item:hover .hexagon-icon {
    opacity: 1;
    transform: scale(1.1);
}
@media (max-width: 767px) {
    .mainevent-card-grid {
        min-height: 0 !important;
        height: auto !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        gap: 1.5rem !important;
        position: relative !important;
    }
    .mainevent-card-item {
        position: static !important;
        width: 90vw !important;
        max-width: 260px !important;
        margin: 0 auto !important;
    }
    .hexagon-icon {
        width: 48px !important;
        height: 48px !important;
        font-size: 2rem !important;
    }
}
@keyframes float {
    0% { transform: translateY(0) rotate(var(--rotate, 0deg)); }
    50% { transform: translateY(-20px) rotate(var(--rotate, 0deg)); }
    100% { transform: translateY(0) rotate(var(--rotate, 0deg)); }
}

.mainevent-card-item {
    animation: float 3s ease-in-out infinite;
}
</style>

<div class="mainevent-card-grid">
    <div class="mainevent-card-item" style="top:20px; left:80px; rotate:1deg; animation-delay:0s;" data-aos="fade-down-right" data-aos-delay="0">
        <img src="{{ asset('img/event/mainevent/theunwrittenatlas/theunwrittenatlas1.webp') }}" alt="Main Event 1" class="hexagon-img" />
    </div>
    <div class="mainevent-card-item" style="top:350px; left:80px; rotate:0deg; animation-delay:0.3s;" data-aos="fade-up-right" data-aos-delay="150">
        <img src="{{ asset('img/event/mainevent/theunwrittenatlas/theunwrittenatlas2.webp') }}" alt="Main Event 2" class="hexagon-img" />
    </div>
    <div class="mainevent-card-item" style="top:180px; left:350px; rotate:0deg; animation-delay:0.6s;" data-aos="zoom-in" data-aos-delay="300">
        <img src="{{ asset('img/event/mainevent/theunwrittenatlas/theunwrittenatlas3.webp') }}" alt="Main Event 3" class="hexagon-img" />
    </div>
    <div class="mainevent-card-item" style="top:350px; left:620px; rotate:0deg; animation-delay:0.9s;" data-aos="fade-up-left" data-aos-delay="450">
        <img src="{{ asset('img/event/mainevent/theunwrittenatlas/theunwrittenatlas4.webp') }}" alt="Main Event 4" class="hexagon-img" />
    </div>
    <div class="mainevent-card-item" style="top:20px; left:620px; rotate:-1deg; animation-delay:1.2s;" data-aos="fade-down-left" data-aos-delay="600">
        <img src="{{ asset('img/event/mainevent/theunwrittenatlas/theunwrittenatlas5.webp') }}" alt="Main Event 5" class="hexagon-img" />
    </div>
    <div class="mainevent-card-item" style="top:180px; left:900px; rotate:0deg; animation-delay:1.5s;" data-aos="zoom-in" data-aos-delay="750">
        <img src="{{ asset('img/event/mainevent/theunwrittenatlas/theunwrittenatlas6.webp') }}" alt="Main Event 6" class="hexagon-img" />
    </div>
    <div class="mainevent-card-item" style="top:345px; left:1200px; rotate:0deg; animation-delay:1.8s;" data-aos="fade-up-right" data-aos-delay="900">
        <img src="{{ asset('img/event/mainevent/theunwrittenatlas/theunwrittenatlas7.webp') }}" alt="Main Event 7" class="hexagon-img" />
    </div>
    <div class="mainevent-card-item" style="top:20px; left:1200px; rotate:0deg; animation-delay:2.1s;" data-aos="fade-down-left" data-aos-delay="1050">
        <img src="{{ asset('img/event/mainevent/theunwrittenatlas/theunwrittenatlas8.webp') }}" alt="Main Event 8" class="hexagon-img" />
    </div>
</div>
