<?php

namespace App\Model\Mahasiswa;

use Illuminate\Database\Eloquent\Model;
use App\Helper\KSTHelper ;
use App\Helper\KelasHelper ;
use App\Helper\DetailMatkulHelper ;
use App\Helper\MatakuliahHelper;

class KstModel extends Model
{
    public static function getAll($nim){
        $result = KSTHelper::selectAll();
        $data = [] ;
        foreach($result as $res){
            if($res->nim == $nim){
                $dataKelas = KelasHelper::selectById($res->kode_kelas);
                $dataDetailMatkul = DetailMatkulHelper::selectById($dataKelas['detail_matkul']);
                $dataMatkul = MatakuliahHelper::selectById($dataDetailMatkul['kode_matkul']);
                $item = [
                    'kode_kelas' => $res->kode_kelas,
                    'nama_matkul' => $dataMatkul['nama_matkul'],
                    'status' => $res->status,
                    'sks' => $dataMatkul['jumlah_sks']
                ];
                array_push($data, $item);
            }
        }
        return $data  ;
    }

    public static function getById($nim){
        $result = KSTHelper::selectById($nim);
        return $result ;
    }

    public static function insert($data)
    {
        $result = KSTHelper::selectAll();
        foreach($result as $res) {
            if($res->kode_kelas && $res->nim) {
                return false ;
            }
        }

        $result = KSTHelper::insert($data);
        return $result ;
    }

    public static function updateData($data)
    {
        $result = KSTHelper::update($data);
        return $result ;
    }

    public static function deleteData($nim)
    {
        $result = KSTHelper::delete($nim);
        return $result ;
    }
}