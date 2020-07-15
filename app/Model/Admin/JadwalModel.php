<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helper\JadwalHelper;
use App\Helper\DosenHelper;

class JadwalModel extends Model
{
    public static function getAll($kode_k)
    {
        $result = JadwalHelper::selectAll();
        $data = [];
        foreach($result as $res){
            if($res->kode_kelas == $kode_k){
                $dt = [
                    'id_jadwal' => $res->id_jadwal,
                    'hari' => $res->hari,
                    'jam_masuk' => $res->jam_masuk,
                    'jam_keluar' => $res->jam_keluar,
                    'kode_ruangan' =>  $res->kode_ruangan
                ];
                array_push($data, $dt);
            }
        }
        return $data;
    }

    public static function getById($nim)
    {
        $result = JadwalHelper::selectById($nim);
        return $result;
    }

    public static function insert($data)
    {
        $check = JadwalHelper::selectAll();
        foreach($check as $ck){
            if($ck->hari == $data->hari){
                if($ck->kode_ruangan == $data->kode_ruangan){
                    if($ck->jam_masuk <= $data->jam_masuk && $ck->jam_keluar > $data->jam_masuk){
                        return false ;
                    }
                }
            }
        }
        $result = JadwalHelper::insert($data);
        return $result;
    }

    public static function updateData($data)
    {
        $result = JadwalHelper::update($data);
        return $result;
    }

    public static function deleteData($nim)
    {
        $result = JadwalHelper::delete($nim);
        return $result;
    }
}
