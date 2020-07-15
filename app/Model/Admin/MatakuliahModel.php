<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helper\MatakuliahHelper;

class MatakuliahModel extends Model
{
    public static function getAll()
    {
        $result = MatakuliahHelper::selectAll();
        return $result;
    }

    public static function auto($keyword)
    {
        $result = MatakuliahHelper::selectAll();
        $keyword = strtolower($keyword);
        $data = array();
        foreach($result as $res){
            if(strpos(strtolower($res->kode_matkul), $keyword) || strpos(strtolower($res->nama_matkul), $keyword)){
                $item = [
                    'kode_matkul' => $res->kode_matkul,
                    'nama_matkul' => $res->nama_matkul
                ];
                array_push($data, $item);
            }
        }
        return $data;
    }

    public static function getById($kode_matkul)
    {
        $result = MatakuliahHelper::selectById($kode_matkul);
        return $result;
    }

    public static function insert($data)
    {
        $result = MatakuliahHelper::insert($data);
        return $result;
    }

    public static function updateData($data)
    {
        $result = MatakuliahHelper::update($data);
        return $result;
    }

    public static function deleteData($nim)
    {
        $result = MatakuliahHelper::delete($nim);
        return $result;
    }
}
