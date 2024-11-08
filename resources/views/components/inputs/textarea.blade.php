@props(['disabled' => false])

<div
    class="[&>textarea]:overflow-scroll-y grid text-sm after:invisible after:whitespace-pre-wrap after:border after:px-3.5 after:py-2.5 after:text-inherit after:content-[attr(data-cloned-val)_'_'] after:[grid-area:1/1/2/2] [&>textarea]:resize-none [&>textarea]:text-inherit [&>textarea]:[grid-area:1/1/2/2]">

    {{-- //TODO:Check why the font is not picking up --}}

    <textarea
        {{ $attributes->twMerge(['class' => 'block w-full px-4 py-2 mt-2 text-base placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent focus:ring-opacity-90 !text-gray-800']) }}
        @disabled($disabled) onInput="this.parentNode.dataset.clonedVal = this.value">{{$slot}}</textarea>
</div>
