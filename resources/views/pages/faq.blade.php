@section('title', 'FAQ | TEDxUnand')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

@extends('layouts.app')

@section('content')
<style>
    .faq-bg {
        background: url('{{ asset('img/faq.webp') }}') center center / cover no-repeat, linear-gradient(120deg, #1a202c 60%, #ef4444 100%);
        position: fixed;
        inset: 0;
        width: 100vw;
        height: 100vh;
        z-index: 0;
        pointer-events: none;
        overflow: hidden;
    }
    .faq-bg::before {
        content: "";
        position: absolute;
        z-index: 1;
        left: 10vw; top: 10vh;
        width: 180px; height: 180px;
        background: radial-gradient(circle, #EC9F1E88 0%, #fff0 70%);
        filter: blur(12px);
        opacity: 0.7;
        animation: bokeh-move 7s ease-in-out infinite alternate;
    }
    .faq-bg::after {
        content: "";
        position: absolute;
        inset: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0,0,0,0.60);
        z-index: 2;
        pointer-events: none;
    }
    @keyframes bokeh-move {
        0% { left: 10vw; top: 10vh;}
        100% { left: 60vw; top: 60vh;}
    }
    .faq-content-wrapper {
        position: relative;
        z-index: 10;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5rem 0 3rem 0;
    }
    .faq-container {
        max-width: 950px;
        width: 100%;
        padding: 2.5rem 1.5rem;
        margin: 0 auto;
    }
    .faq-title {
        font-size: 2.7rem;
        font-weight: 900;
        color: #E62B1E;
        margin-bottom: 2.5rem;
        text-align: center;
        letter-spacing: 2px;
        text-shadow: 0 2px 16px #0005;
        font-family: 'Inter', Arial, sans-serif;
        animation: faq-pop 1.1s cubic-bezier(.77,0,.18,1);
    }
    @keyframes faq-pop {
        0% { opacity: 0; transform: scale(0.7) translateY(-40px);}
        80% { opacity: 1; transform: scale(1.08) translateY(8px);}
        100% { opacity: 1; transform: scale(1) translateY(0);}
    }
    .faq-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10.2rem;
    }
    @media (max-width: 900px) {
        .faq-grid { grid-template-columns: 1fr; }
    }
    .faq-card {
        background: rgba(255,255,255,0.18);
        border-radius: 2.5rem 1.5rem 2.7rem 1.2rem / 2.2rem 2.7rem 1.5rem 2.2rem;
        box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18);
        border: 2.5px solid transparent;
        border-image-slice: 1;
        backdrop-filter: blur(10px);
        padding: 2.2rem 1.7rem;
        transition:
            transform 0.22s cubic-bezier(.77,0,.18,1),
            box-shadow 0.22s,
            border 0.22s,
            background 0.22s;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        min-height: 220px;
        animation: faq-float 3.5s ease-in-out infinite alternate;
    }
    .faq-card:nth-child(1) { animation-delay: 0s; }
    .faq-card:nth-child(2) { animation-delay: 1.2s; }
    .faq-card:nth-child(3) { animation-delay: 0.7s; }
    .faq-card:nth-child(4) { animation-delay: 1.7s; }
    @keyframes faq-float {
        0%   { transform: translateY(0) scale(1) rotate(-2deg);}
        50%  { transform: translateY(-18px) scale(1.03) rotate(2deg);}
        100% { transform: translateY(0) scale(1) rotate(-2deg);}
    }
    .faq-card:hover {
        transform: translateY(-24px) scale(1.07) rotate(-3deg);
        box-shadow: 0 16px 48px 0 #e62b1e33, 0 2px 16px #e62b1e22;
        border-color: #E62B1E;
        background: rgba(255,255,255,0.32);
        z-index: 3;
    }
    .faq-icon {
        background: linear-gradient(135deg, #EC9F1E 0%, #ef4444 60%, #1a202c 100%);
        border-radius: 50%;
        padding: 0.8rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.2rem;
        box-shadow: 0 2px 12px #e62b1e22;
        transition: background 0.22s, box-shadow 0.22s, transform 0.22s;
        width: 3.3rem; height: 3.3rem;
        animation: faq-icon-pop 1.2s cubic-bezier(.77,0,.18,1);
    }
    @keyframes faq-icon-pop {
        0% { opacity: 0; transform: scale(0.5) rotate(-90deg);}
        80% { opacity: 1; transform: scale(1.15) rotate(12deg);}
        100% { opacity: 1; transform: scale(1) rotate(0);}
    }
    .faq-card:hover .faq-icon {
        background: #fff;
        box-shadow: 0 0 32px #e62b1e77;
        transform: scale(1.18) rotate(18deg);
    }
    .faq-icon svg {
        width: 2rem; height: 2rem;
        color: #fff;
        transition: color 0.22s, transform 0.22s;
    }
    .faq-card:hover .faq-icon svg {
        color: #E62B1E;
        transform: rotate(24deg) scale(1.13);
    }
    .faq-question {
        font-size: 1.22rem;
        font-weight: 700;
        color: #222;
        margin-bottom: 0.7rem;
        font-family: 'Inter', Arial, sans-serif;
        letter-spacing: 0.5px;
        animation: faq-q-fade 1.2s cubic-bezier(.77,0,.18,1);
    }
    @keyframes faq-q-fade {
        0% { opacity: 0; transform: translateY(30px);}
        100% { opacity: 1; transform: translateY(0);}
    }
    .faq-answer {
        color: #f4f4f4;
        font-size: 1.07rem;
        opacity: 0.92;
        font-family: 'Inter', Arial, sans-serif;
        flex: 1;
        animation: faq-a-fade 1.3s cubic-bezier(.77,0,.18,1);
    }
    @keyframes faq-a-fade {
        0% { opacity: 0; transform: translateY(30px);}
        100% { opacity: 1; transform: translateY(0);}
    }
</style>
<div class="faq-bg"></div>
<div class="faq-content-wrapper">
    <div class="faq-container" data-aos="fade-up" data-aos-duration="1000">
        <h1 class="faq-title mt-[8rem] mb-[8rem]" data-aos="zoom-in" data-aos-delay="200">
            Frequently Asked Questions
        </h1>
        <div class="faq-grid">
            <div class="faq-card" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                <div class="faq-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                        <path d="M12 16h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 12a2 2 0 1 0-2-2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="faq-question">What is TEDxUnand?</div>
                <div class="faq-answer">
                    TEDxUnand is an independently organized TED event hosted by the Andalas University community to share ideas, inspiration, and innovation.
                </div>
            </div>
            <div class="faq-card" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1200">
                <div class="faq-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                        <path d="M12 16h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 12a2 2 0 1 0-2-2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="faq-question">Who can join this event?</div>
                <div class="faq-answer">
                    This event is open to everyone, including students, lecturers, and the general public who want to gain new inspiration and knowledge.
                </div>
            </div>
            <div class="faq-card" data-aos="fade-right" data-aos-delay="400" data-aos-duration="1100">
                <div class="faq-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                        <path d="M12 16h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 12a2 2 0 1 0-2-2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="faq-question">How do I book tickets?</div>
                <div class="faq-answer">
                    You can book your tickets directly through the "Book Your Tickets" button on the Pre Event and Main Event page. Make sure to follow the instructions provided after clicking the button.
                </div>
            </div>
            <div class="faq-card" data-aos="fade-left" data-aos-delay="600" data-aos-duration="1300">
                <div class="faq-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                        <path d="M12 16h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 12a2 2 0 1 0-2-2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="faq-question">Is this event paid?</div>
                <div class="faq-answer">
                    Some sessions may require a fee, but there are also free sessions. Details about fees will be announced officially.
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ once: true });
</script>
@endpush
@endsection
