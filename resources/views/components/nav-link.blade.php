@props(['active'])

@php
$classes = ($active ?? false)
    ? 'block w-full px-3 py-2 text-sm font-medium text-[#13274F] dark:text-[#13274F] border-l-2 border-[#13274F] dark:border-[#13274F] bg-[#13274F]/5 dark:bg-[#13274F]/5'
    : 'block w-full px-3 py-2 text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] hover:text-[#13274F] dark:hover:text-[#13274F] hover:bg-[#13274F]/5 dark:hover:bg-[#13274F]/5 border-l-2 border-transparent';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
