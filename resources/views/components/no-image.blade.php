@php
    $expr = '/(?<=\s|^)[a-z]/i';
    preg_match_all($expr, $nameString, $matches);
    $result = implode('', $matches[0]);
    $initials = strtoupper($result);
@endphp

<div class="flex justify-center items-center h-{{ $height }} w-{{ $width }} rounded-full font-semibold text-md text-gray-50 bg-gray-500">
    {{ $initials }}
</div>