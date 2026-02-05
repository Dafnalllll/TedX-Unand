{{-- Section: Theme Description --}}
<section class="relative w-full py-16 px-4 md:px-0 overflow-hidden" id="theme-desc">
    <style>
        .theme-floating {
            animation: floating 2.5s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translateY(0); }
            50% { transform: translateY(-18px); }
            100% { transform: translateY(0); }
        }
        .theme-desc-bg {
            background: rgba(30, 30, 30, 0.55);
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
            backdrop-filter: blur(4px);
            padding: 2.5rem 2rem;
        }
        .theme-quote {
            border-left: 4px solid #F53003;
            padding-left: 1.2rem;
            margin-bottom: 1.2rem;
            font-size: 1.18rem;
            font-style: italic;
            color: #fff;
            background: linear-gradient(90deg, #f53003 0%, #ec9f1e 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .theme-highlight {
            color: #F53003;
            font-weight: 700;
        }
    </style>
    <div class="max-w-6xl  mx-auto flex flex-col md:flex-row items-center gap-10 md:gap-16 relative z-10">
        <!-- Ilustrasi/ikon tema -->
        <div class="flex-shrink-0 flex items-center justify-center w-full md:w-1/3">
            <div class="p-8 flex items-center justify-center md:mr-0 mr-0">
                <img src="{{ asset('img/theme.webp') }}"
                    alt="Theme Icon"
                    class="w-80 h-80 object-contain md:mr-[8rem] mr-0 theme-floating"
                    data-aos="fade-up"
                    data-aos-duration="1200"
                />
            </div>
        </div>
        <!-- Deskripsi tema -->
        <div class="flex-1 theme-desc-bg  " data-aos="fade-left" data-aos-duration="1200">
            <h2 class="text-3xl md:text-4xl font-extrabold mb-4 tracking-tight text-center md:text-left"
                style="background: linear-gradient(90deg, #F53003 0%, #EC9F1E 100%);
                        -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; color: transparent;">
                Our Main Theme
            </h2>
            <blockquote class="theme-quote"
                x-data="{
                    text: 'How do humans navigate the world without a definitive map?',
                    displayed: '',
                    i: 0,
                    type() {
                        if (this.i < this.text.length) {
                            this.displayed += this.text[this.i];
                            this.i++;
                            setTimeout(() => this.type(), 40);
                        }
                    }
                }"
                x-init="type()"
                x-text="displayed"
            ></blockquote>
            <p class="text-lg md:text-xl text-white leading-relaxed mb-6" style="font-family: 'Inter', sans-serif;">
                We all walk in <span class="theme-highlight">uncertainty</span>, blazing a path that doesn't yet exist, creating direction at our own pace.<br>
                <span class="block mt-2"></span>
                The atlas of life is not a finished legacy. It is a process—full of <span class="theme-highlight">scribbles</span>, full of <span class="theme-highlight">revisions</span>, sometimes <span class="theme-highlight">missteps</span>, sometimes <span class="theme-highlight">halts</span>.<br>
                <span class="block mt-2"></span>
                <span class="italic theme-highlight">It is precisely from these choices, dreams, and mistakes that humans learn to write new lines.</span>
            </p>
        </div>
    </div>
</section>
