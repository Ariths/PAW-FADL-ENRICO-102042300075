<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Http\Resources\MahasiswaResource;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    //TODO ( Praktikan Nomor Urut 1 )
    // Tambahkan fungsi index yang akan menampilkan List Data Mahasiswa
    // dan fungsi show yang akan menampilkan Detail Data Mahasiswa yang dipilih
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return MahasiswaResource::collection($mahasiswas);
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return new MahasiswaResource($mahasiswa);
    }
    //TODO ( Praktikan Nomor Urut 2 )
    // Tambahkan fungsi store yang akan menyimpan data Mahasiswa baru
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nama' => 'required|string',
        'nim' => 'required|string|unique:mahasiswas,nim',
        'jurusan' => 'required|string',
        'fakultas' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    $mahasiswa = Mahasiswa::create($request->all());

    return new MahasiswaResource(true, 'Data berhasil diambil', $mahasiswa);
    }
    //TODO ( Praktikan Nomor Urut 3 )
    // Tambahkan fungsi update yang mengubah data Mahasiswa yang dipilih
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'string',
            'nim' => 'string|unique:mahasiswas,nim,' . $id . ',id',
            'jurusan' => 'string',
            'fakultas' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $mahasiswa->update($request->all());
        return new MahasiswaResource(true, 'Data berhasil diupdate', $mahasiswa);
    }
    //TODO ( Praktikan Nomor Urut 4 )
    // Tambahkan fungsi destroy yang akan menghapus data Mahasiswa yang dipilih
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $mahasiswa->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}

