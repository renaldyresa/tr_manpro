<?php

namespace App\Helper ;

use App\Entity\Kelas;

class KelasHelper
{
    private static $table = "kelas" ;

    public static function selectAll()
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        $listdata = array();
        foreach($json as $dt){
            $data = new Kelas(
                $dt['kode_kelas'],
                $dt['kapasitas'],
                $dt['nip'],
                $dt['detail_matkul']
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
            return false; 
        }
            
    }

    public static function insert($data)
    { 
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);

        if(array_key_exists($data->kode_kelas, $json)){
            return false;
        }else{
            $dt = [ 
                'kode_kelas' => $data->kode_kelas,
                'kapasitas' => $data->kapasitas,
                'nip' => $data->nip,
                'detail_matkul' => $data->detail_matkul
            ];
            $obj = [$data->kode_kelas => $dt];
            $json = $json + $obj;
            $jsonData = json_encode($json);
            file_put_contents($path, $jsonData);
            return $data;
        }
    }

    public static function update($data)
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        if(array_key_exists($data->kode_kelas, $json)){
            $json[$data->kode_kelas] = [ 
                'kode_kelas' => $data->kode_kelas,
                'kapasitas' => $data->kapasitas,
                'detail_matkul' => $data->detail_matkul
            ];
            $jsonData = json_encode($json);
            file_put_contents($path, $jsonData);
            return $data;
        }else{
            return false;
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
            return false;
        }
    }

}