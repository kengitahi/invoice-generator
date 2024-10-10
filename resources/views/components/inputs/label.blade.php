@props(['value', 'optional'=>""])

<label {{ $attributes->merge(['class' => 'block text-md text-gray-900']) }}>
    {{ $value ?? $slot }}
    @if ($optional)
        <small class="text-gray-400">(optional)</small>
    @endif
</label>
