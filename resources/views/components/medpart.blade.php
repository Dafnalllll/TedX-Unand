{{-- filepath: d:\Dafa Code\TedXUnand\resources\views\components\medpart.blade.php --}}
@php
    $medparts = [
        [ 'logo' => asset('img/medpart/sakato.webp')],
        [ 'logo' => asset('img/medpart/babesumbar.webp')],
        [ 'logo' => asset('img/medpart/genta.webp')],
        [ 'logo' => asset('img/medpart/skk.webp')],
        [ 'logo' => asset('img/medpart/sinema.webp')],
        [ 'logo' => asset('img/medpart/mahardika.webp')],
        [ 'logo' => asset('img/medpart/bemunand.webp')],
        [ 'logo' => asset('img/medpart/bemfp.webp')],
        [ 'logo' => asset('img/medpart/ibp.webp')],
        [ 'logo' => asset('img/medpart/kejarmimpi.webp')],
        [ 'logo' => asset('img/medpart/campusgrow.webp')],
        [ 'logo' => asset('img/medpart/dangaustudio.webp')],
        [ 'logo' => asset('img/medpart/rri.webp')],
        [ 'logo' => asset('img/medpart/kirana.webp')],
        [ 'logo' => asset('img/medpart/classy.webp')],
        [ 'logo' => asset('img/medpart/crief.webp')],
    ];
@endphp

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">

<style>
    .medpart-zigzag {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 3.5rem;
        margin: 0 auto 48px auto;
        width: 100%;
        max-width: 950px;
    }
    .medpart-row {
        display: flex;
        justify-content: center;
        gap: 3.5rem;
        width: 100%;
        position: relative;
    }
    .medpart-row.row-2 {
        margin-left: 0.5rem; /* geser kanan */
    }
    .medpart-row.row-3 {
        margin-left: -1rem; /* geser kiri */
    }
    .tilt-card {
        transition:
            transform 0.4s cubic-bezier(.25,.8,.25,1),
            box-shadow 0.4s,
            filter 0.4s;
        will-change: transform, filter;
    }
    .tilt-card:hover {
        transform: rotateZ(-2deg) scale(1.08) translateY(-10px);
        filter: brightness(1.09) saturate(1.2) drop-shadow(0 0 18px #e62b1e33);
        animation: floaty 1.6s ease-in-out infinite alternate;
        z-index: 2;
    }
    @keyframes floaty {
        0% { transform: rotateZ(-2deg) scale(1.08) translateY(-10px);}
        100% { transform: rotateZ(2deg) scale(1.12) translateY(-18px);}
    }
    .medpart-logo {
        transition: transform 0.3s cubic-bezier(.25,.8,.25,1), box-shadow 0.3s;
        will-change: transform;
        background: linear-gradient(135deg, #EC9F1E 0%, #ef4444 60%, #1a202c 100%);
        border-radius: 50%;
        padding: 0.7rem;
        box-shadow: 0 2px 12px #e62b1e11;
    }
    .medpart-logo:hover {
        transform: scale(1.12) translateY(-6px);
    }
    @keyframes pulse-center {
        0% { box-shadow: 0 4px 32px #e62b1e33, 0 0 0 12px #fff3;}
        100% { box-shadow: 0 8px 48px #e62b1e66, 0 0 0 24px #e62b1e11;}
    }
    @media (max-width: 900px) {
        .medpart-zigzag { gap: 1.5rem; }
        .medpart-row { gap: 1.5rem; }
        .medpart-row.row-2 { margin-left: 2rem;}
        .medpart-row.row-3 { margin-left: -1rem;}
    }
    @media (max-width: 600px) {
        .medpart-zigzag { gap: 0.7rem; }
        .medpart-row { gap: 0.7rem; flex-wrap: wrap;}
        .medpart-row.row-2, .medpart-row.row-3 { margin-left: 0;}
        .medpart-logo { width: 96px !important; height: 96px !important; padding: 0.5rem !important; }
    }
</style>

<div class="medpart-zigzag">
    <div class="medpart-row row-1">
        @foreach(array_slice($medparts, 0, 3) as $i => $medpart)
            <div
                data-aos="zoom-in-up"
                data-aos-delay="{{ 100 * $i }}"
                class="tilt-card relative p-4 flex flex-col items-center overflow-hidden min-h-[120px] justify-center"
            >
                <img src="{{ $medpart['logo'] }}" alt="Media Partner Logo"
                    class="w-32 h-32 mb-2 object-contain medpart-logo">
            </div>
        @endforeach
    </div>
    <div class="medpart-row row-2">
        @foreach(array_slice($medparts, 3, 5) as $i => $medpart)
            <div
                data-aos="zoom-in-up"
                data-aos-delay="{{ 100 * $i }}"
                class="tilt-card relative p-4 flex flex-col items-center overflow-hidden min-h-[120px] justify-center"
            >
                <img src="{{ $medpart['logo'] }}" alt="Media Partner Logo"
                    class="w-32 h-32 mb-2 object-contain medpart-logo">
            </div>
        @endforeach
    </div>
    <div class="medpart-row row-3">
        @foreach(array_slice($medparts, 8, 5) as $i => $medpart)
            <div
                data-aos="zoom-in-up"
                data-aos-delay="{{ 100 * $i }}"
                class="tilt-card relative p-4 flex flex-col items-center overflow-hidden min-h-[220px] justify-center"
            >
                <img src="{{ $medpart['logo'] }}" alt="Media Partner Logo"
                    class="w-32 h-32 mb-2 object-contain medpart-logo">
            </div>
        @endforeach
    </div>
    <div class="medpart-row row-4">
        @foreach(array_slice($medparts, 13, 3) as $i => $medpart)
            <div
                data-aos="zoom-in-up"
                data-aos-delay="{{ 100 * $i }}"
                class="tilt-card relative p-4 flex flex-col items-center overflow-hidden min-h-[120px] justify-center"
            >
                <img src="{{ $medpart['logo'] }}" alt="Media Partner Logo"
                    class="w-32 h-32 mb-2 object-contain medpart-logo">
            </div>
        @endforeach
    </div>
</div>


