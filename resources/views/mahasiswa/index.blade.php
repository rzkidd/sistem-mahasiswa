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

        <table id="tabel_mahasiswa" class="table">
            <thead>
                <tr>
                    <td>NIM</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>Tanggal Lahir</td>
                    <td>Gender</td>
                    <td>Usia</td>
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