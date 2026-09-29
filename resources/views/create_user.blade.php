@extends('layouts.app')
@section('content')

<div class="form-container">
    <div class="form-header">
        <h1>Buat Pengguna Baru</h1>
        <p>Tambahkan data pengguna baru ke dalam sistem</p>
    </div>

    <div class="form-card">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama">
            </div>

            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="text" id="npm" name="npm" placeholder="Masukkan NPM">
            </div>

            <div class="form-group">
                <label for="kelas_id">Kelas</label>

                <select name="kelas_id" id="kelas_id">
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}">
                            {{ $kelasItem->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="submit-button">
                Tambahkan Pengguna
            </button>
        </form>
    </div>
</div>
@endsection