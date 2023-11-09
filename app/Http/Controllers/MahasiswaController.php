<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::orderBy("NIM","desc")->get(); //ambil semua mahasiswa
        $mahasiswa_count = $mahasiswa->count(); //mengambil jumlah mahasiswa
        $mahasiswa_laki = count(array_filter($mahasiswa->toArray(), function ($mahasiswa) {return $mahasiswa["gender"] == "L";})); // jumlah mahasiswa laki-laki
        $mahasiswa_perempuan = count(array_filter($mahasiswa->toArray(), function ($mahasiswa) {return $mahasiswa["gender"] == "P";})); // jumlah mahasiswa perempuan

        return view("mahasiswa.index", [
            "mahasiswa"=> $mahasiswa,
            "mahasiswa_count"=> $mahasiswa_count,
            "mahasiswa_laki"=> $mahasiswa_laki,
            "mahasiswa_perempuan"=> $mahasiswa_perempuan,
        ]);
    }

    /**
     * Display a listing of the resource (Admin).
     */
    public function admin_index()
    {
        $mahasiswa = Mahasiswa::orderBy("NIM","desc")->get();
        $mahasiswa_count = $mahasiswa->count();
        $mahasiswa_laki = count(array_filter($mahasiswa->toArray(), function ($mahasiswa) {return $mahasiswa["gender"] == "L";}));
        $mahasiswa_perempuan = count(array_filter($mahasiswa->toArray(), function ($mahasiswa) {return $mahasiswa["gender"] == "P";}));
        return view("mahasiswa.admin", [
            "mahasiswa"=> $mahasiswa,
            "mahasiswa_count"=> $mahasiswa_count,
            "mahasiswa_laki"=> $mahasiswa_laki,
            "mahasiswa_perempuan"=> $mahasiswa_perempuan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("mahasiswa.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input
        $new_mahasiswa = $this->validate($request, [
            "NIM"=> "required",
            "nama"=> "required",
            "alamat"=> "required",
            "tanggal_lahir"=> "required|date",
            "gender"=> "required",
            "usia"=> "required",
        ]);

        // jika NIM sudah terdaftar, tambah data gagal
        if (Mahasiswa::where("NIM", $new_mahasiswa['NIM'])->count() > 0) {
            return back()->with("failed","Mahasiswa dengan NIM tersebut sudah terdaftar.");
        }

        // menyimpan data mahasiswa
        Mahasiswa::create($new_mahasiswa);

        return redirect()->route("admin")->with("success","Mahasiswa berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view("mahasiswa.edit", [
            "mahasiswa"=> $mahasiswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // validasi input
        $new_mahasiswa = $this->validate($request, [
            "NIM"=> "required",
            "nama"=> "required",
            "alamat"=> "required",
            "tanggal_lahir"=> "required|date",
            "gender"=> "required",
            "usia"=> "required",
        ]);

        // menyimpan perubahan data
        $mahasiswa->update($new_mahasiswa);

        return redirect()->route("admin")->with("success","Data mahasiswa berhasil diupdate.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route("admin")->with("success","Data mahasiswa berhasil dihapus.");
    }
}
