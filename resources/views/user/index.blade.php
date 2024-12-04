@extends('layout.layouts')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .warna {
        background-color: #004D98; 
        color: white;
    }
</style>

<div>
    <h1 class="text-center mb-4">Daftar User</h1>
    {{-- <a href="#" class="btn btn-primary mb-3">Tambah Barang</a> --}}
    @if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
    <div class="d-flex justfy-conten-end">
        <div class="d-flex mb-3">
            <a href="{{ route('users.create') }}" class="btn btn-secondary">Tambah User</a>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark warna">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($users->isEmpty())

                <tr >
                    <td class="text-denger" colspan="6">Data Kosong</td>
                </tr>
            @else
            @foreach ($users as $index => $identity)
    <tr>
        <td>{{ ($users->currentPage() - 1) * $users->perPage() + ($index + 1) }}</td>
        <td>{{ $identity->name }}</td>
        <td>{{ $identity->email }}</td>
        <td>{{ $identity->role }}</td>
        <td class="d-flex">
            <a href="{{ route('users.edit', $identity->id) }}" class="btn btn-warning me-2">Edit</a>
            <form action="{{ route('users.delete', $identity->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" >Hapus</button>
            </form>
        </td>
    </tr>
@endforeach

            @endif
        </tbody>        
    </table>
</div>
@endsection
