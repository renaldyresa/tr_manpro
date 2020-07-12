<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Entity\Matakuliah;
use App\Model\Admin\MatakuliahModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class MatakuliahController extends Controller
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
        $result = MatakuliahModel::getAll();
        $data['data'] = $result;
        return view('Admin/Matakuliah/matakuliah', $data);
    }

    // public function show($kode)
    // {
    //     $data['data_fakultas'] = FakultasModel::getById($kode);
    //     $data['data_progdi'] = ProgdiModel::getAll($kode);
    //     return view('Admin/Progdi/progdi', $data);
    // }

    public function add()
    {
        return view('Admin/Matakuliah/tambah');
    }

    public function insert(Request $request)
    {
        $dt = new Matakuliah(
            $request->input()['kode_matkul'],
            $request->input()['nama_matkul'],
            $request->input()['jumlah_sks'],
            $request->input()['jumlah_sks_bayar']
        );
        $result = MatakuliahModel::insert($dt);
        if($result){
            return redirect('/admin/matakuliah')->with(['success' => $request->input()['nama_matkul'].' berhasil ditambahkan']);
        }else{
            return redirect('/admin/matakuliah')->with(['error' => 'Kode Matakuliah sudah ada']);
        }
    }

    public function edit($kode)
    {
        $result = MatakuliahModel::getById($kode);
        $data['data'] = $result ;
        return view('Admin/Matakuliah/edit', $data);
    }

    public function update(Request $request)
    {
        $dt = new Matakuliah(
            $request->input()['kode_matkul'],
            $request->input()['nama_matkul'],
            $request->input()['jumlah_sks'],
            $request->input()['jumlah_sks_bayar']
        );
        $result = MatakuliahModel::updateData($dt);
        if($result){
            return redirect('/admin/matakuliah')->with(['success' => $request->input()['nama_matkul'].' berhasil diupdate']);
        }else{
            return redirect('/admin/matakuliah')->with(['error' => 'Kode Matkul tidak ditemukan']);
        }
    }

    public function delete($kode)
    {
        $result = MatakuliahModel::deleteData($kode);
        if($result){
            return redirect('/admin/matakuliah')->with(['success' => $kode.' berhasil dihapus']);
        }else{
            return redirect('/admin/matakuliah')->with(['error' => 'Kode Matakuliah tidak ditemukan']);
        }
    }
}
