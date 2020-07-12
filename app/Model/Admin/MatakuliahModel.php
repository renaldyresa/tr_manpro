<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helper\MatakuliahHelper;

class MatakuliahModel extends Model
{
    public static function getAll()
    {
        $result = MatakuliahHelper::selectAll();
        return $result;
    }

    public static function getById($nip)
    {
        $result = MatakuliahHelper::selectById($nip);
        return $result;
    }

    public static function insert($data)
    {
        $result = MatakuliahHelper::insert($data);
        return $result;
    }

    public static function updateData($data)
    {
        $result = MatakuliahHelper::update($data);
        return $result;
    }

    public static function deleteData($nim)
    {
        $result = MatakuliahHelper::delete($nim);
        return $result;
    }
}
