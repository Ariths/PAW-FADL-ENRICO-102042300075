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
        $mahasiswa = Mahasiswa::all();
        return new MahasiswaResource(true, 'List Data Mahasiswa', $mahasiswa);
    }
    public function show($id){
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }

        return new MahasiswaResource(true, 'Detail Data Mahasiswa', $mahasiswa);
    }

    //TODO ( Praktikan Nomor Urut 2 )
    // Tambahkan fungsi store yang akan menyimpan data Mahasiswa baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required|string',
            'nim'      => 'required|string|unique:mahasiswas,nim',
            'jurusan'  => 'required|string',
            'fakultas' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $mahasiswa = Mahasiswa::create([
            'nama'     => $request->nama,
            'nim'      => $request->nim,
            'jurusan'  => $request->jurusan,
            'fakultas' => $request->fakultas,
        ]);

        return new MahasiswaResource(true, 'Data Mahasiswa Berhasil Ditambahkan!', $mahasiswa);
    }

    //TODO ( Praktikan Nomor Urut 3 )
    // Tambahkan fungsi update yang mengubah data Mahasiswa yang dipilih
    public function update(Request $request, $id)
    {
    $mahasiswa = Mahasiswa::find($id);
    if (!$mahasiswa) {
        return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
    }

    $validator = Validator::make($request->all(), [
        'nama' => 'required|string',
        'nim' => 'required|string|unique:mahasiswas,nim,'.$id,
        'jurusan' => 'required|string',
        'fakultas' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    $mahasiswa->update($request->only('nama', 'nim', 'jurusan', 'fakultas'));

    return response()->json([
        'success' => true,
        'message' => 'Data Mahasiswa Berhasil Diubah!',
        'data' => $mahasiswa,
    ]);
    }
    //TODO ( Praktikan Nomor Urut 4 )
    // Tambahkan fungsi destroy yang akan menghapus data Mahasiswa yang dipilih
    public function destroy($id)
    {
    $mahasiswa = Mahasiswa::find($id);
    if (!$mahasiswa) {
        return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
    }

    $mahasiswa->delete();

    return response()->json([
        'success' => true,
        'message' => 'Data Mahasiswa Berhasil Dihapus!',
    ]);
    }
    }