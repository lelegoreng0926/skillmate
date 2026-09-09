@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-[18px] border-[#DDD2BF] bg-white/70 px-4 py-3 text-sm text-[#1A1A1A] shadow-none placeholder:text-[#9D968C] transition duration-200 hover:border-primary-300 hover:bg-white focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary-100']) }}>
