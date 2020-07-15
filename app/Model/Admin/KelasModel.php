<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helper\KelasHelper;
use App\Helper\DosenHelper;

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
