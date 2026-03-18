@extends('layouts.app')

@section('header', 'Tambah Barang')

@section('content')
<!-- Breadcrumb -->
<div>
    {{ Breadcrumbs::render('barang.create') }}
</div>
<div class="container mx-auto px-4 py-6">
    <div class="max-w-4xl mx-auto">
        <!-- Header Section -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Tambah Barang Baru</h1>
                        <p class="text-green-100 mt-1">Masukkan informasi barang yang akan ditambahkan</p>
                    </div>
                    <a href="{{ route('barang.index') }}" 
                       class="inline-flex items-center gap-2 bg-white text-green-600 px-4 py-2 rounded-lg font-medium hover:bg-green-50 transition-all duration-200">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Form Section -->
            <div class="p-6">
                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data" id="barangForm">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Barang -->
                        <div class="form-group">
                            <label for="nama_barang" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-box text-blue-500 mr-2"></i>Nama Barang <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                                placeholder="Masukkan nama barang" required>
                        </div>

                        <!-- Jenis Barang -->
                        <div class="form-group">
                            <label for="jenis_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-tags text-blue-500 mr-2"></i>Jenis Barang <span class="text-red-500">*</span>
                            </label>
                            <select id="jenis_id" name="jenis_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Jenis Barang</option>
                                @foreach($jenis_barangs as $jenis)
                                    <option value="{{ $jenis->id }}" {{ old('jenis_id') == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->jenis_barang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Berat -->
                        <div class="form-group">
                            <label for="berat" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-weight text-blue-500 mr-2"></i>Kuantitas
                            </label>
                            <input type="number" name="berat" step="0.01" min="0.01" value="{{ old('berat') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                                placeholder="Contoh: 50">
                        </div>

                        <!-- Harga -->
                        <div class="form-group">
                            <label for="harga" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-money-bill text-blue-500 mr-2"></i>Harga
                            </label>
                            <input type="number" name="harga" step="0.01"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                                value="{{ old('harga') }}" placeholder="Masukkan harga barang">
                        </div>

                        <!-- Satuan -->
                        <div class="form-group">
                            <label for="satuan_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-balance-scale text-blue-500 mr-2"></i>Satuan <span class="text-red-500">*</span>
                            </label>
                            <select id="satuan_id" name="satuan_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Satuan</option>
                                @foreach($satuans as $satuan)
                                    <option value="{{ $satuan->id }}" {{ old('satuan_id') == $satuan->id ? 'selected' : '' }}>
                                        {{ $satuan->satuan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Stok Minimum -->
                        <div class="form-group">
                            <label for="stok_minimum" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-warehouse text-blue-500 mr-2"></i>Stok Minimum <span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="stok_minimum" name="stok_minimum" value="{{ old('stok_minimum') }}" min="0"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                                placeholder="0" required>
                        </div>
                    </div>

                    <!-- Auto Generate Kode Barang (Hidden for display) -->
                    <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                            <div>
                                <p class="text-sm font-medium text-blue-800">Kode Barang</p>
                                <p class="text-xs text-blue-600">Kode barang akan dibuat otomatis setelah form disimpan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-end">
                        <a href="{{ route('barang.index') }}" 
                           class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200">
                            <i class="fas fa-times mr-2"></i>
                            Batal
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center justify-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200 shadow-md hover:shadow-lg">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Barang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 shadow-xl">
        <div class="flex items-center">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-green-600 mr-3"></div>
            <span class="text-gray-700">Menyimpan data...</span>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image preview functionality

    // Form submission with loading
    const form = document.getElementById('barangForm');
    const loadingOverlay = document.getElementById('loadingOverlay');

    form.addEventListener('submit', function(e) {
        // Show loading overlay
        loadingOverlay.classList.remove('hidden');
        loadingOverlay.classList.add('flex');
        
        // Disable submit button to prevent double submission
        const submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
    });

    // Auto-generate kode suggestion based on nama barang
    const namaBarangInput = document.getElementById('nama_barang');
    namaBarangInput.addEventListener('blur', function() {
        // This is just for display, actual kode generation happens in backend
        const nama = this.value.trim();
        if (nama) {
            console.log('Nama barang entered:', nama);
        }
    });

    // Form validation
    const requiredFields = form.querySelectorAll('[required]');
    requiredFields.forEach(field => {
        field.addEventListener('blur', function() {
            if (!this.value.trim()) {
                this.classList.add('border-red-500');
            } else {
                this.classList.remove('border-red-500');
                this.classList.add('border-green-500');
            }
        });
    });
});
</script>

<style>
.form-group {
    position: relative;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
}

#imagePreviewContainer:hover {
    border-color: #22c55e;
}
</style>
@endsection