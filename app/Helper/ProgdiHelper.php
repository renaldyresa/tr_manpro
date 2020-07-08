<?php

namespace App\Helper ;

use App\Entity\Fakultas ;

class ProgdiHelper
{
    private static $table = "Fakultas" ;

    public static function selectAll()
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        $listdata = array();
        foreach($json as $dt){
            $data = new Fakultas(
                $dt['kode_progdi'],
                $dt['nama_progdi'],
                $dt['kode_fakultas'] 
            );
            array_push($listdata, $data);
        }
        return $listdata ;
    }

    public static function selectById($kode_progdi)
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        if(array_key_exists($kode_progdi, $json)){
            return $json[$kode_progdi];
        }else{
            return "data tidak ditemukan "; 
        }
            
    }

    public static function insert($data)
    { 
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);

        if(array_key_exists($data->kode_fakultas, $json)){
            return "data sudah ada";
        }else{
            $dt = [ 
                'kode_progdi' => $data->kode_progdi,
                'nama_progdi' => $data->nama_progdi,
                'kode_fakultas' => $data->kode_fakultas
            ];
            $obj = [$data->nim => $dt];
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
        if(array_key_exists($data->kode_progdi, $json)){
            $json[$data->kode_progdi] = [ 
                'kode_progdi' => $data->kode_progdi,
                'nama_progdi' => $data->nama_progdi,
                'kode_fakultas' => $data->kode_fakultas
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