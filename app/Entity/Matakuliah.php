<?php

namespace App\Entity ;

class Matakuliah
{
    private $kode_matkul;
    private $nama_matkul;
    private $jumlah_sks;
    private $jumlah_sks_bayar;

    function __construct($kode_matkul, $nama, $jumlah_sks, $jumlah_sks_bayar)
    {
        $this->kode_matkul = $kode_matkul ;
        $this->nama_matkul = $nama ;
        $this->jumlah_sks = $jumlah_sks ;
        $this->jumlah_sks_bayar = $jumlah_sks_bayar;
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
