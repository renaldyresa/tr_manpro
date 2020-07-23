<?php

namespace App\Helper ;

use App\Entity\KST;

class KSTHelper
{
    private static $table = "KST" ;

    public static function selectAll()
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        $listdata = array();
        foreach($json as $dt){
            $data = new KST(
                $dt['kode_kst'],
                $dt['tahun_ajaran'],
                $dt['semester'],
                $dt['status'],
                $dt['nilai'],
                $dt['kode_kelas'],
                $dt['nim']
            );
            array_push($listdata, $data);
        }
        return $listdata ;
    }

    public static function selectById($id)
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        if(array_key_exists($id, $json)){
            return $json[$id];
        }else{
            return "data tidak ditemukan "; 
        }
            
    }

    public static function insert($data)
    { 
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);

        if(array_key_exists($data->kode_kst, $json)){
            return "data sudah ada";
        }else{
            $dt = [ 
                ['kode_kst'] => $data->kode_kst,
                ['tahun_ajaran'] => $data->tahun_ajaran,
                ['semester'] => $data->semester,
                ['status'] => $data->status,
                ['nilai'] => $data->nilai,
                ['kode_kelas'] => $data->kode_kelas,
                ['nim'] => $data->nim
            ];
            $obj = [$data->kode_kst => $dt];
            $json = $json + $obj;
            var_dump($json);
            $jsonData = json_encode($json);
            file_put_contents($path, $jsonData);
            return $data;
        }
    }

    public static function update($data)
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        if(array_key_exists($data->kode_kst, $json)){
            $json[$data->kode_kst] = [ 
                ['kode_kst'] => $data->kode_kst,
                ['tahun_ajaran'] => $data->tahun_ajaran,
                ['semester'] => $data->semester,
                ['status'] => $data->status,
                ['nilai'] => $data->nilai,
                ['kode_kelas'] => $data->kode_kelas,
                ['nim'] => $data->nim
            ];
            $jsonData = json_encode($json);
            file_put_contents($path, $jsonData);
            return $data;
        }else{
            return "data tidak ditemukan";
        }
    }

    public static function delete($id)
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        if(array_key_exists($id, $json)){
            unset($json[$id]);
            $jsonData = json_encode($json);
            file_put_contents($path, $jsonData);
            return True;
        }else{
            return "data tidak ditemukan";
        }
    }

}