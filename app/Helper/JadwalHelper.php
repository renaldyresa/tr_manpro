<?php

namespace App\Helper ;

use App\Entity\Jadwal;

class JadwalHelper
{
    private static $table = "Jadwal" ;

    public static function selectAll()
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        $listdata = array();
        foreach($json as $dt){
            $data = new Jadwal(
                $dt['id_jadwal'],
                $dt['hari'],
                $dt['jam_masuk'],
                $dt['jam_keluar'],
                $dt['kode_kelas'],
                $dt['kode_ruangan']
            );
            array_push($listdata, $data);
        }
        return $listdata ;
    }

    public static function selectAllById($kode)
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        $listdata = array();
        foreach($json as $dt){
            if($dt['kode_kelas'] == $kode){
                $data = new Jadwal(
                    $dt['id_jadwal'],
                    $dt['hari'],
                    $dt['jam_masuk'],
                    $dt['jam_keluar'],
                    $dt['kode_kelas'],
                    $dt['kode_ruangan']
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
        $dt = [ 
            'id_jadwal' => $autoJson['jadwal'],
            'hari' => $data->hari,
            'jam_masuk' => $data->jam_masuk,
            'jam_keluar' => $data->jam_keluar,
            'kode_kelas' => $data->kode_kelas,
            'kode_ruangan' => $data->kode_ruangan
        ];
        $obj = [$autoJson['jadwal'] => $dt];
        $json = $json + $obj;
        $jsonData = json_encode($json);
        file_put_contents($path, $jsonData);
        $autoJson['jadwal'] = (int)$autoJson['jadwal'] + 1 ;
        $jsonDataAuto = json_encode($autoJson);
        file_put_contents(app_path() . "/Database/Auto.json", $jsonDataAuto);
        return $data;
    }

    public static function update($data)
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        if(array_key_exists($data->id_jadwal, $json)){
            $json[$data->id_jadwal] = [ 
                ['id_jadwal'] => $data->id_jadwal,
                ['hari'] => $data->hari,
                ['jam_masuk'] => $data->jam_masuk,
                ['jam_keluar'] => $data->jam_keluar,
                ['kode_kelas'] => $data->kode_kelas,
                ['kode_ruangan'] => $data->kode_ruangan
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