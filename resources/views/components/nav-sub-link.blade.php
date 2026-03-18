@props(['href', 'label'])

<a href="{{ $href }}" class="flex items-center space-x-2 px-2 py-1 rounded-md text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 text-sm transition">
    <span class="w-2 h-2 rounded-full bg-gray-400"></span>
    <span>{{ $label }}</span>
</a>