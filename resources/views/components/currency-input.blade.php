@props(['disabled' => false])
<div>
    <div class="relative flex items-center w-full z-0">
        <div class="absolute inset-y-0 right-0 flex items-center pr-2">
            <div class="text-md text-gray-500 font-semibold">
                {{ __('Ksh') }}
            </div>
        </div>
        <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 text-gray-800 dark:border-gray-700 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-200 bg-gray-100 dark:bg-gray-700 focus:border-purple-600 dark:focus:border-purple-600 rounded-md shadow-sm']) !!}>
    </div>
</div>
