<?php

namespace App\Entity ;

class Tagihan
{
    private $id_tagihan;
    private $nim;
    private $uang_kuliah;
    private $denda;
    private $spp;
    private $layanan_kemahasiswaan;
    private $batas_akhir_pembayaran;

    function __construct($id_tagihan, $nim, $uang_kuliah, $denda, $spp, $layanan_kemahasiswaan, $batas_akhir_pembayaran)
    {
        $this->id_tagihan = $id_tagihan ;
        $this->nim = $nim ;
        $this->uang_kuliah = $uang_kuliah ;
        $this->denda = $denda ;
        $this->spp = $spp ;
        $this->layanan_kemahasiswaan = $layanan_kemahasiswaan ;
        $this->batas_akhir_pembayaran = $batas_akhir_pembayaran ;
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
