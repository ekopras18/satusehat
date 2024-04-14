<?php

namespace Ekopras18\Satusehat\Fhir\Onboarding;

use Ekopras18\Satusehat\Fhir;
use Ekopras18\Satusehat\Config\Environment;

class Organization extends Fhir
{
    public function __construct()
    {
//        $this->model = new Organization();
        $this->baseUrl = Environment::url()['baseUrl'];
        $this->path = 'Organization';
        $this->organitation_id = Environment::auth()['organizationId'];
        $this->organitation_name = Environment::auth()['organizationName'];
    }

    public function GetById($uuid)
    {
        $method = 'GET';
        $url = $this->baseUrl . '/' . $this->path . '/' . $uuid;
        $contentType = 'application/json';
        $body = null;

        return $this->fhir($url, $method, $body, $contentType);
    }

    public function GetByName($name)
    {
        $method = 'GET';
        $url = $this->baseUrl . '/' . $this->path . '?name='. urlencode($name);
        $contentType = 'application/json';
        $body = null;

        return $this->fhir($url, $method, $body, $contentType);
    }

    public function GetByPartOf($uuid)
    {
        $method = 'GET';
        $url = $this->baseUrl . '/' . $this->path . '?partof='. $uuid;
        $contentType = 'application/json';
        $body = null;

        return $this->fhir($url, $method, $body, $contentType);
    }

}
