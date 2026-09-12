<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'SkillMate') }} — Ruang belajar bersama</title>
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
        <style>[x-cloak] { display: none !important; }</style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-900 antialiased">
        <div class="min-h-screen grid lg:grid-cols-2 bg-white">
            <aside class="hidden lg:flex relative overflow-hidden bg-[#1A1A1A] p-14 text-white flex-col justify-between">
                <div class="absolute -right-24 -top-24 h-96 w-96 rounded-full border border-white/15"></div><div class="absolute -left-32 -bottom-32 h-[29rem] w-[29rem] rounded-full border border-white/10"></div>
                <a href="/" class="relative flex items-center gap-3 text-xl font-display font-extrabold"><span class="grid h-10 w-10 place-items-center rounded-xl rounded-bl-sm bg-primary shadow-[0_10px_22px_rgb(47_203_99_/_22%)]">✦</span> SkillMate</a>
                <div class="relative max-w-md"><span class="inline-flex rounded-full bg-primary/15 px-3 py-1 text-xs font-bold tracking-wide text-primary-200">RUANG BELAJAR BERSAMA</span><h1 class="mt-5 font-display text-4xl font-extrabold leading-tight">Satu langkah kecil untuk progres yang besar.</h1><p class="mt-5 text-base leading-7 text-white/70">Bangun kebiasaan belajar yang konsisten bersama partner yang memahami tujuanmu.</p></div>
                <p class="relative text-sm text-white/45">© {{ date('Y') }} SkillMate. Belajar, berbagi, bertumbuh.</p>
            </aside>
            <main class="relative flex min-h-screen flex-col justify-center overflow-hidden px-5 py-10 sm:px-10 lg:px-16 xl:px-24">
                <div class="pointer-events-none absolute -right-24 top-8 h-64 w-64 rounded-full bg-primary-100/70 blur-3xl"></div>
                <a href="/" class="mb-10 flex items-center gap-2 text-lg font-display font-extrabold text-slate-900 lg:hidden"><span class="grid h-8 w-8 place-items-center rounded-lg rounded-bl-sm bg-primary text-sm text-white">✦</span>SkillMate</a>
                <div class="relative mx-auto w-full max-w-md rounded-3xl border border-white bg-white/85 p-7 shadow-[0_24px_60px_rgb(26_26_26_/_12%)] backdrop-blur sm:p-9">{{ $slot }}</div>
            </main>
        </div>
    </body>
</html>
