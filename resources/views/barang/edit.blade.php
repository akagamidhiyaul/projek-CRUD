@extends('layout.layouts')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4>Edit Barang</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Nama Barang -->
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ old('nama_barang', $barang->nama_barang) }}" required>
                        </div>

                        <!-- Type Barang -->
                        <div class="mb-3">
                            <label for="type" class="form-label">Type Barang</label>
                                <select class="form-select" id="type" name="type" required>
                                    <option value="" selected disabled>Pilih Tipe Barang</option>
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                </select>
                        </div>
                        <!-- Harga Barang -->
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Barang</label>
                            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga', $barang->harga) }}" required>
                        </div>

                        <!-- Stok Barang -->
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stok Barang</label>
                            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $barang->stock) }}" required>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
