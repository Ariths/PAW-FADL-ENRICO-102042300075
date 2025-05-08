@extends('layouts.app')

@section('title', 'Daftar Pengguna')

@section('content')
    <form action="{{ route('users.create') }}" method="get" style="display:inline;">
        <button type="submit" style="padding: 8px 16px; font-size: 14px; border-radius: 5px; background-color: #4caf50; color: white; border: none; cursor: pointer; text-decoration: none; transition: background-color 0.3s ease;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" style="vertical-align: middle;" viewBox="0 0 16 16">
                <path d="M8 1a.5.5 0 01.5.5v6h6a.5.5 0 010 1h-6v6a.5.5 0 01-1 0v-6h-6a.5.5 0 010-1h6v-6A.5.5 0 018 1z"/>
            </svg>
            <span style="margin-left: 5px;">Tambah Pengguna</span>
        </button>
    </form>   
    <h2>Daftar Pengguna</h2>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th style="padding: 12px; text-align: left; background-color: #f4f6f9; color: #333; border-bottom: 1px solid #ddd;">No</th>
                <th style="padding: 12px; text-align: left; background-color: #f4f6f9; color: #333; border-bottom: 1px solid #ddd;">Nama</th>
                <th style="padding: 12px; text-align: left; background-color: #f4f6f9; color: #333; border-bottom: 1px solid #ddd;">Email</th>
                <th style="padding: 12px; text-align: left; background-color: #f4f6f9; color: #333; border-bottom: 1px solid #ddd;">Telepon</th>
                <th style="padding: 12px; text-align: left; background-color: #f4f6f9; color: #333; border-bottom: 1px solid #ddd;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr style="background-color: #fff; border-bottom: 1px solid #ddd;">
                <td style="padding: 12px;">{{ $loop->iteration }}</td>
                <td style="padding: 12px;">{{ $user->name }}</td>
                <td style="padding: 12px;">{{ $user->email }}</td>
                <td style="padding: 12px;">{{ $user->phone }}</td>
                <td style="padding: 12px;">
                    <a href="{{ route('users.edit', $user->id) }}" style="padding: 8px 16px; font-size: 14px; border-radius: 5px; background-color: #ffa500; color: white; border: none; cursor: pointer; text-decoration: none; transition: background-color 0.3s ease;">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" style="padding: 8px 16px; font-size: 14px; border-radius: 5px; background-color: #f44336; color: white; border: none; cursor: pointer; text-decoration: none; transition: background-color 0.3s ease;" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection