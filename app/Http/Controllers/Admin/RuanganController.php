<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\RuanganModel;
use App\Entity\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class RuanganController extends Controller
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
        $result = RuanganModel::getAll();
        $data['data'] = $result;
        return view('Admin/Ruangan/ruangan', $data);
    }

    // public function show($kode)
    // {
    //     $data['data_fakultas'] = FakultasModel::getById($kode);
    //     $data['data_progdi'] = ProgdiModel::getAll($kode);
    //     return view('Admin/Progdi/progdi', $data);
    // }

    public function add()
    {
        return view('Admin/Ruangan/tambah');
    }

    public function insert(Request $request)
    {
        $dt = new Ruangan(
            $request->input()['kode_ruangan'],
            $request->input()['kapasitas'],
            $request->input()['lokasi']
        );
        $result = RuanganModel::insert($dt);
        if($result){
            return redirect('/admin/ruangan')->with(['success' => $request->input()['kode_ruangan'].' berhasil ditambahkan']);
        }else{
            return redirect('/admin/ruangan')->with(['error' => 'Kode Ruangan sudah ada']);
        }
    }

    public function edit($kode)
    {
        $result = RuanganModel::getById($kode);
        $data['data'] = $result ;
        return view('Admin/Ruangan/edit', $data);
    }

    public function update(Request $request)
    {
        $dt = new Ruangan(
            $request->input()['kode_ruangan'],
            $request->input()['kapasitas'],
            $request->input()['lokasi']
        );
        $result = RuanganModel::updateData($dt);
        if($result){
            return redirect('/admin/ruangan')->with(['success' => $request->input()['kode_ruangan'].' berhasil diupdate']);
        }else{
            return redirect('/admin/ruangan')->with(['error' => 'Kode Ruangan tidak ditemukan']);
        }
    }

    public function delete($kode)
    {
        $result = RuanganModel::deleteData($kode);
        if($result){
            return redirect('/admin/ruangan')->with(['success' => $kode.' berhasil dihapus']);
        }else{
            return redirect('/admin/ruangan')->with(['error' => 'Kode Ruangan tidak ditemukan']);
        }
    }
}
