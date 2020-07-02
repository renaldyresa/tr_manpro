<?php

namespace App\Entity ;

class Fakultas
{
    private $kode_fakultas;
    private $nama_fakulatas;

    function __construct($kode_fakultas, $nama_fakulatas)
    {
        $this->kode_fakultas = $kode_fakultas ;
        $this->nama_fakulatas = $nama_fakulatas ;
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
