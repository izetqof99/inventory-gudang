@extends('layouts.app')

@section('header', 'Manajemen Supplier')

@section('content')
<!-- Tambah SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container mx-auto px-4 py-6" x-data="supplierApp()">
    <!-- Heading -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Manajemen Supplier</h2>
        <p class="text-gray-500">Kelola semua data supplier dalam satu tempat</p>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        <div class="bg-white border-l-4 border-blue-500 shadow rounded-lg p-4 flex items-center space-x-4">
            <div class="text-blue-500 text-2xl"><i class="fas fa-users"></i></div>
            <div>
                <p class="text-sm text-gray-500">Total Supplier</p>
                <p class="text-xl font-semibold">{{ count($supplier) }}</p>
            </div>
        </div>
        
        <div class="bg-white border-l-4 border-purple-500 shadow rounded-lg p-4 flex items-center space-x-4">
            <div class="text-purple-500 text-2xl"><i class="fas fa-building"></i></div>
            <div>
                <p class="text-sm text-gray-500">Perusahaan Tercatat</p>
                <p class="text-xl font-semibold">{{ $supplier->unique('supplier')->count() }}</p>
            </div>
        </div>
    </div>

    <!-- Button Tambah -->
    <div class="flex justify-end mb-4">
        <button @click="openCreate = true; form = { supplier: '', alamat: '' }"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 shadow">
            + Tambah Supplier
        </button>
    </div>

    <!-- Table -->
    <div class="bg-white shadow rounded-lg overflow-x-auto border border-blue-600 rounded-xl">
                <table class="min-w-full divide-y divide-blue-600">
                    <thead class="bg-blue-300">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-800 uppercase">#</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-800 uppercase">Nama Perusahaan</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-800 uppercase">Alamat</th>
                <th class="px-6 py-3 text-right text-xs font-semibold text-gray-800 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($supplier as $index => $item)
        <tr>
            <td class="px-6 py-4">{{ $index + 1 }}</td>
            <td class="px-6 py-4 font-semibold">{{ $item->supplier }}</td>
            <td class="px-6 py-4">{{ $item->alamat }}</td>
            <td class="px-6 py-4 text-right space-x-2">
                <button @click="form = { id: {{ $item->id }}, supplier: '{{ $item->supplier }}', alamat: '{{ $item->alamat }}' }; openEdit = true"
                    class="bg-yellow-400 hover:bg-yellow-500 text-white p-2 rounded-full shadow" title="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-icon lucide-pencil"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/>
                    </svg>
                </button>
                <button @click="deleteId = {{ $item->id }}; openDelete = true"
                    class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-full shadow" title="Hapus">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-icon lucide-trash"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                    </svg>
                </button>
            </td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>

    <!-- Modal Tambah Supplier -->
    <div x-show="openCreate" x-transition.opacity x-transition.scale
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        @click.away="openCreate = false">
        <div class="bg-white p-6 rounded-2xl shadow-xl w-full max-w-md transition-all duration-300">
            <div class="flex items-center space-x-3 mb-4">
                <!-- Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4" />
                </svg>
                <h2 class="text-xl font-semibold text-gray-800">Tambah Supplier</h2>
            </div>
            <form @submit.prevent="saveSupplier()">
                <label class="block text-sm text-gray-700 mb-1">Nama Perusahaan</label>
                <input type="text" x-model="form.supplier"
                    class="w-full mb-4 border-gray-300 rounded-xl px-4 py-2 shadow-sm focus:ring focus:ring-blue-100 focus:outline-none"
                    required>
                <label class="block text-sm text-gray-700 mb-1">Alamat</label>
                <textarea x-model="form.alamat"
                    class="w-full mb-4 border-gray-300 rounded-xl px-4 py-2 shadow-sm focus:ring focus:ring-blue-100 focus:outline-none"
                    required></textarea>
                <div class="flex justify-end space-x-2 mt-3">
                    <button type="button" @click="openCreate = false"
                        class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-xl text-gray-700 shadow">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- Modal Edit -->
    <!-- Modal Edit Supplier -->
    <div x-show="openEdit" x-transition.opacity x-transition.scale
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        @click.away="openEdit = false">
        <div class="bg-white p-6 rounded-2xl shadow-xl w-full max-w-md transition-all duration-300">
            <div class="flex items-center space-x-3 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z" />
                </svg>
                <h2 class="text-xl font-semibold text-gray-800">Edit Supplier</h2>
            </div>
            <form @submit.prevent="updateSupplier()">
                <label class="block text-sm text-gray-700 mb-1">Nama Perusahaan</label>
                <input type="text" x-model="form.supplier"
                    class="w-full mb-4 border-gray-300 rounded-xl px-4 py-2 shadow-sm focus:ring focus:ring-yellow-100 focus:outline-none"
                    required>
                <label class="block text-sm text-gray-700 mb-1">Alamat</label>
                <textarea x-model="form.alamat"
                    class="w-full mb-4 border-gray-300 rounded-xl px-4 py-2 shadow-sm focus:ring focus:ring-yellow-100 focus:outline-none"
                    required></textarea>
                
                <div class="flex justify-end space-x-2 mt-3">
                    <button type="button" @click="openEdit = false"
                        class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-xl text-gray-700 shadow">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-xl shadow">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- Modal Delete -->
    <!-- Modal Konfirmasi Hapus -->
    <div x-show="openDelete" x-transition.opacity x-transition.scale
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        @click.away="openDelete = false">
        <div class="bg-white p-6 rounded-2xl shadow-xl w-full max-w-md text-center transition-all duration-300">
            <div class="flex justify-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Hapus Supplier</h2>
            <p class="text-sm text-gray-600 mb-4">Apakah kamu yakin ingin menghapus supplier ini?</p>
            <div class="flex justify-center space-x-3">
                <button @click="openDelete = false"
                    class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-xl shadow">
                    Batal
                </button>
                <button @click="deleteSupplier()"
                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl shadow">
                    Hapus
                </button>
            </div>
        </div>
    </div>
</div>


<script>
function supplierApp() {
    return {
        openCreate: false,
        openEdit: false,
        openDelete: false,
        form: { id: '', supplier: '', alamat: '', status: 'active' },
        deleteId: '',

        saveSupplier() {
            fetch("{{ route('supplier.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(this.form)
            }).then(res => res.json())
              .then(res => {
                  if (res.success) {
                      Swal.fire('Berhasil!', 'Data berhasil ditambahkan.', 'success')
                          .then(() => location.reload());
                  } else {
                      Swal.fire('Gagal!', 'Gagal menyimpan data.', 'error');
                  }
              });
        },

        updateSupplier() {
            fetch(`/supplier/${this.form.id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(this.form)
            }).then(res => res.json())
              .then(res => {
                  if (res.success) {
                      Swal.fire('Berhasil!', 'Data berhasil diperbarui.', 'success')
                          .then(() => location.reload());
                  } else {
                      Swal.fire('Gagal!', 'Gagal memperbarui data.', 'error');
                  }
              });
        },

        deleteSupplier() {
            fetch(`/supplier/${this.deleteId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(res => res.json())
              .then(res => {
                  if (res.success) {
                      Swal.fire('Dihapus!', 'Supplier berhasil dihapus.', 'success')
                          .then(() => location.reload());
                  } else {
                      Swal.fire('Gagal!', 'Supplier gagal dihapus.', 'error');
                  }
              });
        }
    }
}
</script>
@endsection
