@php
    $userInitials = collect(explode(' ', Auth::user()->name))
        ->filter()
        ->take(2)
        ->map(fn ($word) => strtoupper(substr($word, 0, 1)))
        ->implode('');
@endphp

<nav x-data="{ open: false }" class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/90 backdrop-blur-xl shadow-soft">
    <div class="sm-container">
        <div class="flex h-16 items-center justify-between gap-4">
            {{-- Logo + Desktop Nav --}}
            <div class="flex items-center gap-6 lg:gap-8 min-w-0">
                <a href="{{ route('dashboard') }}" class="sm-nav-logo flex items-center gap-2 shrink-0">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl rounded-bl-sm bg-primary text-white font-bold text-sm shadow-[0_7px_14px_rgb(39_101_223_/_25%)]">✦</span>
                    <span class="hidden sm:inline text-lg font-display font-extrabold text-slate-900">SkillMate</span>
                </a>

                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ url('/') }}" class="sm-nav-link">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Beranda
                    </a>
                    <a href="{{ route('dashboard') }}"
                       class="{{ request()->routeIs('dashboard') ? 'sm-nav-link-active' : 'sm-nav-link' }}">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('partners.index') }}"
                       class="{{ request()->routeIs('partners.*') ? 'sm-nav-link-active' : 'sm-nav-link' }}">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Temukan Partner
                    </a>
                    <a href="{{ route('user.skills.index') }}"
                       class="{{ request()->routeIs('user.skills.*') ? 'sm-nav-link-active' : 'sm-nav-link' }}">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        Skill Saya
                    </a>
                    @if (Route::has('learning-requests.index'))
                    <a href="{{ route('learning-requests.index') }}"
                       class="{{ request()->routeIs('learning-requests.*') ? 'sm-nav-link-active' : 'sm-nav-link' }}">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        Learning Request
                    </a>
                    @endif
                    @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="sm-nav-link text-primary">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Admin
                    </a>
                    @endif
                </div>
            </div>

            {{-- Desktop User Menu --}}
            <div class="hidden md:flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 rounded-lg px-2 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-100 transition focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            <span class="sm-avatar-sm">{{ $userInitials }}</span>
                            <span class="max-w-[120px] truncate">{{ Auth::user()->name }}</span>
                            <svg class="h-4 w-4 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profil Saya
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- Mobile menu button --}}
            <button @click="open = ! open"
                    class="md:hidden inline-flex items-center justify-center p-2 rounded-lg text-slate-500 hover:text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-primary"
                    aria-label="Toggle menu">
                <svg x-show="!open" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" x-cloak class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div x-show="open" x-cloak x-transition class="md:hidden border-t border-slate-200 bg-white">
        <div class="sm-container py-3 space-y-1">
            <a href="{{ url('/') }}" class="block sm-nav-link">Beranda</a>
            <a href="{{ route('dashboard') }}" class="block {{ request()->routeIs('dashboard') ? 'sm-nav-link-active' : 'sm-nav-link' }}">Dashboard</a>
            <a href="{{ route('partners.index') }}" class="block {{ request()->routeIs('partners.*') ? 'sm-nav-link-active' : 'sm-nav-link' }}">Temukan Partner</a>
            <a href="{{ route('user.skills.index') }}" class="block {{ request()->routeIs('user.skills.*') ? 'sm-nav-link-active' : 'sm-nav-link' }}">Skill Saya</a>
            @if (Route::has('learning-requests.index'))
            <a href="{{ route('learning-requests.index') }}" class="block {{ request()->routeIs('learning-requests.*') ? 'sm-nav-link-active' : 'sm-nav-link' }}">Learning Request</a>
            @endif
            @if(auth()->user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}" class="block sm-nav-link">Dashboard Admin</a>
            @endif
        </div>

        <div class="border-t border-slate-200 sm-container py-4">
            <div class="flex items-center gap-3 mb-3">
                <span class="sm-avatar-md">{{ $userInitials }}</span>
                <div class="min-w-0">
                    <div class="font-medium text-slate-900 truncate">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-muted truncate">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="space-y-1">
                <a href="{{ route('profile.edit') }}" class="block sm-nav-link">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left sm-nav-link text-danger hover:bg-red-50">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>[x-cloak]{display:none!important}</style>
