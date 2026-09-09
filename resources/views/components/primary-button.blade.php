<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex min-h-12 items-center justify-center rounded-full border border-primary bg-primary px-5 py-3 text-sm font-bold text-white shadow-[0_10px_22px_rgb(47_203_99_/_22%)] transition duration-[250ms] hover:scale-[1.03] hover:bg-primary-600 active:scale-[.98] focus:outline-none focus:ring-4 focus:ring-primary-100 disabled:cursor-not-allowed disabled:opacity-60']) }}>
    {{ $slot }}
</button>
