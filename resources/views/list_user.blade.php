<link rel="stylesheet" href="{{ asset('assets/css/list_user.css') }}">

@extends('layouts.app') 
@section('content')

<div class="user-container">

    <div class="user-header">
        <h1>Daftar Pengguna</h1>
        <p>Data pengguna yang telah terdaftar dalam sistem</p>
    </div>

    <div class="table-card">
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Kelas</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->nim }}</td>
                        <td>{{ $user->nama_kelas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection