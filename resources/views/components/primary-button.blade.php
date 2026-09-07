<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-3 bg-primary border border-transparent rounded-xl font-semibold text-sm text-white hover:bg-primary-700 focus:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 shadow-[0_9px_18px_rgb(39_101_223_/_20%)] transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
