<?php

namespace App\Entity ;

class Progdi
{
    private $kode_progdi;
    private $nama_progdi;
    private $kode_fakultas;

    function __construct($kode_progdi, $nama_progdi, $kode_fakultas)
    {
        $this->kode_progdi = $kode_progdi ;
        $this->nama_progdi = $nama_progdi ;
        $this->kode_fakultas = $kode_fakultas ;
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
