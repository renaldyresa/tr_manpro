<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helper\DetailMatkulHelper;
use App\Helper\DosenHelper;
use App\Helper\JadwalHelper;
use App\Helper\KelasHelper;
use App\Helper\MatakuliahHelper;
use App\Helper\ProgdiHelper;

class DetailMatkulModel extends Model
{
    public static function getAll($kode)
    {
        $result = DetailMatkulHelper::selectAll($kode);
        $res = array();
        foreach ($result as $r) {
            $dt = [
                'detail_matkul' => $r->detail_matkul,
                'kode_matkul' => $r->kode_matkul,
                'nama_matkul' => MatakuliahHelper::selectById($r->kode_matkul)['nama_matkul']
            ];
            array_push($res, $dt);
        }
        return $res;
    }

    public static function getDataPdf($kode_f)
    {
        $data_progdi = ProgdiHelper::selectAll($kode_f);
        $data = [];
        foreach($data_progdi as $dp) {
            $dt_maktul = DetailMatkulHelper::selectAll($dp->kode_progdi);
            $dt_kelas = [];
            foreach($dt_maktul as $dm){
                $kelas = KelasHelper::selectAllById($dm->detail_matkul) ;
                $matkul = MatakuliahHelper::selectById($dm->kode_matkul);
                foreach($kelas as $kls){
                    $jadwal = JadwalHelper::selectAllById( $kls->kode_kelas);
                    $dt_jadwal = [];
                    $dt_ruangan = [];
                    foreach($jadwal as $jad){
                        array_push($dt_jadwal, $jad->hari.', '.$jad->jam_masuk.' - '.$jad->jam_keluar );
                        array_push($dt_ruangan, $jad->kode_ruangan);
                    }
                    $item_kls = [
                        'kode_kelas' => $kls->kode_kelas,
                        'nama_matkul' => $matkul['nama_matkul'],
                        'dosen' => DosenHelper::selectById($kls->nip)['nama'],
                        'jadwal' => $dt_jadwal,
                        'ruangan' => $dt_ruangan
                    ];
                    array_push($dt_kelas, $item_kls);
                }
            }
            $item = [
                'kode_progdi' => $dp->kode_progdi,
                'nama_progdi' => $dp->nama_progdi,
                'data_kelas' => $dt_kelas
            ];
            array_push($data, $item);
        }
        return $data ;
    }

    public static function getById($id)
    {
        $result = DetailMatkulHelper::selectById($id);
        return $result;
    }

    public static function insert($data)
    {
        $result = DetailMatkulHelper::insert($data);
        return $result;
    }

    public static function updateData($data)
    {
        $result = DetailMatkulHelper::update($data);
        return $result;
    }

    public static function deleteData($kode)
    {
        $result = DetailMatkulHelper::delete($kode);
        return $result;
    }
}
