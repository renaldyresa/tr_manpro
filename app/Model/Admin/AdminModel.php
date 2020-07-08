<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helper\AdminHelper ;
use App\Entity\Mahasiswa ;

class AdminModel extends Model
{
    public static function getAll(){
        $result = AdminHelper::selectAll();
        return $result  ;
    }

    public static function getById($nim){
        $result = AdminHelper::selectById($nim);
        return $result ;
    }

    public static function insert($data)
    {
        $result = AdminHelper::insert($data);
        return $result ;
    }

    public static function updateData($data)
    {
        $result = AdminHelper::update($data);
        return $result ;
    }

    public static function deleteData($nim)
    {
        $result = AdminHelper::delete($nim);
        return $result ;
    }
}