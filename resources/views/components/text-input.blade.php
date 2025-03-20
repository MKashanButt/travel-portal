@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-[#19140035] dark:border-[#3E3E3A] dark:bg-[#161615] focus:border-[#13274F] dark:focus:border-[#13274F] focus:ring-[#13274F]/10 dark:focus:ring-[#13274F]/10 focus:ring-2 shadow-sm']) }}>
