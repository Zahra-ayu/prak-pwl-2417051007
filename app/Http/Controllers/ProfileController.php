<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $data = [
            'nama' => 'Zahra Ayu Azizah',
            'NPM' => '2417051007',
            'kelas' => 'Ilmu Komputer - A',
        ];
        return view('profile',$data);
    }
}