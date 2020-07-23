<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Entity\KST;
use App\Http\Controllers\Controller;
use App\Model\Admin\KelasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Model\Admin\DetailMatkulModel;
use App\Model\Mahasiswa\KstModel;

class RegistrasiMatakuliahController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Session::get("login") == false && empty(Session::get('login'))) {
                Redirect::to('mahasiswa/login')->send();
            }
            return $next($request);
        });
    }

    public function index($kode)
    {
        $data['data'] = DetailMatkulModel::getAll($kode);
        return view('Mahasiswa/Registrasi_matakuliah/registrasi_matakuliah', $data);
    }

    public function showKelas($kode_p, $kode_d)
    {
        $result = KelasModel::getAllWithJadwal(Session::get("nim"), $kode_d);
        if($result){
            $data['data'] = $result;
            $data['detail_matkul'] = $kode_d ;
            return view('Mahasiswa/Registrasi_Matakuliah/registrasi_kelas', $data);
        }else{
            return redirect('/mahasiswa/registrasi_matakuliah/'.Session::get("progdi"))->with(['error' => 'Kelas Sudah Diambil']);
        }
    }

    public function addKelas($nim, $kode)
    {
        $dt = new KST(
            "",
            "",
            "",
            "B",
            "",
            $kode,
            $nim
        );
        $result = KstModel::insert($dt);
        if($result){
            return redirect('/mahasiswa/registrasi_matakuliah/'.Session::get("progdi"))->with(['success' => $kode.' berhasil ditambahkan']);
        }else{
            return redirect('/mahasiswa/registrasi_matakuliah/'.Session::get("progdi"))->with(['error' => 'Gagal Ambil kelas '.$kode]);
        }
    }
}
