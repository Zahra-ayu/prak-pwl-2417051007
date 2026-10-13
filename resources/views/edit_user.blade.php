
@extends('layouts.app')

@section('content')
<div class="form-container">
    <div class="form-header">
        <h1>Edit Data Pengguna</h1>
        <p>Perbarui informasi pengguna yang terdaftar</p>
    </div>

    <div class="form-card">
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama</label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama', $user->nama) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="npm">NPM</label>
                <input
                    type="text"
                    id="npm"
                    name="npm"
                    value="{{ old('npm', $user->nim) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="kelas_id">Kelas</label>
                <select name="kelas_id" id="kelas_id" required>
                    @foreach ($kelas as $kelasItem)
                        <option
                            value="{{ $kelasItem->id }}"
                            {{ old('kelas_id', $user->kelas_id) == $kelasItem->id ? 'selected' : '' }}
                        >
                            {{ $kelasItem->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="submit-button">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection
