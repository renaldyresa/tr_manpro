<?php

namespace App\Entity ;

class KST
{
    private $kode_kst;
    private $tahun_ajaran;
    private $semester;
    private $nilai;
    private $status;
    private $kode_kelas;
    private $nim;

    function __construct($kode_kst, $tahun_ajaran, $semester,$status, $nilai ,$kode_kelas, $nim)
    {
        $this->kode_kst = $kode_kst ;
        $this->tahun_ajaran = $tahun_ajaran ;
        $this->semester = $semester ;
        $this->status = $status ;
        $this->nilai = $nilai ;
        $this->kode_kelas = $kode_kelas ;
        $this->nim = $nim ;
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
