<?php

namespace App\Entity ;

class Matakuliah
{
    private $kode_matkul;
    private $nama;
    private $jumlah_sks;

    function __construct($kode_matkul, $nama, $jumlah_sks)
    {
        $this->kode_matkul = $kode_matkul ;
        $this->nama = $nama ;
        $this->jumlah_sks = $jumlah_sks ;
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
