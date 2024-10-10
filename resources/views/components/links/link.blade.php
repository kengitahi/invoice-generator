@props(['type' => '', 'href' => '#'])

@php
    $classes = "inline-flex items-center justify-center px-4 py-3 md:py-1.5 font-medium leading-6 text-center whitespace-no-wrap
transition duration-150 ease-in-out border border-transparent md:mr-1 w-auto rounded-md focus:outline-none focus:shadow-outline-gray font-regular text-center ";

    if ($type == 'primary') {
        $classes .= 'text-white bg-primary hover:bg-blue-500 focus:border-blue-700 active:bg-blue-700';
    }

    if ($type == 'secondary') {
        $classes .= 'text-gray-600 bg-white hover:bg-white focus:border-gray-700 active:bg-gray-700';
    }

    if ($type == 'tertiary') {
        $classes .= 'text-gray-200 hover:text-white focus:border-blue-700 active:bg-blue-700';
    }

@endphp

{{--
Primary -text-white bg-primary hover:bg-blue-500 focus:border-blue-700 active:bg-blue-700
Secondary
Tertiary - text-gray-600 bg-white hover:bg-white focus:border-gray-700 active:bg-gray-700
--}}

<a {{ $attributes->twMerge(['class' => $classes]) }} href="{{ $href }}">
    {{ $slot }}
</a>
