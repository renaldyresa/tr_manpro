<?php

namespace App\Helper ;

use App\Entity\Fakultas ;

class FakultasHelper
{
    private static $table = "Fakultas" ;

    public static function selectAll()
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        $listdata = array();
        foreach($json as $dt){
            $data = new Fakultas(
                $dt['kode_fakultas'],
                $dt['nama_fakultas'] 
            );
            array_push($listdata, $data);
        }
        return $listdata ;
    }

    public static function selectById($kode_fakultas)
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        if(array_key_exists($kode_fakultas, $json)){
            return $json[$kode_fakultas];
        }else{
            return "data tidak ditemukan "; 
        }
            
    }

    public static function insert($data)
    { 
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);

        if(array_key_exists($data->kode_fakultas, $json)){
            return "kode fakultas sudah ada";
        }else{
            $mhs = [ 
                'kode_fakultas' => $data->kode_fakultas,
                'nama_fakultas' => $data->nama_fakultas
            ];
            $obj = [$data->nim => $mhs];
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
        if(array_key_exists($data->kode_fakultas, $json)){
            $data = [ 
                'kode_fakultas' => $data->kode_fakultas,
                'nama_fakultas' => $data->nama_fakultas
            ] ;
            array_push($json, $data);
            $jsonData = json_encode($json);
            file_put_contents($path, $jsonData);
            return $data;
        }else{
            return "kode fakultas tidak ditemukan";
        }
    }

    public static function delete($kode_fakultas)
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        if(array_key_exists($kode_fakultas, $json)){
            unset($json[$kode_fakultas]);
            $jsonData = json_encode($json);
            file_put_contents($path, $jsonData);
            return True;
        }else{
            return "kode fakultas tidak ditemukan";
        }
    }

}