@props(['label', 'icon', 'sidebarOpen' => true])

<div x-data="{ open: false }">
    <button 
        @click="open = !open"
        class="flex items-center justify-between w-full px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700 transition-all"
    >
        <div class="flex items-center gap-3">
            <x-icon :name="$icon" class="w-5 h-5 text-gray-600" />
            @if($sidebarOpen)
                <span>{{ $label }}</span>
            @endif
        </div>
        @if($sidebarOpen)
        <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
        @endif
    </button>

    <div x-show="open" x-transition class="mt-1 pl-8 space-y-1" x-cloak>
        {{ $slot }}
    </div>
</div>
