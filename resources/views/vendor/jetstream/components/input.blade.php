@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 text-gray-800 dark:border-gray-700 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-200 bg-gray-100 dark:bg-gray-700 focus:border-purple-600 dark:focus:border-purple-600 rounded-md shadow-sm']) !!}>
