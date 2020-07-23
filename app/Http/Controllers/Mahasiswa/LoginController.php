<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Model\Mahasiswa\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('Mahasiswa/login');
    }

    public function validator(Request $request)
    {
        $username = $request->input()['nim'];
        $password = $request->input()['password'];
        $data = MahasiswaModel::getById($username);
        if ($data) {
            if ($data['password'] == $password) {
                Session::put('nim',$data['nim']);
                Session::put('nama',$data['nama']);
                Session::put('progdi', $data['kode_progdi']);
                Session::put('login',TRUE);
                Session::save();
                return view('Mahasiswa/dashboard');
            } else {
                return redirect('/Mahaiswa/login')->with(['error' => 'Password Salah']);
            }
        } else {
            return redirect('/Mahasiswa/login')->with(['error' => 'Nim Tidak Ditemukan']);
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/mahasiswa/login');
    }
}
