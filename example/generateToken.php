<?php

use Ekopras18\Satusehat\Fhir;

/**
 * Class generateToken
 *
 * This class is used to generate a FHIR token.
 */
class generateToken
{
    /**
     * The Fhir instance.
     *
     * @var Fhir
     */
    private $fhir;

    /**
     * Create a new generateToken instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->fhir = new Fhir();
    }

    /**
     * Generate a FHIR token.
     *
     * @return string The generated token.
     */
    public function index()
    {
        return $this->fhir->token();
    }
}