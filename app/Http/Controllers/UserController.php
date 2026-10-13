<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function create()
    {
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'nim' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        return redirect('/user')->with('success', 'Data pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = $this->userModel->findOrFail($id);
        $kelas = $this->kelasModel->getKelas();

        return view('edit_user', [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = $this->userModel->findOrFail($id);

        $user->update([
            'nama' => $request->input('nama'),
            'nim' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        return redirect('/user')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = $this->userModel->findOrFail($id);
        $user->delete();

        return redirect('/user')->with('success', 'Data pengguna berhasil dihapus.');
    }
}
