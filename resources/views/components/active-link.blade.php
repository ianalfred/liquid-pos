@props(['active'])

@php
$classes = ($active ?? false)
            ? 'absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg'
            : 'absolute inset-y-0 left-0 w-1 bg-transparent rounded-tr-lg rounded-br-lg';
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>