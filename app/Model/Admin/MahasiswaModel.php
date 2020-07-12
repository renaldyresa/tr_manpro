<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helper\MahasiswaHelper;
use App\Helper\ProgdiHelper;
use App\Entity\Mahasiswa;

class MahasiswaModel extends Model
{
    public static function getAll()
    {
        $result = MahasiswaHelper::selectAll();
        return $result;
    }

    public static function countAll()
    {
        $result = MahasiswaHelper::selectAll();
        return count($result);
    }

    public static function fetch_data_search($opsi, $value)
    {
        $result = MahasiswaHelper::selectAll();
        $data = array();
        $value = strtolower($value);
        for ($i = 0; $i< count($result) ; $i++){
            if($opsi == 'nim'){
                if(strpos(strtolower($result[$i]->nim), $value) !== false){
                    $item = [
                        'nim' => $result[$i]->nim,
                        'nama' => $result[$i]->nama,
                        'tanggal_lahir' => $result[$i]->tanggal_lahir,
                        'no_hp' => $result[$i]->no_hp,
                        'kode_progdi' => $result[$i]->kode_progdi 
                    ];
                    array_push($data, $item);
                }
            }else if($opsi == 'nama'){
                if(strpos(strtolower($result[$i]->nama), $value) !== false){
                    $item = [
                        'nim' => $result[$i]->nim,
                        'nama' => $result[$i]->nama,
                        'tanggal_lahir' => $result[$i]->tanggal_lahir,
                        'no_hp' => $result[$i]->no_hp,
                        'kode_progdi' => $result[$i]->kode_progdi 
                    ];
                    array_push($data, $item);
                }
            }
        }
        return $data;
    }

    public static function fetch_data($limit, $start)
    {
        $result = MahasiswaHelper::selectAll();
        $end = 0;
        $total = count($result);
        if($total > ($limit + $start)){
            $end = $limit + $start ;
        }else{
            $end = $total ;
        }
        $data = array();
        for ($i = $start; $i<$end ; $i++){
            $item = [
                'nim' => $result[$i]->nim,
                'nama' => $result[$i]->nama,
                'tanggal_lahir' => $result[$i]->tanggal_lahir,
                'no_hp' => $result[$i]->no_hp,
                'kode_progdi' => $result[$i]->kode_progdi 
            ];
            array_push($data, $item);
        }
        return $data;
    }

    public static function getById($nim)
    {
        $result = MahasiswaHelper::selectById($nim);
        return $result;
    }

    public static function getKodeFakultas($kode)
    {
        $result = ProgdiHelper::selectById($kode);
        return $result['kode_fakultas'];
    }

    public static function insert($data)
    {
        $result = MahasiswaHelper::insert($data);
        return $result;
    }

    public static function updateData($data)
    {
        $result = MahasiswaHelper::update($data);
        return $result;
    }

    public static function deleteData($nim)
    {
        $result = MahasiswaHelper::delete($nim);
        return $result;
    }
}
