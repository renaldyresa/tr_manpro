<?php

namespace App\Helper ;

use App\Entity\DetailMatakuliah;

class DetailMatkulHelper
{
    private static $table = "DetailMatakuliah" ;

    public static function selectAll($kode)
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        $listdata = array();
        foreach($json as $dt){
            if($dt['kode_progdi'] == $kode){
                $data = new DetailMatakuliah(
                    $dt['detail_matkul'],
                    $dt['kode_matkul'],
                    $dt['kode_progdi']
                );
                array_push($listdata, $data);
            }
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
        $autoJson = json_decode(file_get_contents(app_path() . "/Database/Auto.json"), true);
        foreach($json as $dt){
            if($dt['kode_matkul'] == $data['kode_matkul'] && $dt['kode_progdi'] == $data['kode_progdi']){
                return false ;
            }
        }
        $dt = [ 
            'detail_matkul' => $autoJson['detailmatkul'],
            'kode_matkul' => $data['kode_matkul'],
            'kode_progdi' => $data['kode_progdi']
        ];
        $obj = [$autoJson['detailmatkul'] => $dt];
        $json = $json + $obj;
        $jsonData = json_encode($json);
        file_put_contents($path, $jsonData);
        $autoJson['detailmatkul'] = (int)$autoJson['detailmatkul'] + 1 ;
        $jsonDataAuto = json_encode($autoJson);
        file_put_contents(app_path() . "/Database/Auto.json", $jsonDataAuto);
        return $data;
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