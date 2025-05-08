<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 1. tampilkan daftar semua pengguna
    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // 2. tampilkan form untuk tambah pengguna baru
    public function create() {
        return view('users.create');
    }

    // 3. simpan pengguna baru
    public function store(Request $request) {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
        ]);

        User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // 4. tampilkan form edit
    public function edit($id) {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // 5. update pengguna
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:20',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // 6. hapus pengguna
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}