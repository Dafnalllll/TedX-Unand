@section('title', 'Login | TEDxUniversitas Andalas')
<link rel="icon" type="image/webp" href="{{ asset('img/tedunand.webp') }}">

<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen ">
        <!-- Logo TedXUnand -->
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('img/TEDxUniversitasAndalas.webp') }}" alt="TedXUnand Logo"
                class="w-60 mb-6 floating-tedx">
        </a>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Mobile Layout -->
        <div class="block lg:hidden">
            <form method="POST" action="{{ route('login') }}" class="bg-gray-700 p-8 rounded shadow-md w-[90%] max-w-md mx-auto">
                @csrf

                <!-- Username -->
                <div>
                    <x-input-label for="name-mobile" :value="__('Username')" class="text-lg" />
                    <x-text-input id="name-mobile" class="block mt-1 w-full text-lg" type="text" name="name" :value="old('name')" autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4 relative">
                    <x-input-label for="password" :value="__('Password')" class="text-lg" />
                    <x-text-input id="password-mobile" class="block mt-1 w-full text-lg pr-12"
                        type="password"
                        name="password"
                        autocomplete="current-password" />
                    <!-- Eye Icon -->
                    <button type="button" id="togglePassword-mobile" tabindex="-1"
                        class="absolute right-3 -bottom-[0.5rem] transform -translate-y-1/2 text-gray-400 hover:text-gray-700 focus:outline-none"
                        style="height: 32px; width: 32px;">
                        <!-- Mata terbuka (default) -->
                        <svg id="eyeOpen-mobile" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display:block;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <!-- Mata tertutup -->
                        <svg id="eyeClosed-mobile" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display:none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.293-3.95M6.873 6.872A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 01-4.043 5.112M15 12a3 3 0 11-6 0 3 3 0 016 0zm-6 0a6 6 0 016 0" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3l18 18" />
                        </svg>
                    </button>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3 text-lg px-8 py-3">
                    </x-primary-button>
                </div>
            </form>
        </div>

        <!-- Desktop Layout -->
        <div class="hidden lg:block">
            <form method="POST" action="{{ route('login') }}" class="bg-gray-700 p-8 rounded shadow-md w-[500px] max-w-3xl">
                @csrf

                <!-- Username -->
                <div>
                    <x-input-label for="name-desktop" :value="__('Username')" class="text-lg" />
                    <x-text-input id="name-desktop" class="block mt-1 w-full text-lg" type="text" name="name" :value="old('name')" autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4 relative">
                    <x-input-label for="password-desktop" :value="__('Password')" class="text-lg" />
                    <x-text-input id="password-desktop" class="block mt-1 w-full text-lg pr-12"
                        type="password"
                        name="password"
                        autocomplete="current-password" />
                    <!-- Eye Icon -->
                    <button type="button" id="togglePassword-desktop" tabindex="-1"
                        class="absolute right-3 -bottom-[0.5rem] transform -translate-y-1/2 text-gray-400 hover:text-gray-700 focus:outline-none"
                        style="height: 32px; width: 32px;">
                        <!-- Mata terbuka (default) -->
                        <svg id="eyeOpen-desktop" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display:block;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <!-- Mata tertutup -->
                        <svg id="eyeClosed-desktop" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display:none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.293-3.95M6.873 6.872A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 01-4.043 5.112M15 12a3 3 0 11-6 0 3 3 0 016 0zm-6 0a6 6 0 016 0" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3l18 18" />
                        </svg>
                    </button>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3 text-lg px-8 py-3">
                    </x-primary-button>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
document.querySelectorAll('form').forEach(function(form) {
    form.addEventListener('submit', function(e) {
        // Cek apakah ini form mobile atau desktop
        let usernameInput = form.querySelector('input[name="name"]');
        let passwordInput = form.querySelector('input[name="password"]');
        const username = usernameInput ? usernameInput.value.trim() : '';
        const password = passwordInput ? passwordInput.value.trim() : '';

        if (!username && !password) {
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Data Belum Lengkap',
                text: 'Username dan Password harus diisi!',
                confirmButtonColor: '#d61a1a'
            });
        } else if (!username) {
            e.preventDefault();
            Swal.fire({
                imageUrl: '{{ asset("img/auth/username.webp") }}',
                imageWidth: 80,
                imageHeight: 80,
                title: 'Username Kosong',
                text: 'Silakan isi Username Anda!',
                confirmButtonColor: '#d61a1a',
                background: '#e3f2fd',
                customClass: {
                    image: 'swal2-username-icon'
                }
            });
        } else if (!password) {
            e.preventDefault();
            Swal.fire({
                imageUrl: '{{ asset("img/auth/password.webp") }}',
                imageWidth: 80,
                imageHeight: 80,
                title: 'Password Kosong',
                text: 'Silakan isi Password Anda!',
                confirmButtonColor: '#d61a1a',
                background: '#fff3e0',
                customClass: {
                    image: 'swal2-password-icon'
                }
            });
        }
    });
});
</script>
        <script>
document.addEventListener('DOMNodeInserted', function(e) {
    if (e.target.classList && e.target.classList.contains('swal2-container')) {
        const cursor = document.getElementById('custom-x-cursor');
        if (cursor) {
            document.body.appendChild(cursor); // Pindahkan ke paling akhir body
        }
    }
});
</script>
        <script>
document.getElementById('togglePassword-mobile')?.addEventListener('click', function () {
    const passwordInput = document.getElementById('password-mobile');
    const eyeOpen = document.getElementById('eyeOpen-mobile');
    const eyeClosed = document.getElementById('eyeClosed-mobile');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeOpen.style.display = 'none';
        eyeClosed.style.display = 'block';
    } else {
        passwordInput.type = 'password';
        eyeOpen.style.display = 'block';
        eyeClosed.style.display = 'none';
    }
});

// Toggle password untuk desktop
document.getElementById('togglePassword-desktop')?.addEventListener('click', function () {
    const passwordInput = document.getElementById('password-desktop');
    const eyeOpen = document.getElementById('eyeOpen-desktop');
    const eyeClosed = document.getElementById('eyeClosed-desktop');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeOpen.style.display = 'none';
        eyeClosed.style.display = 'block';
    } else {
        passwordInput.type = 'password';
        eyeOpen.style.display = 'block';
        eyeClosed.style.display = 'none';
    }
});
</script>
    </div>
</x-guest-layout>
