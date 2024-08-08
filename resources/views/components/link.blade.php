@php
    $classes= "underline text-xs text-gray-600 hover:text-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 font-bold"
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{$slot}}
</a>