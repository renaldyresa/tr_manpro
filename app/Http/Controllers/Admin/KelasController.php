<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\KelasModel;
use App\Model\Admin\MatakuliahModel;
use App\Model\Admin\FakultasModel;
use App\Model\Admin\ProgdiModel;
use App\Model\Admin\DetailMatkulModel;
use App\Model\Admin\DosenModel;
use App\Entity\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class KelasController extends Controller
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

    public function index($kode_f, $kode_p, $kode_d)
    {
        $result = KelasModel::getAll($kode_d);
        $data['data_fakultas'] = FakultasModel::getById($kode_f); 
        $data['data_progdi'] = ProgdiModel::getById($kode_p); 
        $kode_m = DetailMatkulModel::getById($kode_d)['kode_matkul'];
        $data['data_matkul'] = MatakuliahModel::getById($kode_m);
        $data['data'] = $result;
        $data['detail_matkul'] = $kode_d ;
        return view('Admin/Kelas/kelas', $data);
    }

    // public function show($kode)
    // {
    //     $data['data_fakultas'] = FakultasModel::getById($kode);
    //     $data['data_progdi'] = ProgdiModel::getAll($kode);
    //     return view('Admin/Progdi/progdi', $data);
    // }

    public function add($kode_f, $kode_p, $kode_d)
    {
        $data['detail_matkul'] = $kode_d ;
        $data['kode_fakultas'] = $kode_f ;
        $data['kode_progdi'] = $kode_p ;
        $data['data_dosen'] = DosenModel::getAll();
        return view('Admin/Kelas/tambah', $data);
    }

    public function insert(Request $request)
    {
        $kode_f = $request->input()['kode_fakultas'];
        $kode_p = $request->input()['kode_progdi'];
        $kode_d = $request->input()['detail_matkul'];
        $dt = new Kelas(
            $request->input()['kode_kelas'],
            $request->input()['kapasitas'],
            $request->input()['nip'],
            $kode_d
        );
        $result = KelasModel::insert($dt);
        if($result){
            return redirect('/admin/detailmatkul/'.$kode_f.'/'.$kode_p.'/'.$kode_d)->with(['success' => $request->input()['kode_kelas'].' berhasil ditambahkan']);
        }else{
            return redirect('/admin/detailmatkul/'.$kode_f.'/'.$kode_p.'/'.$kode_d)->with(['error' => 'Kode Kelas '.$request->input()['kode_kelas'].' sudah ada']);
        }
    }

    // public function edit($kode)
    // {
    //     $result = DosenModel::getById($kode);
    //     $data['data'] = $result ;
    //     return view('Admin/Dosen/edit', $data);
    // }

    // public function update(Request $request)
    // {
    //     $dt = new Dosen(
    //         $request->input()['nip'],
    //         $request->input()['nama'],
    //         $request->input()['alamat'],
    //         $request->input()['email'],
    //         $request->input()['no_hp']
    //     );
    //     $result = DosenModel::updateData($dt);
    //     if($result){
    //         return redirect('/admin/dosen')->with(['success' => $request->input()['nama'].' berhasil diupdate']);
    //     }else{
    //         return redirect('/admin/dosen')->with(['error' => 'NIP tidak ditemukan']);
    //     }
    // }

    public function delete($kode_f, $kode_p, $kode_d, $kode_k)
    {
        $result = KelasModel::deleteData($kode_k);
        if($result){
            return redirect('/admin/detailmatkul/'.$kode_f.'/'.$kode_p.'/'.$kode_d)->with(['success' => $kode_k.' berhasil Dihapus']);
        }else{
            return redirect('/admin/detailmatkul/'.$kode_f.'/'.$kode_p.'/'.$kode_d)->with(['error' => $kode_k." Gagal hapus Kelas "]);
        }
    }
}
