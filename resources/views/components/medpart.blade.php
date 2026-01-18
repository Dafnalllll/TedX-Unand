{{-- filepath: d:\Dafa Code\TedXUnand\resources\views\components\medpart.blade.php --}}
@php
    $medparts = [
        [ 'logo' => asset('img/medpart/sakato.webp')],
        ['logo' => asset('img/medpart/babesumbar.webp')],
        [ 'logo' => asset('img/medpart/genta.webp')],
        [ 'logo' => asset('img/medpart/skk.webp')],
        [ 'logo' => asset('img/medpart/sinema.webp')],
        [ 'logo' => asset('img/medpart/mahardika.webp')],
        [ 'logo' => asset('img/medpart/bemunand.webp')],
        [ 'logo' => asset('img/medpart/bemfp.webp')],
        [ 'logo' => asset('img/medpart/ibp.webp')],
        [ 'logo' => asset('img/medpart/kejarmimpi.webp')],
    ];
    $rows = [
        array_slice($medparts, 0, 3),   // Baris 1: 3 logo
        array_slice($medparts, 3, 4),   // Baris 2: 4 logo
        array_slice($medparts, 7, 3),   // Baris 3: 3 logo
    ];
@endphp

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">

<style>
    .medpart-rows {
        display: flex;
        flex-direction: column;
        gap: 2.2rem;
        align-items: center;
        margin: 0 auto 48px auto;
        width: 100%;
        max-width: 700px;
    }
    .medpart-row {
        display: flex;
        justify-content: center;
        gap: 2.2rem;
        width: 100%;
    }
    .tilt-card {
        transition:
            transform 0.4s cubic-bezier(.25,.8,.25,1),
            box-shadow 0.4s,
            filter 0.4s;
        will-change: transform, filter;
    }
    .tilt-card:hover {
        transform: rotateZ(-2deg) scale(1.06) translateY(-10px);
        filter: brightness(1.07) saturate(1.2);
        animation: floaty 1.6s ease-in-out infinite alternate;
    }
    @keyframes floaty {
        0% { transform: rotateZ(-2deg) scale(1.06) translateY(-10px);}
        100% { transform: rotateZ(2deg) scale(1.08) translateY(-18px);}
    }
    .medpart-logo {
        transition: transform 0.3s cubic-bezier(.25,.8,.25,1), box-shadow 0.3s;
        will-change: transform;
    }
    .medpart-logo:hover {
        transform: scale(1.12) translateY(-6px);
        box-shadow: 0 8px 24px 0 rgba(0,0,0,0.13);
        z-index: 2;
    }
    @media (max-width: 700px) {
        .medpart-row {
            gap: 1.2rem;
        }
        .medpart-rows {
            gap: 1.2rem;
        }
    }
    @media (max-width: 500px) {
        .medpart-row {
            flex-wrap: wrap;
            gap: 0.7rem;
        }
        .medpart-rows {
            gap: 0.7rem;
        }
    }
</style>

<div class="medpart-rows">
    @foreach($rows as $row)
        <div class="medpart-row">
            @foreach($row as $i => $medpart)
                <div
                    data-aos="zoom-in-up"
                    data-aos-delay="{{ 100 * $i }}"
                    class="tilt-card relative p-4 flex flex-col items-center overflow-hidden min-h-[120px] justify-center"
                >
                    <img src="{{ $medpart['logo'] }}" alt="Media Partner Logo"
                        class="w-40 h-40 mb-2 object-contain medpart-logo">
                </div>
            @endforeach
        </div>
    @endforeach
</div>


