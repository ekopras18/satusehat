<?php

namespace Ekopras18\Satusehat\Fhir\Onboarding;

use Ekopras18\Satusehat\Fhir;
class Organization extends Fhir
{
    public function __construct()
    {
//        $this->model = new Organization();
        $this->path = 'Organization';
        $this->organitation_id = $this->organizationId;
        $this->organitation_name = $this->organizationName;
    }

    public function ById($id)
    {
        $method = 'GET';
        $url = $this->baseUrl . '/' . $this->path . '/' . $id;
        $contentType = 'application/json';
        $body = null;

        return $this->fhir($url, $method, $body, $contentType);
    }

}