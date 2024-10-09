@props(['reverse' => ''])

@php
    $classes = 'flex items-center justify-center space-y-4 md:space-y-0 md:space-x-4 ';

    if ($reverse) {
        $classes .= 'flex-row-reverse';
    }
@endphp

<div {{ $attributes->twMerge(['class' => $classes]) }}>
    <div class="flex justify-center flex-1 max-w-80">
        <img alt="woman holding laptop" class="inline-block w-full h-auto text-center rounded-2xl"
            src="{{ asset('storage/images/lady-holding-laptop-3.jpg') }}" />
    </div>
    <div class="flex-1 space-y-4">
        <x-typography.card-heading>
            Feature title
        </x-typography.card-heading>
        <x-typography.card-text>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi, corrupti ad. Quasi, voluptatum.
            Similique neque atque expedita dolorum repellat nobis, perferendis fugiat ducimus facere, labore libero non?
            Harum quasi amet eveniet voluptatibus eligendi porro omnis mollitia veritatis recusandae sapiente odit
            asperiores ipsam, accusamus doloremque.
        </x-typography.card-text>
        <x-links.link href="#" type="primary">
            Learn More
        </x-links.link>
    </div>
</div>
