<?php

namespace App\Entity ;

class Jadwal
{
    private $id_jadwal;
    private $hari;
    private $jam_masuk;
    private $jam_keluar;
    private $kode_kelas;
    private $kode_ruangan ;

    function __construct($id_jadwal, $hari, $jam_masuk, $jam_keluar, $kode_kelas, $kode_ruangan)
    {
        $this->id_jadwal = $id_jadwal ;
        $this->hari = $hari ;
        $this->jam_masuk = $jam_masuk ;
        $this->jam_keluar = $jam_keluar ;
        $this->kode_kelas = $kode_kelas ;
        $this->kode_ruangan = $kode_ruangan ;
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }
}
