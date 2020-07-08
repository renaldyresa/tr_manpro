<?php

namespace App\Entity ;

class Dosen
{
    private $nip;
    private $nama;
    private $alamat;
    private $email;
    private $no_hp;

    function __construct($nip, $nama, $alamat, $email, $no_hp)
    {
        $this->nip = $nip ;
        $this->nama = $nama ;
        $this->alamat = $alamat ;
        $this->email = $email ;
        $this->no_hp = $no_hp ;
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
