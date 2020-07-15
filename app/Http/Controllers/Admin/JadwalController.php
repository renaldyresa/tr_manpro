<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\JadwalModel;
use App\Model\Admin\FakultasModel;
use App\Model\Admin\ProgdiModel;
use App\Model\Admin\DetailMatkulModel;
use App\Model\Admin\MatakuliahModel;
use App\Model\Admin\KelasModel;
use App\Entity\Jadwal;
use App\Model\Admin\DosenModel;
use App\Model\Admin\RuanganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class JadwalController extends Controller
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

    public function index($kode_f, $kode_p, $kode_d, $kode_k)
    {
        $data['data_fakultas'] = FakultasModel::getById($kode_f); 
        $data['data_progdi'] = ProgdiModel::getById($kode_p); 
        $kode_m = DetailMatkulModel::getById($kode_d)['kode_matkul'];
        $data['data_matkul'] = MatakuliahModel::getById($kode_m);
        $data['data_kelas'] = KelasModel::getById($kode_k);
        $data['detail_matkul'] = $kode_d ;
        $result = JadwalModel::getAll($kode_k);
        $data['data'] = $result;
        return view('Admin/Jadwal/jadwal', $data);
    }

    // public function show($kode)
    // {
    //     $data['data_fakultas'] = FakultasModel::getById($kode);
    //     $data['data_progdi'] = ProgdiModel::getAll($kode);
    //     return view('Admin/Progdi/progdi', $data);
    // }

    public function add($kode_f, $kode_p, $kode_d, $kode_k)
    {
        $data['detail_matkul'] = $kode_d ;
        $data['kode_fakultas'] = $kode_f ;
        $data['kode_progdi'] = $kode_p ;
        $data['kode_kelas'] = $kode_k ;
        $data['data_ruangan'] = RuanganModel::getAll();
        return view('Admin/Jadwal/tambah', $data);
    }

    public function insert(Request $request)
    {
        $kode_f = $request->input()['kode_fakultas'];
        $kode_p = $request->input()['kode_progdi'];
        $kode_d = $request->input()['detail_matkul'];
        $kode_k = $request->input()['kode_kelas'];
        $dt = new Jadwal(
            "",
            $request->input()['hari'],
            $request->input()['jam_masuk'],
            $request->input()['jam_keluar'],
            $kode_k,
            $request->input()['kode_ruangan']
        );
        $result = JadwalModel::insert($dt);
        if($result){
            return redirect('/admin/detailmatkul/'.$kode_f.'/'.$kode_p.'/'.$kode_d.'/'.$kode_k)->with(['success' => $request->input()['kode_kelas'].' berhasil tambah jadwal']);
        }else{
            return redirect('/admin/detailmatkul/'.$kode_f.'/'.$kode_p.'/'.$kode_d.'/'.$kode_k)->with(['error' => "Gagal Tambah Jadwal, Jadwal Bentrok"]);
        }
    }

    public function delete($kode_f, $kode_p, $kode_d, $kode_k, $kode_j)
    {
        $result = JadwalModel::deleteData($kode_j);
        if($result){
            return redirect('/admin/detailmatkul/'.$kode_f.'/'.$kode_p.'/'.$kode_d.'/'.$kode_k)->with(['success' => 'Jadwal berhasil Dihapus']);
        }else{
            return redirect('/admin/detailmatkul/'.$kode_f.'/'.$kode_p.'/'.$kode_d.'/'.$kode_k)->with(['error' => "Jadwal Gagal hapus Kelas "]);
        }
    }

}
