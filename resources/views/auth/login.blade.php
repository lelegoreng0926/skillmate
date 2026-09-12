<x-guest-layout>
    @if (session('registration_success'))
        <div x-data="{ open: true }" x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-[#1A1A1A]/45 p-5" role="dialog" aria-modal="true" aria-labelledby="registration-success-title">
            <div class="w-full max-w-sm rounded-3xl bg-white p-7 text-center shadow-card" @click.outside="open = false">
                <div class="mx-auto grid h-14 w-14 place-items-center rounded-full bg-primary-50 text-2xl text-primary">✓</div>
                <h2 id="registration-success-title" class="mt-5 text-xl font-extrabold text-slate-900">Pendaftaran berhasil!</h2>
                <p class="mt-2 text-sm leading-6 text-muted">{{ session('registration_success') }}</p>
                <button type="button" class="mt-6 w-full rounded-full bg-primary px-5 py-3 text-sm font-bold text-white transition hover:bg-primary-600 focus:outline-none focus:ring-4 focus:ring-primary-100" @click="open = false">Mengerti, masuk sekarang</button>
            </div>
        </div>
    @endif
    <div class="mb-8"><p class="text-sm font-semibold text-primary">SELAMAT DATANG KEMBALI</p><h1 class="mt-2 text-3xl font-extrabold tracking-tight text-slate-900">Masuk ke SkillMate</h1><p class="mt-2 text-sm leading-6 text-muted">Lanjutkan perjalanan belajarmu bersama komunitas.</p></div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-6 flex flex-col-reverse gap-4 sm:flex-row sm:items-center sm:justify-between">
            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-primary hover:text-primary-700" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif

            <x-primary-button class="sm:ms-3">
                Masuk
            </x-primary-button>
        </div>
    </form>
    <p class="mt-8 text-center text-sm text-muted">Belum punya akun? <a href="{{ route('register') }}" class="font-bold text-primary hover:text-primary-700">Daftar gratis</a></p>
</x-guest-layout>
