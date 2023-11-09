@extends('layout.main')

@section('main')
    <div class="container">
        <h1 class="mb-3">Daftar Mahasiswa</h1>

        <div class="row mb-5">
            <div class="col-4">
                <div class="card container py-3 bg-warning">
                    <p class="card-title fs-4 fw-bold">Jumlah Mahasiswa</p>
                    <p class="card-text fs-3">{{ $mahasiswa_count }}</p>
                </div>
            </div>
            <div class="col-4">
                <div class="card container py-3 bg-primary">
                    <p class="card-title fs-4 fw-bold">Jumlah Mahasiswa Laki-Laki</p>
                    <p class="card-text fs-3">{{ $mahasiswa_laki }}</p>
                </div>
            </div>
            <div class="col-4">
                <div class="card container py-3 bg-success">
                    <p class="card-title fs-4 fw-bold">Jumlah Mahasiswa Perempuan</p>
                    <p class="card-text fs-3">{{ $mahasiswa_perempuan }}</p>
                </div>
            </div>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route("tambah_mahasiswa") }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Mahasiswa</a>  
        </div>

        <table id="tabel_mahasiswa" class="table">
            <thead>
                <tr>
                    <td>NIM</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>Tanggal Lahir</td>
                    <td>Gender</td>
                    <td>Usia</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $item)
                    <tr>
                        <td>{{ $item->NIM }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->tanggal_lahir }}</td>
                        <td>{{ ($item->gender == "L") ? "Laki-Laki" : "Perempuan" }}</td>
                        <td>{{ $item->usia }}</td>
                        <td class="d-flex">
                            <a href="{{ route('edit_mahasiswa', ["mahasiswa" => $item->id]) }}" class="btn btn-warning me-3"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('delete_mahasiswa', ['mahasiswa' => $item->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="alert('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script>
        $(document).ready( function () {
            $('#tabel_mahasiswa').DataTable({
                "columnDefs": [
                    { "searchable": true, "targets": 1 },
                    { "searchable": false, "targets": '_all' },
                ]
            });
        } );
    </script>
@endsection