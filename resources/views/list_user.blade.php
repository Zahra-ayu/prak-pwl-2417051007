
<link rel="stylesheet" href="{{ asset('assets/css/list_user.css') }}">

@extends('layouts.app')

@section('content')
<div class="user-container">

    <div class="user-header">
        <h1>Daftar Pengguna</h1>
        <p>Data pengguna yang telah terdaftar dalam sistem</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="table-card">
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->nim }}</td>
                        <td>{{ $user->nama_kelas }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}"
                               class="btn-edit">
                                Edit
                            </a>

                            <form action="{{ route('user.destroy', $user->id) }}"
                                  method="POST"
                                  style="display: inline;"
                                  onsubmit="return confirm('Yakin ingin menghapus data pengguna ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-delete">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada data pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
