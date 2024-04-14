<?php

namespace Ekopras18\Satusehat\Fhir\Onboarding;

use Ekopras18\Satusehat\Fhir;
use Ekopras18\Satusehat\Config\Environment;

/**
 * Class Organization
 *
 * This class extends the Fhir class and provides methods to interact with the Organization resource.
 */
class Organization extends Fhir
{
    /**
     * Organization constructor.
     *
     * Initializes the base URL, path, and organization details from the environment.
     */
    public function __construct()
    {
        $this->baseUrl = Environment::url()['baseUrl'];
        $this->path = 'Organization';
        $this->organitation_id = Environment::auth()['organizationId'];
        $this->organitation_name = Environment::auth()['organizationName'];
    }

    /**
     * Get an organization by its UUID.
     *
     * @param string $uuid The UUID of the organization.
     * @return mixed The response from the FHIR server.
     */
    public function getById($uuid)
    {
        $method = 'GET';
        $url = $this->baseUrl . '/' . $this->path . '/' . $uuid;
        $contentType = 'application/json';
        $body = null;

        return $this->fhir($url, $method, $body, $contentType);
    }

    /**
     * Get an organization by its name.
     *
     * @param string $name The name of the organization.
     * @return mixed The response from the FHIR server.
     */
    public function getByName($name)
    {
        $method = 'GET';
        $url = $this->baseUrl . '/' . $this->path . '?name='. urlencode($name);
        $contentType = 'application/json';
        $body = null;

        return $this->fhir($url, $method, $body, $contentType);
    }

    /**
     * Get an organization by its partOf attribute.
     *
     * @param string $uuid The UUID of the organization that this organization is part of.
     * @return mixed The response from the FHIR server.
     */
    public function getByPartOf($uuid)
    {
        $method = 'GET';
        $url = $this->baseUrl . '/' . $this->path . '?partof='. $uuid;
        $contentType = 'application/json';
        $body = null;

        return $this->fhir($url, $method, $body, $contentType);
    }

}