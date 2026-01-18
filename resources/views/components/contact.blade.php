{{-- filepath: d:\Dafa Code\TedXUnand\resources\views\components\contact.blade.php --}}
@php
    $contacts = [
        [
            'name' => 'Rizky Ramadhan',
            'role' => 'Media Partner',
            'phone' => '0812-3456-7890',
            'photo' => asset('img/contact/rizky.jpg'),
        ],
        [
            'name' => 'Siti Aisyah',
            'role' => 'Sponsorship',
            'phone' => '0813-9876-5432',
            'photo' => asset('img/contact/aisyah.jpg'),
        ],
    ];
@endphp

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    .contact-3d {
        background: linear-gradient(135deg, #23263a 70%, #2c2f4a 100%);
        border: 4px solid #fff3;
        border-radius: 2.2rem;
        box-shadow: 0 8px 32px 0 #0007, 0 2px 8px 0 #fff2 inset;
        padding: 2.8rem 2.2rem;
        display: flex;
        gap: 2.8rem;
        justify-content: center;
        align-items: stretch;
        margin: 0 auto 48px auto;
        max-width: 900px;
        flex-wrap: wrap;
        backdrop-filter: blur(4px);
        background-clip: padding-box;
    }
    .contact-card {
        background: rgba(35,38,58,0.82);
        border-radius: 1.5rem;
        box-shadow: 0 4px 24px 0 #0005, 0 2px 12px 0 #ff2d2020;
        padding: 2.1rem 1.4rem 1.4rem 1.4rem;
        min-width: 260px;
        min-height: 370px;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        transition:
            transform 0.35s cubic-bezier(.25,.8,.25,1),
            box-shadow 0.35s,
            filter 0.35s;
        will-change: transform, filter;
        animation: floatyContact 2.2s ease-in-out infinite alternate;
        border: 2px solid #ff2d2020;
        overflow: visible;
        transform: rotateZ(-2.5deg);
    }
    .contact-card:nth-child(even) {
        transform: rotateZ(2.5deg);
    }
    .contact-card:hover {
        transform: scale(1.11) translateY(-18px) rotateZ(0deg);
        box-shadow: 0 12px 40px 0 #ff2d2060, 0 2px 12px 0 #fff2 inset;
        z-index: 2;
        filter: brightness(1.12) saturate(1.22);
        animation-play-state: paused;
    }
    @keyframes floatyContact {
        0% { transform: translateY(0);}
        100% { transform: translateY(-18px);}
    }
    .hexagon-photo-border {
        width: 120px;
        height: 138px;
        background: linear-gradient(135deg, #ff2d20 40%, #ffb347 100%);
        clip-path: polygon(25% 6%, 75% 6%, 100% 50%, 75% 94%, 25% 94%, 0% 50%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.2rem;
        box-shadow: 0 4px 18px 0 #ff2d2040, 0 2px 8px 0 #fff4 inset;
        transition: box-shadow 0.3s;
        position: relative;
    }
    .contact-card:hover .hexagon-photo-border {
        box-shadow: 0 8px 32px 0 #ffb34760, 0 2px 12px 0 #fff6 inset;
    }
    .hexagon-photo {
        width: 104px;
        height: 120px;
        object-fit: cover;
        clip-path: polygon(25% 6%, 75% 6%, 100% 50%, 75% 94%, 25% 94%, 0% 50%);
        background: #fff;
        display: block;
    }
    .contact-name {
        font-family: 'Inter', sans-serif;
        font-weight: 900;
        font-size: 1.35rem;
        color: #fff;
        margin-bottom: 0.18rem;
        text-align: center;
        text-shadow: 0 2px 12px #ff2d2030, 0 2px 8px #0006;
        letter-spacing: 0.5px;
    }
    .contact-role {
        font-family: 'Inter', sans-serif;
        font-weight: 700;
        font-size: 1.08rem;
        color: #ffb347;
        margin-bottom: 1.1rem;
        text-align: center;
        letter-spacing: 0.2px;
        text-shadow: 0 2px 8px #ffb34730;
    }
    .contact-phone {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 0.7rem;
    }
    .wa-btn {
        background: rgba(36, 255, 120, 0.09);
        border: 2.5px solid #25D366;
        border-radius: 50%;
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 0 18px 0 #25d36650, 0 2px 8px #fff2 inset;
        transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
        font-size: 2.1rem;
        color: #25D366;
        cursor: pointer;
        outline: none;
    }
    .wa-btn:hover {
        background: #25D366;
        color: #fff;
        box-shadow: 0 0 32px 0 #25d366a0, 0 2px 12px #fff6 inset;
        transform: scale(1.18);
    }
    @media (max-width: 900px) {
        .contact-3d {
            gap: 1.5rem;
            padding: 1.5rem 0.5rem;
        }
        .contact-card {
            min-width: 0;
            width: 100%;
        }
    }
    @media (max-width: 500px) {
        .contact-3d {
            flex-direction: column;
            gap: 1.1rem;
        }
        .contact-card {
            min-width: 0;
            width: 100%;
            padding: 1.2rem 0.5rem 1rem 0.5rem;
        }
    }
</style>

<div class="contact-3d" data-aos="fade-up" data-aos-delay="100">
    @foreach($contacts as $i => $contact)
        <div
            class="contact-card"
            data-aos="zoom-in-up"
            data-aos-delay="{{ 200 + $i * 150 }}"
        >
            <span class="hexagon-photo-border">
                <img src="{{ $contact['photo'] }}" alt="{{ $contact['name'] }}" class="hexagon-photo">
            </span>
            <div class="contact-name">{{ $contact['name'] }}</div>
            <div class="contact-role">{{ $contact['role'] }}</div>
            <div class="contact-phone">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact['phone']) }}" target="_blank" title="Chat via WhatsApp" class="wa-btn">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>
    @endforeach
</div>
