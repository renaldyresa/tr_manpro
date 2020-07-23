<?php

namespace App\Helper;

use App\Entity\Progdi;

class ProgdiHelper
{
    private static $table = "Progdi";

    public static function countAll()
    {
        $path = app_path() . "/Database/" . self::$table . ".json";
        $json = json_decode(file_get_contents($path), true);
        return count($json);
    }

    public static function selectAll($kode)
    {
        $path = app_path() . "/Database/" . self::$table . ".json";
        $json = json_decode(file_get_contents($path), true);
        $listdata = array();
        if ($json != null) {
            foreach ($json as $dt) {
                if ($dt['kode_fakultas'] == $kode) {
                    $data = new Progdi(
                        $dt['kode_progdi'],
                        $dt['nama_progdi'],
                        $dt['kode_fakultas']
                    );
                    array_push($listdata, $data);
                }
            }
        }
        return $listdata;
    }

    public static function selectById($kode_progdi)
    {
        $path = app_path() . "/Database/" . self::$table . ".json";
        $json = json_decode(file_get_contents($path), true);
        if (array_key_exists($kode_progdi, $json)) {
            return $json[$kode_progdi];
        } else {
            return false;
        }
    }

    public static function insert($data)
    {
        $path = app_path() . "/Database/" . self::$table . ".json";
        $json = json_decode(file_get_contents($path), true);
        if (array_key_exists($data->kode_progdi, $json)) {
            return false;
        } else {
            $dt = [
                'kode_progdi' => $data->kode_progdi,
                'nama_progdi' => $data->nama_progdi,
                'kode_fakultas' => $data->kode_fakultas
            ];
            $obj = [$data->kode_progdi => $dt];
            $json = $json + $obj;
            $jsonData = json_encode($json);
            file_put_contents($path, $jsonData);
            return $data;
        }
    }

    public static function update($data)
    {
        $path = app_path() . "/Database/" . self::$table . ".json";
        $json = json_decode(file_get_contents($path), true);
        if (array_key_exists($data->kode_progdi, $json)) {
            $json[$data->kode_progdi] = [
                'kode_progdi' => $data->kode_progdi,
                'nama_progdi' => $data->nama_progdi,
                'kode_fakultas' => $data->kode_fakultas
            ];
            $jsonData = json_encode($json);
            file_put_contents($path, $jsonData);
            return $data;
        } else {
            return false;
        }
    }

    public static function delete($kode)
    {
        $path = app_path() . "/Database/" . self::$table . ".json";
        $json = json_decode(file_get_contents($path), true);
        if (array_key_exists($kode, $json)) {
            unset($json[$kode]);
            $jsonData = json_encode($json);
            file_put_contents($path, $jsonData);
            return True;
        } else {
            return false;
        }
    }
}
