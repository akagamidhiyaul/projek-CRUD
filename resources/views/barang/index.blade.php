@extends('layout.layouts')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Daftar Barang</h1>
    {{-- <a href="#" class="btn btn-primary mb-3">Tambah Barang</a> --}}
    @if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Type</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->type }}</td>
                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->stock }}</td>
                <td>
                    <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('barang.delete', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>        
    </table>
</div>
@endsection
