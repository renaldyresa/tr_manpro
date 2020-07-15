<?php

namespace App\Entity ;

class Kelas
{
    private $kode_kelas;
    private $kapasitas;
    private $nip;
    private $detail_matkul;

    function __construct($kode_kelas, $kapasitas, $nip, $detail_matkul)
    {
        $this->kode_kelas = $kode_kelas ;
        $this->kapasitas = $kapasitas ;
        $this->nip = $nip ;
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
