@extends('layouts.app')

@section('content')
<div class="p-6 space-y-6">
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-5 rounded-xl shadow-md space-y-4">
        <div>
            <h2 class="text-2xl font-semibold text-gray-100">Laporan Stok Barang</h2>
            <p class="text-sm text-gray-100">Filter data berdasarkan stok barang</p>
        </div>

        <div class="ml-auto flex flex-col sm:flex-row gap-3">
            <select id="opsi"
                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="semua">Semua</option>
                <option value="minimum">Minimum (≤ 10)</option>
                <option value="stok-habis">Stok Habis</option>
            </select>

            <button type="button" onclick="loadData()"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow">
                Tampilkan
            </button>

            <button type="button" onclick="printPDF()"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md shadow">
                Cetak PDF
            </button>
        </div>
    </div>

    <div class="overflow-x-auto border border-blue-300 rounded-xl">
        <table class="min-w-full table-auto text-sm text-left text-gray-800">
            <thead class="bg-blue-600 text-xs uppercase text-gray-100">
                <tr>
                    <th class="px-4 py-3 border rounded-tl-lg">Kode</th>
                    <th class="px-4 py-3 border">Nama Barang</th>
                    <th class="px-4 py-3 border">Stok</th>
                    
                </tr>
            </thead>
            <tbody id="data-body" class="divide-y">
                <tr>
                    <td colspan="6" class="text-center px-4 py-3 text-gray-500">Memuat data...</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    function loadData() {
        const opsi = document.getElementById('opsi').value;

        fetch(`/laporan-stok-barang/data?opsi=${opsi}`)
            .then(res => res.json())
            .then(data => {
                const tbody = document.getElementById('data-body');
                tbody.innerHTML = '';

                if (!data.length) {
                    tbody.innerHTML = `<tr><td colspan="6" class="text-center px-4 py-3 text-gray-500">Data tidak ditemukan</td></tr>`;
                    return;
                }

                data.forEach(item => {
                    tbody.innerHTML += `
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">${item.kode_barang}</td>
                            <td class="px-4 py-2 border">${item.nama_barang}</td>
                            <td class="px-4 py-2 border">${item.stok}</td>
                        </tr>
                    `;
                });
            })
            .catch(() => {
                alert('Gagal mengambil data');
            });
    }

    function printPDF() {
        const opsi = document.getElementById('opsi').value;
        window.open(`/laporan-stok-barang/print?opsi=${opsi}`, '_blank');
    }

    window.onload = loadData;
</script>
@endsection
