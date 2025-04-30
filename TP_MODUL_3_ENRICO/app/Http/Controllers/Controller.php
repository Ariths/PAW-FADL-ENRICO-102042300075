<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class Controller
{
    public function index()
    {
        $mahasiswa = [
        'nama' => 'Rico',
        'nim' => '102042300075',
        'prodi' => 'Sistem Informasi',
        'email' => 'enricose@student.telkomuniversity.ac.id'
    ];

    return view('profil', ['mahasiswa' => $mahasiswa]);

    }
}