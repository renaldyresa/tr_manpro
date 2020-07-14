<?php

namespace App\Entity ;

class Ruangan
{
    private $kode_ruangan;
    private $kapasitas;
    private $lokasi;

    function __construct($kode_ruangan, $kapasitas, $lokasi)
    {
        $this->kode_ruangan = $kode_ruangan ;
        $this->kapasitas = $kapasitas ;
        $this->lokasi = $lokasi ;
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
