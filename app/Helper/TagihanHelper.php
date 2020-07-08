<?php

namespace App\Helper ;

use App\Entity\Tagihan;

class TagihanHelper
{
    private static $table = "Tagihan" ;

    public static function selectAll()
    {
        $path = app_path() . "/Database/".self::$table.".json";
        $json = json_decode(file_get_contents($path), true);
        $listdata = array();
        foreach($json as $dt){
            $data = new Tagihan(
                $dt['id_tagihan'],
                $dt['nim'],
                $dt['uang_kuliah'],
                $dt['denda'],
                $dt['spp'],
                $dt['layanan_kemahasiswaan'],
                $dt['batas_akhir_pembayaran'],
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

        if(array_key_exists($data->id_tagihan, $json)){
            return "data sudah ada";
        }else{
            $dt = [ 
                ['id_tagihan'] => $data->id_tagihan,
                ['nim'] => $data->nim,
                ['uang_kuliah'] => $data->uang_kuliah,
                ['denda'] => $data->denda,
                ['spp'] => $data->spp,
                ['layanan_kemahasiswaan'] => $data->layanan_kemahasiswaan,
                ['batas_akhir_pembayaran'] => $data->batas_akhir_pembayaran
            ];
            $obj = [$data->id_tagihan => $dt];
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
        if(array_key_exists($data->id_tagihan, $json)){
            $json[$data->id_tagihan] = [ 
                ['id_tagihan'] => $data->id_tagihan,
                ['nim'] => $data->nim,
                ['uang_kuliah'] => $data->uang_kuliah,
                ['denda'] => $data->denda,
                ['spp'] => $data->spp,
                ['layanan_kemahasiswaan'] => $data->layanan_kemahasiswaan,
                ['batas_akhir_pembayaran'] => $data->batas_akhir_pembayaran
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