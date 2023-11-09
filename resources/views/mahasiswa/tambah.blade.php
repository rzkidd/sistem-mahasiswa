@extends('layout.main')

@section('main')
    <div class="container">
        @if (session()->has('failed'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h2 class="mb-5">Tambah Data Mahasiswa</h2>

        <form action="{{ route('store_mahasiswa') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="NIM" class="form-label">NIM</label>
                <input type="text" class="form-control" id="NIM" name="NIM">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
            </div>
            <div class="mb-3">
                <div class="form-label">Gender</div>
                <input type="radio" class="form-radio" id="laki-laki" value="L" name="gender">
                <label for="laki-laki" class="form-label me-5">Laki-laki</label>
                <input type="radio" class="form-radio" id="perempuan" value="P" name="gender">
                <label for="perempuan" class="form-label">Perempuan</label>
            </div>
            <div class="mb-3">
                <label for="usia" class="form-label">Usia</label>
                <input type="number" class="form-control" id="usia" name="usia">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection