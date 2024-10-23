@props(['btn' => 'primary', 'disabled'=>false])

@php
    $classes = "inline-flex items-center justify-center w-full px-4 py-3 md:py-1.5 font-medium leading-6 text-center whitespace-no-wrap transition duration-150 ease-in-out border border-transparent md:mr-1 md:w-auto rounded-md focus:outline-none focus:shadow-outline-gray font-regular text-center cursor-pointer disabled:bg-grey-400 disabled:cursor-not-allowed ";

    if ($btn == 'primary') {
        $classes .= 'text-white bg-primary hover:bg-blue-500 focus:border-blue-700 active:bg-blue-700 border-blue-500';
    }

    if ($btn == 'secondary') {
        $classes .= 'text-gray-600 bg-white hover:bg-white focus:border-gray-700 active:bg-gray-700';
    }

    if ($btn == 'tertiary') {
        $classes .= 'text-gray-200 hover:text-white focus:border-blue-700 active:bg-blue-700';
    }

    if ($btn == 'danger') {
        $classes .= 'text-white focus:border-blue-700 active:bg-blue-700 bg-red-500 hover:bg-red-700 hover:shadow-md';
    }

@endphp

<button {{ $attributes->twMerge(['class' => $classes]) }} type="button" {{ $disabled ? 'disabled' : ''}}>
    {{ $slot }}
</button>
