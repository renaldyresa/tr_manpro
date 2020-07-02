<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\MahasiswaModel;
use App\Entity\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $result = MahasiswaModel::getAll();
        $data['data'] = $result;
        return view('admin/mahasiswa', $data);
    }

    public function show($nim)
    {
        $data = MahasiswaModel::getById($nim);
        var_dump($data);
        return view('admin/dashboard');
    }

    public function insert()
    {
        $mhs = new Mahasiswa(
            '6720170010',
            'Mahasiswa 10',
            '01/10/1999',
            '0823232323',
            '77'
        );
        $result = MahasiswaModel::insert($mhs);
        var_dump($result);
    }

    public function update()
    {
        $mhs = new Mahasiswa(
            '672017002',
            'berhasil update',
            '01/10/1999',
            '08232322',
            '67'
        );
        $result = MahasiswaModel::updateData($mhs);
        var_dump($result);
    }

    public function delete($nim)
    {
        $result = MahasiswaModel::deleteData($nim);
        var_dump($result);
    }
}
