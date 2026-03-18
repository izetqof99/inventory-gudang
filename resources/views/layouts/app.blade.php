<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>UD. Klinik Tani</title>

    <link rel="icon" href="{{ asset('asset/images/gg.ico') }}" type="image/x-icon">

    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Toastr CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <!-- Alpine -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 text-gray-800">
<div class="flex min-h-screen" x-data="{ sidebarOpen: true }">
    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'w-64' : 'w-20'" 
           class="bg-gray-50 shadow-md border-r transition-all duration-300">
        <!-- Logo/Brand -->
        <div class="flex items-center justify-between p-4 border-b bg-gray-50">
            <div class="flex items-center space-x-2">
                <img x-show="sidebarOpen"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-90"
                    src="{{ asset('asset/images/gg.ico') }}" 
                    alt="Logo" class="w-8 h-8">

                <span x-show="sidebarOpen" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" 
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100" 
                    x-transition:leave-end="opacity-0"
                    class="font-semibold text-lg">
                    UD. Klinik Tani
                </span>
            </div>
            <button @click="sidebarOpen = !sidebarOpen" 
                    class="text-gray-600 hover:text-blue-600 focus:outline-none transition">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    width="24" height="24" viewBox="0 0 24 24" 
                    fill="none" stroke="currentColor" stroke-width="2" 
                    stroke-linecap="round" stroke-linejoin="round"
                    class="h-6 w-6 transform transition-transform duration-300"
                    :class="sidebarOpen ? 'rotate-180' : 'rotate-0'">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="m12 8-4 4 4 4"/>
                    <path d="M16 12H8"/>
                </svg>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="p-4 space-y-2 text-sm">
            <a href="/dashboard"
                class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-200 text-gray-700 transition ">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                    stroke-linejoin="round" class="lucide lucide-house-icon lucide-house"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                <span x-show="sidebarOpen" class="origin-left duration-200">Dashboard</span>
            </a>

            <div class="text-xs text-gray-400 uppercase tracking-wide mt-6 mb-2 font-medium" x-show="sidebarOpen">
                Barang
            </div>

            <!-- Data Barang Dropdown -->
            <div x-data="{ open: false }">
                <button @click="open = !open"
                        class="flex items-center justify-between w-full px-3 py-2 rounded-md hover:bg-gray-100 text-gray-700 transition">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-box-icon lucide-box"><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/></svg>
                        <span x-show="sidebarOpen" class="origin-left duration-200">Barang</span>
                    </div>
                    <i x-show="sidebarOpen" :class="{'rotate-180': open}" class="fas fa-chevron-down transition-transform duration-200"></i>
                </button>
                <div x-show="open" x-transition class="mt-1 space-y-1 pl-8">
                    <a href="/barang" class="block px-3 py-1 rounded hover:bg-gray-200">Data Barang</a>
                    <a href="/jenis-barang" class="block px-3 py-1 rounded hover:bg-gray-200">Jenis</a>
                    <a href="/satuan-barang" class="block px-3 py-1 rounded hover:bg-gray-200">Satuan</a>
                </div>
            </div>

            <div class="text-xs text-gray-400 uppercase tracking-wide mt-6 mb-2 font-medium" x-show="sidebarOpen">
                Transaksi
            </div>

            <a href="/kasir" 
                class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-200 text-gray-700 transition ">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-coins-icon lucide-coins"><circle cx="8" cy="8" r="6"/><path d="M18.09 10.37A6 6 0 1 1 10.34 18"/><path d="M7 6h1v4"/><path d="m16.71 13.88.7.71-2.82 2.82"/>
                </svg>
                <span x-show="sidebarOpen" class="origin-left duration-200">Kasir</span>
            </a>
            <a href="/barang-masuk" 
                class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-200 text-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>

                <span x-show="sidebarOpen" class="origin-left duration-200">Barang Masuk</span>
            </a>
            <a href="/barang-keluar" 
                class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-200 text-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-restore-icon lucide-archive-restore"><rect width="20" height="5" x="2" y="3" rx="1"/><path d="M4 8v11a2 2 0 0 0 2 2h2"/><path d="M20 8v11a2 2 0 0 1-2 2h-2"/><path d="m9 15 3-3 3 3"/><path d="M12 12v9"/>
                </svg>
                <span x-show="sidebarOpen" class="origin-left duration-200">Barang Keluar</span>
            </a>
            

            @if(auth()->user()->role->name === 'admin')
                <div class="text-xs text-gray-400 uppercase tracking-wide mt-6 mb-2 font-medium" x-show="sidebarOpen">
                    Admin Panel
                </div>

                <div x-data="{ open: false }">
                    <button @click="open = !open"
                            class="flex items-center justify-between w-full px-3 py-2 rounded-md hover:bg-gray-100 text-gray-700 transition">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                class="lucide lucide-handshake-icon lucide-handshake"><path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/><path d="m21 3 1 11h-2"/><path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"/><path d="M3 4h8"/></svg>
                            <span x-show="sidebarOpen" class="origin-left duration-200">Mitra Usaha</span>
                        </div>
                        <i x-show="sidebarOpen" :class="{'rotate-180': open}" class="fas fa-chevron-down transition-transform duration-200"></i>
                    </button>
                    <div x-show="open" x-transition class="mt-1 space-y-1 pl-8 @click.stop">
                        <a href="/supplier" class="block px-3 py-1 rounded hover:bg-gray-200">Supplier</a>
                        <a href="/kelompok-petani" class="block px-3 py-1 rounded hover:bg-gray-200">Kelompok Tani</a>
                    </div>
                </div>

                <a href="/penjualans" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-200 text-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                        stroke-linecap="round" stroke-linejoin="round" 
                        class="lucide lucide-shopping-bag-icon lucide-shopping-bag">
                        <path d="M16 10a4 4 0 0 1-8 0"/><path d="M3.103 6.034h17.794"/>
                        <path d="M3.4 5.467a2 2 0 0 0-.4 1.2V20a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6.667a2 2 0 0 0-.4-1.2l-2-2.667A2 2 0 0 0 17 2H7a2 2 0 0 0-1.6.8z"/>
                    </svg>
                    <span x-show="sidebarOpen" class="origin-left duration-200">Data Penjualan</span>
                </a>

                <a href="/subsidi-barang" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-200 text-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-percent-icon lucide-percent"><line x1="19" x2="5" y1="5" y2="19"/><circle cx="6.5" cy="6.5" r="2.5"/><circle cx="17.5" cy="17.5" r="2.5"/>
                    </svg>
                    <span x-show="sidebarOpen" class="origin-left duration-200">Subsidi Barang</span>
                </a>

                

                <!-- Laporan Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                            class="flex items-center justify-between w-full px-3 py-2 rounded-md hover:bg-gray-100 text-gray-700 transition">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-check-icon lucide-file-check"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="m9 15 2 2 4-4"/>
                            </svg>
                            <span x-show="sidebarOpen" class="origin-left duration-200">Laporan</span>
                        </div>
                        <i x-show="sidebarOpen" :class="{'rotate-180': open}" class="fas fa-chevron-down transition-transform duration-200"></i>
                    </button>
                    <div x-show="open" x-transition class="mt-1 space-y-1 pl-8">
                        <a href="/laporan-stok-barang" class="block px-3 py-1 rounded hover:bg-gray-100">Stok</a>
                        <a href="/penjualan-detail" class="block px-3 py-1 rounded hover:bg-gray-100">Penjualan</a>
                        <a href="/laporan-barang-masuk" class="block px-3 py-1 rounded hover:bg-gray-100">Barang Masuk</a>
                        <a href="/laporan-barang-keluar" class="block px-3 py-1 rounded hover:bg-gray-100">Barang Keluar</a>
                    </div>
                </div>

                <a href="{{ route('users.index') }}" 
                    class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-200 text-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-cog-icon lucide-user-round-cog">
                        <path d="m14.305 19.53.923-.382"/><path d="m15.228 16.852-.923-.383"/><path d="m16.852 15.228-.383-.923"/><path d="m16.852 20.772-.383.924"/><path d="m19.148 15.228.383-.923"/><path d="m19.53 21.696-.382-.924"/><path d="M2 21a8 8 0 0 1 10.434-7.62"/><path d="m20.772 16.852.924-.383"/><path d="m20.772 19.148.924.383"/><circle cx="10" cy="8" r="5"/><circle cx="18" cy="18" r="3"/>
                    </svg>
                    <span x-show="sidebarOpen" class="origin-left duration-200">Manajemen Pengguna</span>
                </a>

                

                <a href="/hak-akses" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-200 text-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-user-icon lucide-shield-user"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="M6.376 18.91a6 6 0 0 1 11.249.003"/><circle cx="12" cy="11" r="4"/>
                    </svg>
                    <span x-show="sidebarOpen" class="origin-left duration-200">Manajemen Hak Akses</span>
                </a>
                
                <a href="/activity-log" 
                    class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-200 text-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-list-icon lucide-clipboard-list"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/>
                    </svg>
                    <span x-show="sidebarOpen" class="origin-left duration-200">Aktivitas User</span>
                </a>
            @endif

            <hr class="my-6 border-gray-200">
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
    <header class="sticky top-0 z-10 bg-white border-b px-6 py-4 flex justify-between items-center shadow-sm">
        <h1 class="text-2xl font-semibold text-gray-800"></h1>

        <!-- User Menu -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-user-icon lucide-circle-user"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="10" r="3"/><path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"/>
                </svg>
                <span class="hidden sm:inline-block font-medium text-gray-700">{{ auth()->user()->name }}</span>
                <i class="fas fa-chevron-down text-sm text-gray-500"></i>
            </button>
            <div x-show="open" @click.away="open = false" x-transition
                class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-50">
                    <i class="fas fa-user-edit mr-2"></i> Edit Profil
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

        <main class="flex-1 overflow-auto p-6 bg-gray-50">
            @yield('content')
        </main>

         <!-- Footer -->
    <footer class="w-full bg-white border-t mt-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} UD. Klinik Tani. All rights reserved.
        </div>
    </footer>
    </div>
        </div>

            <!-- External Scripts -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

            <!-- Page Specific Scripts -->
            @yield('scripts')
</body>
</html>
