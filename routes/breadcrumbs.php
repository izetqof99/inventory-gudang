<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\BreadcrumbTrail;

// Index Barang (Data Barang)
Breadcrumbs::for('barang.index', function ($trail) {
    $trail->push('Data Barang', route('barang.index'));
});

// Create Barang (anak dari Index)
Breadcrumbs::for('barang.create', function ($trail) {
    $trail->parent('barang.index');
    $trail->push('Tambah Barang', route('barang.create'));
});

// Index Barang (Data Kelompok)
Breadcrumbs::for('kelompok-petani.index', function ($trail) {
    $trail->push('Kelompok Tani', route('kelompok-petani.index'));
});

// Create (anak dari Index)
Breadcrumbs::for('kelompok-petani.create', function ($trail) {
    $trail->parent('kelompok-petani.index');
    $trail->push('Tambah Petani', route('kelompok-petani.create'));
});

// Index Jenis Barang
Breadcrumbs::for('jenis-barang.index', function ($trail) {
    $trail->push('Jenis Barang', route('jenis-barang.index'));
});

// Tambah Jenis Barang
Breadcrumbs::for('jenis-barang.create', function ($trail) {
    $trail->parent('jenis-barang.index');
    $trail->push('Tambah Jenis Barang', route('jenis-barang.create'));
});

// Index Jenis Barang
Breadcrumbs::for('barang-masuk.index', function ($trail) {
    $trail->push('Barang Masuk', route('barang-masuk.index'));
});

// Tambah Jenis Barang
Breadcrumbs::for('barang-masuk.create', function ($trail) {
    $trail->parent('barang-masuk.index');
    $trail->push('Tambah Barang Masuk', route('barang-masuk.create'));
});

// Index Satuan Barang
Breadcrumbs::for('satuan-barang.index', function ($trail) {
    $trail->push('Satuan Barang', route('satuan-barang.index'));
});

// Tambah Satuan Barang
Breadcrumbs::for('satuan-barang.create', function ($trail) {
    $trail->parent('satuan-barang.index');
    $trail->push('Tambah Satuan', route('satuan-barang.create'));
});
