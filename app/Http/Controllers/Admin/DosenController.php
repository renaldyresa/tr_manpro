<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\DosenModel;
use App\Entity\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class DosenController extends Controller
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
        $result = DosenModel::getAll();
        $data['data'] = $result;
        return view('Admin/Dosen/dosen', $data);
    }

    // public function show($kode)
    // {
    //     $data['data_fakultas'] = FakultasModel::getById($kode);
    //     $data['data_progdi'] = ProgdiModel::getAll($kode);
    //     return view('Admin/Progdi/progdi', $data);
    // }

    public function add()
    {
        return view('Admin/Dosen/tambah');
    }

    public function insert(Request $request)
    {
        $dt = new Dosen(
            $request->input()['nip'],
            $request->input()['nama'],
            $request->input()['alamat'],
            $request->input()['email'],
            $request->input()['no_hp']
        );
        $result = DosenModel::insert($dt);
        if($result){
            return redirect('/admin/dosen')->with(['success' => $request->input()['nama'].' berhasil ditambahkan']);
        }else{
            return redirect('/admin/dosen')->with(['error' => 'NIP dosen sudah ada']);
        }
    }

    public function edit($kode)
    {
        $result = DosenModel::getById($kode);
        $data['data'] = $result ;
        return view('Admin/Dosen/edit', $data);
    }

    public function update(Request $request)
    {
        $dt = new Dosen(
            $request->input()['nip'],
            $request->input()['nama'],
            $request->input()['alamat'],
            $request->input()['email'],
            $request->input()['no_hp']
        );
        $result = DosenModel::updateData($dt);
        if($result){
            return redirect('/admin/dosen')->with(['success' => $request->input()['nama'].' berhasil diupdate']);
        }else{
            return redirect('/admin/dosen')->with(['error' => 'NIP tidak ditemukan']);
        }
    }

    public function delete($kode)
    {
        $result = DosenModel::deleteData($kode);
        if($result){
            return redirect('/admin/dosen')->with(['success' => $kode.' berhasil dihapus']);
        }else{
            return redirect('/admin/dosen')->with(['error' => 'NIP tidak ditemukan']);
        }
    }
}
