@extends('layout.layouts')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Tambah Barang</h1>
    
    <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Barang" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipe Barang</label>
            <select class="form-select" id="type" name="type" required>
                <option value="" selected disabled>Pilih Tipe Barang</option>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan Jumlah Stok" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Barang</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
