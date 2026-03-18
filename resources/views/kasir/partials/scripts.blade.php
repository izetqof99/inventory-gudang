<script>
function updateSubtotal(row) {
    let harga = parseFloat(row.querySelector('.harga').value) || 0;
    let qty = parseInt(row.querySelector('.qty').value) || 0;
    row.querySelector('.subtotal').value = (harga * qty).toFixed(2);
    updateTotal();
}

function updateTotal() {
    let total = 0;
    document.querySelectorAll('.subtotal').forEach(s => {
        total += parseFloat(s.value) || 0;
    });
    document.getElementById('total').value = total.toFixed(2);

    document.getElementById('total_diskon').value = total.toFixed(2); // total akhir = total diskon karena sudah diskon per item

    let bayar = parseFloat(document.getElementById('bayar').value) || 0;
    let kembali = bayar - total;
    document.getElementById('kembali').value = kembali >= 0 ? kembali.toFixed(2) : '0.00';
}

function updateHargaPerBarang(row) {
    const barangSelect = row.querySelector('.barang-select');
    const barangId = barangSelect.value;
    const hargaAwal = parseFloat(barangSelect.selectedOptions[0].dataset.harga || 0);
    const berat = parseFloat(barangSelect.selectedOptions[0].dataset.berat || 1);
    const kelompokId = document.getElementById('kelompokSelect').value;

    if (kelompokId) {
        fetch(`/api/diskon/${kelompokId}/${barangId}`)
            .then(res => res.json())
            .then(data => {
                const hargaSubsidiPerKg = parseFloat(data.harga_subsidi_per_kg ?? 0);
                const totalSubsidi = hargaSubsidiPerKg * berat;
                const hargaFinal = Math.max(hargaAwal - totalSubsidi, 0); // potong harga asli

                row.querySelector('.harga').value = hargaFinal.toFixed(2);
                row.querySelector('.subsidi').value = totalSubsidi.toFixed(2);
                updateSubtotal(row);
            });
    } else {
        row.querySelector('.harga').value = hargaAwal.toFixed(2);
        row.querySelector('.subsidi').value = '0.00';
        updateSubtotal(row);
    }
}

function addRow() {
    const table = document.querySelector('#kasirTable tbody');
    const index = table.rows.length;
    const newRow = table.rows[0].cloneNode(true);

    newRow.querySelectorAll('select, input').forEach(el => {
        el.name = el.name.replace(/\d+/, index);
        if (el.classList.contains('harga') || el.classList.contains('subtotal')) el.value = '';
        if (el.classList.contains('qty')) el.value = 1;
    });

    table.appendChild(newRow);
    bindEvents();
    updateHargaPerBarang(newRow);
}

function removeRow(btn) {
    const row = btn.closest('tr');
    if (document.querySelectorAll('#kasirTable tbody tr').length > 1) {
        row.remove();
        updateTotal();
    }
}

function bindEvents() {
    document.querySelectorAll('.barang-select').forEach(select => {
        select.onchange = function () {
            updateHargaPerBarang(this.closest('tr'));
        }
    });
    document.querySelectorAll('.qty').forEach(input => {
        input.oninput = function () {
            updateSubtotal(this.closest('tr'));
        }
    });
}

// Inisialisasi
document.getElementById('bayar').oninput = updateTotal;
document.getElementById('kelompokSelect').addEventListener('change', () => {
    document.querySelectorAll('#kasirTable tbody tr').forEach(updateHargaPerBarang);
});
bindEvents();
document.querySelectorAll('.barang-select').forEach(select => {
    updateHargaPerBarang(select.closest('tr'));
});
</script>
