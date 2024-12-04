@extends('layout.layouts')

@section('content')
<div class="jumbotron text-center bg-primary  py-5">
    <div class="container">
        <h1 >Welcome to Barcelona store</h1>
        <p class="lead">Kelola pembelian dan pengguna dengan mudah dan efisien.</p>
        <a href="#" class="btn btn-light btn-lg mx-2">Kelola Pembelian</a>
        <a href="{{ route('user.index') }}" class="btn btn-outline-light btn-lg mx-2">Kelola Pengguna</a>
    </div>
</div>

{{-- <div class="container mt-5">
    <h2 class="text-center mb-4">Fitur Unggulan</h2>
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="bi bi-cart-fill fs-1 text-primary"></i>
                    <h5 class="card-title mt-3">Manajemen Pembelian</h5>
                    <p class="card-text">Tambahkan, ubah, atau hapus pembelian dengan mudah.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="bi bi-people-fill fs-1 text-success"></i>
                    <h5 class="card-title mt-3">Pengelolaan Pengguna</h5>
                    <p class="card-text">Atur pengguna dengan peran admin atau karyawan.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="bi bi-graph-up-arrow fs-1 text-danger"></i>
                    <h5 class="card-title mt-3">Laporan Transaksi</h5>
                    <p class="card-text">Dapatkan ringkasan transaksi untuk evaluasi.</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
