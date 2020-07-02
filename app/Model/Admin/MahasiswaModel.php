<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helper\MahasiswaHelper ;
use App\Entity\Mahasiswa ;

class MahasiswaModel extends Model
{
    public static function getAll(){
        $result = MahasiswaHelper::selectAll();
        return $result  ;
    }

    public static function getById($nim){
        $result = MahasiswaHelper::selectById($nim);
        return $result ;
    }

    public static function insert($data)
    {
        $result = MahasiswaHelper::insert($data);
        return $result ;
    }

    public static function updateData($data)
    {
        $result = MahasiswaHelper::update($data);
        return $result ;
    }

    public static function deleteData($nim)
    {
        $result = MahasiswaHelper::delete($nim);
        return $result ;
    }
}