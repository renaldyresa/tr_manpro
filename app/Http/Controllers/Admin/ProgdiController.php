<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\ProgdiModel;
use App\Entity\Progdi;
use Illuminate\Http\Request;

class ProgdiController extends Controller
{
    

    public function add($kode)
    {
        $data['kode_fakultas'] = $kode ;
        return view('Admin/Progdi/tambah', $data);
    }

    public function insert(Request $request)
    {
        $dt = new Progdi(
            $request->input()['kode'],
            $request->input()['nama'],
            $request->input()['kode_fakultas'],
        );
        $result = ProgdiModel::insert($dt);
        if($result){
            return redirect('/admin/fakultas/'.$request->input()['kode_fakultas'])->with(['success' => $request->input()['nama'].' berhasil ditambahkan']);
        }else{
            return redirect('/admin/fakultas/'.$request->input()['kode_fakultas'])->with(['error' => 'Kode Progdi sudah ada']);
        }
    }

    public function edit($kode)
    {
        $result = ProgdiModel::getById($kode);
        $data['data'] = $result ;
        return view('Admin/Progdi/edit', $data);
    }

    public function update(Request $request)
    {
        $dt = new Progdi(
            $request->input()['kode'],
            $request->input()['nama'],
            $request->input()['kode_fakultas'],
        );
        $result = ProgdiModel::updateData($dt);
        if($result){
            return redirect('/admin/fakultas/'.$request->input()['kode_fakultas'])->with(['success' => $request->input()['nama'].' berhasil diupdate']);
        }else{
            return redirect('/admin/fakultas/'.$request->input()['kode_fakultas'])->with(['error' => 'Kode Fakultas tidak ditemukan']);
        }
    }

    public function delete($kode_progdi, $kode_fakultas)
    {
        $result = ProgdiModel::deleteData($kode_progdi);
        if($result){
            return redirect('/admin/fakultas/'.$kode_fakultas)->with(['success' => $kode_progdi.' berhasil dihapus']);
        }else{
            return redirect('/admin/fakultas/'.$kode_fakultas)->with(['error' => 'Kode Progdi tidak ditemukan']);
        }
    }
}
