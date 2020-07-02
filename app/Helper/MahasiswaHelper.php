<?php

namespace App\Helper ;

use App\Entity\Mahasiswa ;
use ArrayObject;
use Exception;

class MahasiswaHelper
{
    private static $table = "Mahasiswa" ;

    public static function selectAll()
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        $listdata = array();
        foreach($json as $dt){
            $mahasiswa = new Mahasiswa(
                $dt['nim'],
                $dt['nama'],
                $dt['tanggal_lahir'],
                $dt['no_hp'],
                $dt['kode_progdi'] 
            );
            array_push($listdata, $mahasiswa);
        }
        return $listdata ;
    }

    public static function selectById($nim)
    {
        
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        if(array_key_exists($nim, $json)){
            return $json[$nim];
        }else{
            return "data tidak ditemukan "; 
        }
            
    }

    public static function insert($data)
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);

        if(array_key_exists($data->nim, $json)){
            return "nim sudah ada";
        }else{
            $mhs = [ 
                'nim' => $data->nim,
                'nama' => $data->nama,
                'tanggal_lahir' => $data->tanggal_lahir,
                'no_hp' => $data->no_hp,
                'kode_progdi' => $data->kode_progdi,
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
        var_dump($json);
        if(array_key_exists($data->nim, $json)){
            $json[$data->nim] = [ 
                'nim' => $data->nim,
                'nama' => $data->nama,
                'tanggal_lahir' => $data->tanggal_lahir,
                'no_hp' => $data->no_hp,
                'kode_progdi' => $data->kode_progdi,
            ] ;
            $jsonData = json_encode($json);
            file_put_contents($path, $jsonData);
            return $data;
        }else{
            return "nim tidak ditemukan " . $data->nim;
        }
    }

    public static function delete($nim)
    {
        $path = app_path() . "/Database/".self::$table.".json"; 
            $json = json_decode(file_get_contents($path), true);
            if(array_key_exists($nim, $json)){
                unset($json[$nim]);
                $jsonData = json_encode($json);
                file_put_contents($path, $jsonData);
                return True;
            }else{
                return "nim tidak ditemukan";
            }
    }

}