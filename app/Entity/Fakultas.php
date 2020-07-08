<?php

namespace App\Entity ;

class Fakultas
{
    private $kode_fakultas;
    private $nama_fakultas;

    function __construct($kode_fakultas, $nama_fakultas)
    {
        $this->kode_fakultas = $kode_fakultas ;
        $this->nama_fakultas = $nama_fakultas ;
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
