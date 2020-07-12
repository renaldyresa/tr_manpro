<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\MahasiswaModel;
use App\Model\Admin\FakultasModel;
use App\Model\Admin\ProgdiModel;
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

    public function getProgdi($kode){
        $output = ProgdiModel::getAll($kode);
        $data = array();
        foreach($output as $out){
            array_push($data, 
                [
                    'nama' => $out->nama_progdi,
                    'kode' => $out->kode_progdi
                ] 
            );
        }
        echo json_encode($data);
    }

    public function search(Request $request)
	{
		$opsi = $request->input()['opsi'] ;
        $value = $request->input()['text'] ;
		$output = array(
			'data_table' => MahasiswaModel::fetch_data_search($opsi, $value)
		);
		echo json_encode($output);
	}

    public function pagination($page)
	{
		$config = array();
		$config["total_rows"] = MahasiswaModel::countAll();
		$config["per_page"] = 10;
		$start = ($page - 1) * $config["per_page"];
		$output = array(
			'count_link' => ceil($config["total_rows"]/$config["per_page"]),
			'data_table' => MahasiswaModel::fetch_data($config["per_page"], $start)
		);
		echo json_encode($output);
	}

    public function add()
    {
        $result = FakultasModel::getAll();
        $data['data'] = $result;
        return view('Admin/Mahasiswa/tambah', $data);
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
