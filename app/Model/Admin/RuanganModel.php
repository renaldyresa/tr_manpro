<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helper\RuanganHelper;

class RuanganModel extends Model
{
    public static function getAll()
    {
        $result = RuanganHelper::selectAll();
        return $result;
    }

    public static function getById($nip)
    {
        $result = RuanganHelper::selectById($nip);
        return $result;
    }

    public static function insert($data)
    {
        $result = RuanganHelper::insert($data);
        return $result;
    }

    public static function updateData($data)
    {
        $result = RuanganHelper::update($data);
        return $result;
    }

    public static function deleteData($nim)
    {
        $result = RuanganHelper::delete($nim);
        return $result;
    }
}
