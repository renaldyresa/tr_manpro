<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\FakultasModel;
use App\Model\Admin\ProgdiModel;
use App\Model\Admin\DetailMatkulModel;
use App\Entity\Dosen;
use App\Model\Admin\MatakuliahModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class DetailMatkulController extends Controller
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
        return view('Admin/DetailMatkul/fakultas', $data);
    }

    public function show($kode)
    {
        $data['data_fakultas'] = FakultasModel::getById($kode);
        $data['data_progdi'] = ProgdiModel::getAll($kode);
        return view('Admin/DetailMatkul/progdi', $data);
    }

    public function showMatkul($kode_f, $kode_p)
    {
        $data['data_fakultas'] = FakultasModel::getById($kode_f);
        $data['data_progdi'] = ProgdiModel::getById($kode_p);
        $data['data'] = DetailMatkulModel::getAll($kode_p);
        return view('Admin/DetailMatkul/detailmatkul', $data);
    }


    public function add($kode_f, $kode_p)
    {
        $result = MatakuliahModel::getAll();
        $data['kode_progdi'] = $kode_p ;
        $data['kode_fakultas'] = $kode_f ;
        $data['data'] = $result ;
        return view('Admin/DetailMatkul/tambahdetailmatkul', $data);
    }

    public function insert(Request $request)
    {
        $kode_fakultas = $request->input()['kode_fakultas'] ;
        $kode_progdi = $request->input()['kode_progdi'] ;
        $dt = [
            'kode_progdi' => $kode_progdi,
            'kode_matkul' => $request->input()['kode_matkul']
        ];
        
        $result = DetailMatkulModel::insert($dt);
        if($result){
            return redirect('/admin/detailmatkul/'.$kode_fakultas.'/'.$kode_progdi)->with(['success' => 'Matakuliah berhasil ditambahkan']);
        }else{
            return redirect('/admin/detailmatkul/'.$kode_fakultas.'/'.$kode_progdi)->with(['error' => 'Gagal tambah Matakuliah']);
        }
    }

    public function delete($kode_f, $kode_p, $kode_m)
    {
        $result = DetailMatkulModel::deleteData($kode_p.'-'.$kode_m);
        if($result){
            return redirect('/admin/detailmatkul/'.$kode_f.'/'.$kode_p)->with(['success' => $kode_m.' berhasil dihapus']);
        }else{
            return redirect('/admin/detailmatkul/'.$kode_f.'/'.$kode_p)->with(['error' => 'Data tidak ditemukan']);
        }
    }
}
