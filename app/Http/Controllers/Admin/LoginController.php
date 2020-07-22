<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('Admin/login');
    }

    public function validator(Request $request)
    {
        $username = $request->input()['username'];
        $password = $request->input()['password'];
        $data = AdminModel::getById($username);
        if ($data) {
            if ($data['password'] == $password) {
                Session::put('nip',$data['nip']);
                Session::put('nama',$data['nama']);
                Session::put('login',TRUE);
                Session::save();
                return redirect('admin/');
            } else {
                return redirect('/admin/login')->with(['error' => 'Password Salah']);
            }
        } else {
            return redirect('/admin/login')->with(['error' => 'Nip Tidak Ditemukan']);
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/admin/login');
    }
}
