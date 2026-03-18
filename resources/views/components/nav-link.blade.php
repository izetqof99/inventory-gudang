@props(['href', 'label', 'icon' => null]) <!-- ✅ benar -->

@php
$active = request()->is(ltrim($href, '/').'*') ? 'bg-gray-200 text-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-100';
@endphp

<a href="{{ $href }}" class="flex items-center px-3 py-2 rounded-md {{ $active }}">
    <x-icon name="{{ $icon }}" class="w-5 h-5 mr-2" />
    {{ $label }}
</a>


