<?php

namespace App\Helper ;

use App\Entity\Matakuliah;

class MatakuliahHelper
{
    private static $table = "Matakuliah" ;

    public static function selectAll()
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        $listdata = array();
        foreach($json as $dt){
            $data = new Matakuliah(
                $dt['kode_matkul'],
                $dt['nama_matkul'],
                $dt['jumlah_sks'],
                $dt['jumlah_sks_bayar']
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

        if(array_key_exists($data->kode_matkul, $json)){
            return false;
        }else{
            $dt = [ 
                'kode_matkul' => $data->kode_matkul,
                'nama_matkul' => $data->nama_matkul,
                'jumlah_sks' => $data->jumlah_sks,
                'jumlah_sks_bayar' => $data->jumlah_sks_bayar
            ];
            $obj = [$data->kode_matkul => $dt];
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
        if(array_key_exists($data->kode_matkul, $json)){
            $json[$data->kode_matkul] = [ 
                'kode_matkul' => $data->kode_matkul,
                'nama_matkul' => $data->nama_matkul,
                'jumlah_sks' => $data->jumlah_sks,
                'jumlah_sks_bayar' => $data->jumlah_sks_bayar
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