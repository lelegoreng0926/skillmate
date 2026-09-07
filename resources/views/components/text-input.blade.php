@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-slate-200 focus:border-primary focus:ring-primary rounded-xl shadow-sm px-3.5 py-2.5 text-sm placeholder:text-slate-400']) }}>
