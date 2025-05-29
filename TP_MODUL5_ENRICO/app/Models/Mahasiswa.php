<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; 

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        // TODO: Tentukan kolom yang boleh diisi (nama, nim, jurusan, fakultas, foto_profil)
        'nama',
        'nim',
        'jurusan',
        'fakultas',
        'foto_profil',
    ];

    protected function fotoProfil(): Attribute
    {
        // TODO: Lengkapi return dari method ini sehingga menghasilkan url dan lokasi foto
        return Attribute::make(
            // isi disini
            get: fn ($value) => $value ? Storage::url($value) : null,
            set: fn ($value) => $value
        );
    }
}