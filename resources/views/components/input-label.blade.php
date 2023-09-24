@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-white dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
