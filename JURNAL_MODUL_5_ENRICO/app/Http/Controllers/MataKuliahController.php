<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;
use App\Http\Resources\MatakuliahResource;
use Illuminate\Support\Facades\Validator;

class MatakuliahController extends Controller
{
    //TODO ( Praktikan Nomor Urut 5 )
    // Tambahkan fungsi index yang akan menampilkan List Data Matakuliah
    // dan fungsi show yang akan menampilkan Detail Data Mahasiswa yang dipilih
    public function index()
    {
        $data = MataKuliah::all();
        return new MatakuliahResource(true, 'List Data Mata Kuliah', $data);
    }

    public function show($id)
    {
        $data = MataKuliah::find($id);

        if (!$data) {
            return response()->json(['message' => 'Mata Kuliah tidak ditemukan'], 404);
        }

        return new MatakuliahResource(true, 'Detail Mata Kuliah', $data);
    }
    //TODO ( Praktikan Nomor Urut 6 )
    // Tambahkan fungsi store yang akan menyimpan data MataKuliah baruurn new MatakuliahResource(true, 'Data Matakuliah Berhasil Ditambahkan!', $matakuliah)
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'kode' => 'required|string|unique:mata_kuliahs,kode',
            'sks'  => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = MataKuliah::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'sks'  => $request->sks,
        ]);

        return new MatakuliahResource(true, 'Data Mata Kuliah Berhasil Ditambahkan!', $data);
    }
    //TODO ( Praktikan Nomor Urut 7 )
    // Tambahkan fungsi update yang mengubah data MataKuliah yang dipilih
    public function update(Request $request, $id)
    {
        $matakuliah = MataKuliah::find($id);

        if (!$matakuliah) {
            return response()->json(['message' => 'Mata Kuliah tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'kode' => 'required|string|unique:mata_kuliahs,kode,' . $id . ',id',
            'sks'  => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $matakuliah->update($request->only(['nama', 'kode', 'sks']));
        return new MatakuliahResource(true, 'Data Mata Kuliah Berhasil Diubah!', $matakuliah);
    }
    //TODO ( Praktikan Nomor Urut 8 )
    // Tambahkan fungsi destroy yang akan menghapus data MataKuliah yang dipilih
    public function destroy($id)
    {
        $data = MataKuliah::find($id);

        if (!$data) {
            return response()->json(['message' => 'Mata Kuliah tidak ditemukan'], 404);
        }

        $data->delete();

        return new MatakuliahResource(true, 'Data Mata Kuliah Berhasil Dihapus!', null);
    }
}