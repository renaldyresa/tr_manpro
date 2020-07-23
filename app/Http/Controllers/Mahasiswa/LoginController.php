<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Model\Mahasiswa\MahasiswaModel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('Mahasiswa/login');
    }

    public function validator(Request $request)
    {
        $username = $request->input()['username'];
        $password = $request->input()['password'];
        $data = MahasiswaModel::getById($username);
        if ($data) {
            if ($data['password'] == $password) {
                return view('Mahasiswa/home');
            } else {
                return redirect('/login')->with(['error' => 'Password Salah']);
            }
        } else {
            return redirect('/login')->with(['error' => 'Nim Tidak Ditemukan']);
        }
    }
}
