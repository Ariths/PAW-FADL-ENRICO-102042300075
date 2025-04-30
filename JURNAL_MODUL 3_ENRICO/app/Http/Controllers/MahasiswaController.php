<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        // ==================2==================
        // - Buat object mahasiswa dengan data dummy (nama, nim, email, jurusan, fakultas, foto)
        // - Kirim object tersebut ke view 'profil'
        $mahasiswa = [
        $nama = "Rico",
        $nim = 102042300075,
        $email = "rico@gmail.com",
        $jurusan = "Sistem Informasi",
        $fakultas = "FRI",
        ];

        return view('profil', compact('nama', 'nim', 'email', 'jurusan', 'fakultas'));
    }
}
