<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helper\ProgdiHelper;

class ProgdiModel extends Model
{
    public static function getAll($kode)
    {
        $result = ProgdiHelper::selectAll($kode);
        return $result;
    }

    public static function getById($kode)
    {
        $result = ProgdiHelper::selectById($kode);
        return $result;
    }

    public static function insert($data)
    {
        $result = ProgdiHelper::insert($data);
        return $result;
    }

    public static function updateData($data)
    {
        $result = ProgdiHelper::update($data);
        return $result;
    }

    public static function deleteData($kode)
    {
        $result = ProgdiHelper::delete($kode);
        return $result;
    }
}
