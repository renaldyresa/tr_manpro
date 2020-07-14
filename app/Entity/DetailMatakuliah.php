<?php

namespace App\Entity ;

class DetailMatakuliah
{
    private $kode_matkul;
    private $kode_progdi;
    private $detail_matkul;

    function __construct( $detail_matkul, $kode_matkul, $kode_progdi)
    {
        $this->kode_matkul = $kode_matkul ;
        $this->kode_progdi = $kode_progdi ;
        $this->detail_matkul = $detail_matkul ;
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
