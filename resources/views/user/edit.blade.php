@extends('layout.layouts')

@section('content')
    <form action="{{ route('users.update', $user['id']) }}" method="post">
        @csrf
        @method('put')
        @if (Session::get('failed'))
            <div class="alert alert-danger">{{ (Session::get('failed')) }}</div>
        @endif
        <div class="form-group">
            <label for="name" class="form-label">Nama :</label>
            {{-- value menampilkan isi di input, isi di iniput ssuai dngan data yang diambil di controller $mediciner --}}
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            {{-- jika ada error yang berhubungan dengan field name, munculkan teks error disini --}}
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="role" class="form-label">Tipe Pengguna :</label>
            <select class="form-select" name="role" id="role">
                {{-- jika $medicine['type'] merupakan tablet ? tambah selected (opsi akan terpilih), jika tidak : tidak ditambahkan apapun --}}
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="karyawan" {{ $user->role == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
            </select>
            @error('role')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Ubah Email :</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>        
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Ubah Password :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password" name="password" >
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Ubah Data</button>
    </form>
@endsection