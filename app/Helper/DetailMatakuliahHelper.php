<?php

namespace App\Helper ;

use App\Entity\DetailMatakuliah;

class DetailMatakuliahHelper
{
    private static $table = "DetailMatakuliah" ;

    public static function selectAll()
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        $listdata = array();
        foreach($json as $dt){
            $data = new DetailMatakuliah(
                $dt['kode_matkul'],
                $dt['kode_progdi'],
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
            return "data tidak ditemukan "; 
        }
            
    }

    public static function insert($data)
    { 
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);

        if(array_key_exists($data->detail_matkul, $json)){
            return "data sudah ada";
        }else{
            $dt = [ 
                ['kode_matkul'] => $data->kode_matkul,
                ['kode_progdi'] => $data->kode_progdi,
                ['detail_matkul'] => $data->detail_matkul
            ];
            $obj = [$data->detail_matkul => $dt];
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
        if(array_key_exists($data->detail_matkul, $json)){
            $json[$data->detail_matkul] = [ 
                ['kode_matkul'] => $data->kode_matkul,
                ['kode_progdi'] => $data->kode_progdi,
                ['detail_matkul'] => $data->detail_matkul
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