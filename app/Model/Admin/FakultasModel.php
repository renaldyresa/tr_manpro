<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helper\FakultasHelper;

class FakultasModel extends Model
{
    public static function getAll()
    {
        $result = FakultasHelper::selectAll();
        return $result;
    }

    public static function countAll()
    {
        $result = FakultasHelper::selectAll();
        return count($result);
    }

    public static function getById($nim)
    {
        $result = FakultasHelper::selectById($nim);
        return $result;
    }

    public static function insert($data)
    {
        $result = FakultasHelper::insert($data);
        return $result;
    }

    public static function updateData($data)
    {
        $result = FakultasHelper::update($data);
        return $result;
    }

    public static function deleteData($nim)
    {
        $result = FakultasHelper::delete($nim);
        return $result;
    }
}
