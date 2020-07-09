<?php

namespace App\Helper ;

use App\Entity\Dosen;

class DosenHelper
{
    private static $table = "Dosen" ;

    public static function selectAll()
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        $listdata = array();
        foreach($json as $dt){
            $data = new Dosen(
                $dt['nip'],
                $dt['nama'],
                $dt['alamat'],
                $dt['email'],
                $dt['no_hp'],
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

        if(array_key_exists($data->nip, $json)){
            return false;
        }else{
            $dt = [ 
                'nip' => $data->nip,
                'nama' => $data->nama,
                'alamat' => $data->alamat,
                'email' => $data->email,
                'no_hp' => $data->no_hp,
                'password' => $data->nip
            ];
            $obj = [$data->nip => $dt];
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
        if(array_key_exists($data->nip, $json)){
            $json[$data->nip] = [ 
                'nip' => $data->nip,
                'nama' => $data->nama,
                'alamat' => $data->alamat,
                'email' => $data->email,
                'no_hp' => $data->no_hp,
                'password' => $json[$data->nip]['password']
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