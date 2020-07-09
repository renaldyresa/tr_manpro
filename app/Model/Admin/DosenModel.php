<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helper\DosenHelper;

class DosenModel extends Model
{
    public static function getAll()
    {
        $result = DosenHelper::selectAll();
        return $result;
    }

    public static function getById($nip)
    {
        $result = DosenHelper::selectById($nip);
        return $result;
    }

    public static function insert($data)
    {
        $result = DosenHelper::insert($data);
        return $result;
    }

    public static function updateData($data)
    {
        $result = DosenHelper::update($data);
        return $result;
    }

    public static function deleteData($nim)
    {
        $result = DosenHelper::delete($nim);
        return $result;
    }
}
