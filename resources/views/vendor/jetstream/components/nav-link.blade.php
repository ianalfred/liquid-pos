@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center block px-4 py-2 text-md font-medium leading-5 text-white dark:text-gray-100 focus:outline-none focus:border-white transition'
            : 'flex items-center block px-4 py-2 text-md font-medium leading-5 hover:text-gray-100 dark:hover:text-gray-200 hover:bg-purple-800 dark:hover:bg-gray-700 focus:outline-none focus:text-white focus:border-white transition';
$activeLink = ($active ?? false)
            ? 'absolute inset-y-0 left-0 w-1 bg-white dark:bg-purple-600 rounded-tr-lg rounded-br-lg'
            : 'absolute inset-y-0 left-0 w-1 bg-transparent rounded-tr-lg rounded-br-lg';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span {{ $attributes->merge(['class' => $activeLink]) }}></span>
    {{ $slot }}
</a>
