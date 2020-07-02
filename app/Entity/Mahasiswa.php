<?php

namespace App\Entity ;

class Mahasiswa
{
    private $nim;
    private $nama;
    private $tanggal_lahir;
    private $no_hp;
    private $kode_progdi;

    function __construct($nim, $nama, $tanggal_lahir, $no_hp, $kode_progdi)
    {
        $this->nim = $nim ;
        $this->nama = $nama ;
        $this->tanggal_lahir = $tanggal_lahir ;
        $this->no_hp = $no_hp ;
        $this->kode_progdi = $kode_progdi ;
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
