<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helper\KelasHelper;
use App\Helper\DosenHelper;
use App\Helper\KSTHelper ;
use App\Model\Admin\JadwalModel;

class KelasModel extends Model
{
    public static function getAll($kode_d)
    {
        $result = KelasHelper::selectAll();
        $data = [];
        foreach ($result as $res) {
            if ($res->detail_matkul == $kode_d) {
                $dt = [
                    'kode_kelas' => $res->kode_kelas,
                    'kapasitas' => $res->kapasitas,
                    'nip' => $res->nip,
                    'nama' => DosenHelper::selectById($res->nip)['nama'],
                    'detail_matkul' => $res->detail_matkul
                ];
                array_push($data, $dt);
            }
        }
        return $data;
    }

    public static function getAllWithJadwal($nim, $kode_d)
    {
        $result = KelasHelper::selectAll();
        $dtkst = KSTHelper::selectAll();
        $dtkelas = [];
        foreach($dtkst as $kst){
            if($kst->nim == $nim){
                $dmatkul = KelasHelper::selectById($kst->kode_kelas) ;
                array_push($dtkelas, $dmatkul['detail_matkul']);
            }
        }
        $data = [];
        foreach ($result as $res) {
            if ($res->detail_matkul == $kode_d ) {
                if(in_array($kode_d, $dtkelas)){
                    return false ;
                }
                $dt = [
                    'kode_kelas' => $res->kode_kelas,
                    'kapasitas' => $res->kapasitas,
                    'nip' => $res->nip,
                    'nama' => DosenHelper::selectById($res->nip)['nama'],
                    'jadwal'=> JadwalModel::getAll($res->kode_kelas),
                    'detail_matkul' => $res->detail_matkul
                ];
                array_push($data, $dt);
            }
        }
        return $data;
    }

    public static function getById($id)
    {
        $result = KelasHelper::selectById($id);
        return $result;
    }

    public static function insert($data)
    {
        $result = KelasHelper::insert($data);
        return $result;
    }

    public static function updateData($data)
    {
        $result = KelasHelper::update($data);
        return $result;
    }

    public static function deleteData($nim)
    {
        $result = KelasHelper::delete($nim);
        return $result;
    }
}
