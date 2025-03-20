@props(['title', 'value'])

<div class="bg-white dark:bg-[#161615] border border-[#19140035] dark:border-[#3E3E3A] p-6">
    <div class="text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">{{ $title }}</div>
    <div class="mt-2 text-3xl font-semibold text-[#13274F] dark:text-[#13274F]">{{ $value }}</div>
    {{ $slot }}
</div>
