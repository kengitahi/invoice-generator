@props(['disabled' => false, 'text' => '$'])

<div class="flex items-center w-full px-4 mt-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent focus:ring-opacity-50 has-[:focus]:ring-1 has-[:focus]:ring-primary has-[:focus]:border-transparent has-[:focus]:ring-opacity-90">
    <span>{{ $text }}</span><input @disabled($disabled) {{ $attributes->merge(['class' => 'block w-full text-base placeholder-gray-400 border-0 border-transparent focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent focus:ring-opacity-0 text-gray-800']) }}>
</div>


