<x-app-layout>
    <x-slot name="header">
        <div><p class="text-xs font-bold tracking-wider text-primary">PENGATURAN AKUN</p><h2 class="mt-1 font-display text-2xl font-extrabold text-slate-900">Profil saya</h2></div>
    </x-slot>

    <div class="sm-page max-w-4xl">
        <div class="mb-7"><h1 class="sm-page-title">Atur profilmu</h1><p class="sm-page-subtitle">Pastikan informasi akunmu selalu terbaru.</p></div>
        <div class="space-y-5">
            <div class="sm-card"><div class="sm-card-body p-6 sm:p-8"><div class="max-w-xl">@include('profile.partials.update-profile-information-form')</div></div></div>
            <div class="sm-card"><div class="sm-card-body p-6 sm:p-8"><div class="max-w-xl">@include('profile.partials.update-password-form')</div></div></div>
            <div class="sm-card border-danger/20"><div class="sm-card-body p-6 sm:p-8"><div class="max-w-xl">@include('profile.partials.delete-user-form')</div></div></div>
        </div>
    </div>
</x-app-layout>
