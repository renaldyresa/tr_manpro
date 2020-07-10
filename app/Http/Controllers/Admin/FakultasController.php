<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\FakultasModel;
use App\Model\Admin\ProgdiModel;
use App\Entity\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class FakultasController extends Controller
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
        $result = FakultasModel::getAll();
        $data['data'] = $result;
        return view('Admin/Fakultas/fakultas', $data);
    }

    public function show($kode)
    {
        $data['data_fakultas'] = FakultasModel::getById($kode);
        $data['data_progdi'] = ProgdiModel::getAll($kode);
        return view('Admin/Progdi/progdi', $data);
    }

    public function add()
    {
        return view('Admin/Fakultas/tambah');
    }

    public function insert(Request $request)
    {
        $dt = new Fakultas(
            $request->input()['kode'],
            $request->input()['nama']
        );
        $result = FakultasModel::insert($dt);
        if($result){
            return redirect('/admin/fakultas')->with(['success' => $request->input()['nama'].' berhasil ditambahkan']);
        }else{
            return redirect('/admin/fakultas')->with(['error' => 'Kode Fakultas sudah ada']);
        }
    }

    public function edit($kode)
    {
        $result = FakultasModel::getById($kode);
        $data['data'] = $result ;
        return view('Admin/Fakultas/edit', $data);
    }

    public function update(Request $request)
    {
        $dt = new Fakultas(
            $request->input()['kode'],
            $request->input()['nama']
        );
        $result = FakultasModel::updateData($dt);
        if($result){
            return redirect('/admin/fakultas')->with(['success' => $request->input()['nama'].' berhasil diupdate']);
        }else{
            return redirect('/admin/fakultas')->with(['error' => 'Kode Fakultas tidak ditemukan']);
        }
    }

    public function delete($kode)
    {
        $result = FakultasModel::deleteData($kode);
        if($result){
            return redirect('/admin/fakultas')->with(['success' => $kode.' berhasil dihapus']);
        }else{
            return redirect('/admin/fakultas')->with(['error' => 'Kode Fakultas tidak ditemukan']);
        }
    }
}
