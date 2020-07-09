<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\MahasiswaModel;
use App\Entity\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Session::get("login") == false && empty(Session::get('login'))) {
                Redirect::to('admin/login')->send();
            }
            return $next($request);
        });
    }

    public function index()
    {
        $result = MahasiswaModel::getAll();
        $data['data'] = $result;
        return view('Admin/Mahasiswa/mahasiswa', $data);
    }

    public function show($nim)
    {
        $data = MahasiswaModel::getById($nim);
        return view('admin/dashboard');
    }

    public function add()
    {
        return view('Admin/Mahasiswa/tambah');
    }

    public function insert(Request $request)
    {
        $mhs = new Mahasiswa(
            $request->input()['nim'],
            $request->input()['nama'],
            $request->input()['tgl_lahir'],
            $request->input()['no_hp'],
            $request->input()['progdi']
        );
        $result = MahasiswaModel::insert($mhs);
        if($result){
            return redirect('/admin/mahasiswa')->with(['success' => 'Nim '.$request->input()['nim'].' berhasil ditambahkan']);
        }else{
            return redirect('/admin/mahasiswa')->with(['error' => 'Nim sudah ada']);
        }
    }

    public function edit($nim)
    {
        $result = MahasiswaModel::getById($nim);
        $data['data'] = $result ;
        return view('Admin/Mahasiswa/edit', $data);
    }

    public function update(Request $request)
    {
        $mhs = new Mahasiswa(
            $request->input()['nim'],
            $request->input()['nama'],
            $request->input()['tgl_lahir'],
            $request->input()['no_hp'],
            $request->input()['progdi']
        );
        $result = MahasiswaModel::updateData($mhs);
        if($result){
            return redirect('/admin/mahasiswa')->with(['success' => 'Nim '.$request->input()['nim'].' berhasil diupdate']);
        }else{
            return redirect('/admin/mahasiswa')->with(['error' => 'Nim tidak ditemukan']);
        }
    }

    public function delete($nim)
    {
        $result = MahasiswaModel::deleteData($nim);
        if($result){
            return redirect('/admin/mahasiswa')->with(['success' => 'Nim '.$nim.' berhasil dihapus']);
        }else{
            return redirect('/admin/mahasiswa')->with(['error' => 'Nim tidak ditemukan']);
        }
    }
}
