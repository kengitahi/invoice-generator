@props([
    'reverse' => '',
    'title' => '',
    'body' => '',
    'image' => '',
    'href' => '#',
    'target' => '',
    'linkText' => '',
    'icon' => '',
])

@php
    $classes = 'flex flex-col items-center justify-center space-y-4 md:space-y-0 md:space-x-4 ';
    if ($reverse) {
        $classes .= 'md:flex-row-reverse md:space-x-0 md:gap-4';
    } else {
        $classes .= 'md:flex-row';
    }
@endphp

<div {{ $attributes->twMerge(['class' => $classes]) }}>
    <div class="flex justify-center flex-1 max-w-80">
        <img alt="woman holding laptop" class="inline-block w-full h-auto text-center rounded-2xl"
            src="{{ asset('storage/images/' . $image) }}" />
    </div>
    <div class="flex-1 space-y-4">
        <x-typography.card-heading>
            {{ $title }}
        </x-typography.card-heading>
        <x-typography.card-text>
            {{ $body }}
        </x-typography.card-text>
        <x-links.link class="flex gap-1 w-fit group transition duration-300 ease-in-out" href="{{ $href }}" target="{{ $target }}" type="primary">
            {{ $linkText }}
            {{ $icon }}
        </x-links.link>
    </div>
</div>
