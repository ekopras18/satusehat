<?php

use Ekopras18\Satusehat\Fhir;
class generateToken
{
    public function __construct()
    {
        $this->fhir = new Fhir();
    }

    public function index()
    {
        return $this->fhir->token();
    }
}