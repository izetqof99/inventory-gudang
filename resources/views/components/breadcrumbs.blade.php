<ol class="flex items-center flex-wrap text-sm text-gray-500 space-x-2">
    @foreach ($breadcrumbs as $breadcrumb)
        <li class="flex items-center">
            @if (!$loop->first)
                <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            @endif

            @if (!is_null($breadcrumb->url) && !$loop->last)
                <a href="{{ $breadcrumb->url }}" class="text-blue-600 font-semibold hover:underline flex items-center gap-1">
                    {{-- Ikon berdasarkan title --}}
                    @if (Str::contains($breadcrumb->title, 'Data Barang'))
                        <i class="fas fa-box text-blue-600"></i>
                    @elseif (Str::contains($breadcrumb->title, 'Kelompok Tani'))
                        <i class="fas fa-people-group text-blue-600"></i>
                    @elseif (Str::contains($breadcrumb->title, 'Jenis Barang'))
                        <i class="fa-solid fa-boxes-stacked text-blue-600"></i>
                    @elseif (Str::contains($breadcrumb->title, 'Barang Masuk'))
                        <i class="fa-plus  text-blue-600"></i>
                    @elseif ($breadcrumb->title === 'Dashboard')
                        <i class="fas fa-home text-blue-600"></i>
                    @elseif ($breadcrumb->title === 'Satuan Barang')
                        <i class="fas fa-shapes text-blue-600"></i>
                    @endif
                    {{ $breadcrumb->title }}
                </a>
            @else
                <span class="text-blue-700 font-semibold flex items-center gap-1">
                    @if (Str::contains($breadcrumb->title, 'Data Barang'))
                        <i class="fas fa-box text-blue-600"></i>
                    @elseif (Str::contains($breadcrumb->title, 'Kelompok Tani'))
                        <i class="fas fa-people-group text-blue-600"></i>
                    @elseif (Str::contains($breadcrumb->title, 'Jenis Barang'))
                        <i class="fa-solid fa-boxes-stacked text-blue-600"></i>
                    @elseif (Str::contains($breadcrumb->title, 'Barang Masuk'))
                        <i class="fa-plus text-blue-600"></i>
                    @elseif ($breadcrumb->title === 'Dashboard')
                        <i class="fas fa-home text-blue-600"></i>
                    @elseif ($breadcrumb->title === 'Satuan Barang')
                        <i class="fas fa-shapes text-blue-600"></i>
                    @endif
                    {{ $breadcrumb->title }}
                </span>
            @endif
        </li>
    @endforeach
</ol>
