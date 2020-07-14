<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helper\DetailMatkulHelper;
use App\Helper\MatakuliahHelper;

class DetailMatkulModel extends Model
{
    public static function getAll($kode)
    {
        $result = DetailMatkulHelper::selectAll($kode);
        $res = array();
        foreach($result as $r){
            $dt = [
                'detail_matkul' => $r->detail_matkul,
                'kode_matkul' => $r->kode_matkul,
                'nama_matkul' => MatakuliahHelper::selectById($r->kode_matkul)['nama_matkul']
            ];
            array_push($res, $dt);
        }
        return $res;
    }

    public static function getById($nip)
    {
        $result = DetailMatkulHelper::selectById($nip);
        return $result;
    }

    public static function insert($data)
    {
        $result = DetailMatkulHelper::insert($data);
        return $result;
    }

    public static function updateData($data)
    {
        $result = DetailMatkulHelper::update($data);
        return $result;
    }

    public static function deleteData($kode)
    {
        $result = DetailMatkulHelper::delete($kode);
        return $result;
    }
}
