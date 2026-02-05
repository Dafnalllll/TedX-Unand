{{-- filepath: d:\Dafa Code\TedXUnand\resources\views\components\contact.blade.php --}}
@php
    $contacts = [
        [
            'type' => 'wa',
            'title' => 'Sponsorship',
            'name' => 'Hanifah Larama Agasi',
            'phone' => ' +6287863937318 ',
            'icon' => asset('img/contact/whatsapp.webp'),
        ],
        [
            'type' => 'wa',
            'title' => 'Community and Media Partner',
            'name' => 'Salsabila Afifah Umar',
            'phone' => ' +6282288392466 ',
            'icon' => asset('img/contact/whatsapp.webp'),
            'link' => 'https://wa.me/6282288392466',
        ],
        [
            'type' => 'mail',
            'title' => 'More Info',
            'name' => 'Contact our team directly on Gmail',
            'icon' => asset('img/contact/gmail.webp'),
            'link' => 'https://mail.google.com/mail/?view=cm&fs=1&to=tedxuniversitasandalas@gmail.com&su=Pertanyaan%20seputar%20TEDxUnand&body=Halo%20TEDxUnand%2C%20saya%20ingin%20bertanya%20tentang...',
        ],
    ];
@endphp

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

<style>
    .contact-row-list {
        display: flex;
        flex-direction: column;
        gap: 2.5rem;
        max-width: 1200px;
        margin: 0 auto 48px auto;
        padding: 2.5rem 1rem;
    }
    .contact-row-card {
        background: #393939;
        border-radius: 3rem;
        box-shadow: 8px 12px 0 0 #000;
        display: flex;
        align-items: center;
        width: 100%;
        min-height: 160px;
        padding: 1.5rem 2.5rem 1.5rem 1.5rem;
        position: relative;
        transition: transform 0.25s, box-shadow 0.25s;
    }
    .contact-row-card:hover {
        transform: translateY(-8px) scale(1.01);
        box-shadow: 16px 20px 0 0 #000;
        background: #222;
    }
    .contact-row-icon {
        width: 110px;
        height: 110px;
        flex-shrink: 0;
        margin-right: 2.2rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .contact-row-icon img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        animation: floating 2.5s ease-in-out infinite;
    }
    @keyframes floating {
        0% { transform: translateY(0); }
        50% { transform: translateY(-16px); }
        100% { transform: translateY(0); }
    }
    .contact-row-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .contact-row-title {
        font-family: 'Inter', sans-serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 0.2rem;
        line-height: 1.1;
    }
    .contact-row-detail {
        font-family: 'Inter', sans-serif;
        font-size: 2rem;
        color: #fff;
        margin-bottom: 0.1rem;
        font-weight: 400;
    }
    .contact-row-arrow {
        font-size: 3.5rem;
        color: #fff;
        margin-left: 2.2rem;
        transition: color 0.2s, transform 0.3s cubic-bezier(.4,2,.6,1);
        flex-shrink: 0;
    }
    .contact-row-card:hover .contact-row-arrow {
        color: #ec9f1e;
        transform: translateX(18px);
    }
    @media (max-width: 900px) {
        .contact-row-card {
            flex-direction: column;
            align-items: flex-start;
            padding: 1.2rem 1rem;
            min-height: 120px;
        }
        .contact-row-icon {
            margin-right: 0;
            margin-bottom: 1rem;
        }
        .contact-row-arrow {
            margin-left: 0;
            margin-top: 1rem;
        }
    }
    @media (max-width: 600px) {
        .contact-row-list {
            padding: 1rem 0.5rem;
            gap: 1.2rem;
        }
        .contact-row-card {
            border-radius: 1rem;
            min-height: 64px;
            padding: 0.7rem 0.7rem 1.7rem 0.7rem;
            flex-direction: row;
            align-items: flex-start;
            position: relative;
        }
        .contact-row-icon {
            width: 40px;
            height: 40px;
            margin-bottom: 0;
            margin-right: 0.8rem;
        }
        .contact-row-info {
            flex: 1;
            min-width: 0;
        }
        .contact-row-title { font-size: 1rem; }
        .contact-row-detail { font-size: 0.85rem; }
        .contact-row-arrow {
            position: absolute;
            left: 50%;
            bottom: 0.3rem;
            transform: translateX(-50%);
            margin: 0;
            font-size: 1.3rem;
        }
    }
</style>

<div class="contact-row-list" data-aos="fade-up" data-aos-delay="100">
    @foreach($contacts as $contact)
        <a href="{{ $contact['link'] ?? '#' }}" class="contact-row-card" target="_blank">
            <span class="contact-row-icon">
                <img src="{{ $contact['icon'] }}" alt="{{ $contact['title'] }}">
            </span>
            <span class="contact-row-info">
                <span class="contact-row-title">{{ $contact['title'] }}</span>
                @if(isset($contact['phone']))
                    <span class="contact-row-detail">{{ $contact['name'] }} | {{ $contact['phone'] }}</span>
                @else
                    <span class="contact-row-detail">{{ $contact['name'] }}</span>
                @endif
            </span>
            <span class="contact-row-arrow">
                &#8594;
            </span>
        </a>
    @endforeach
</div>


