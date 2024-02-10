<?php

namespace Ekopras18\Satusehat;

class  Satusehat
{

    public string $env;
    public string $authUrl;
    public string $baseUrl;
    public string $consentUrl;
    public string $clientId;
    public string $clientSecret;
    public string $organizationId;

    public function __construct()
    {
        $this->env = config('satusehat.environment');

        if ($this->env == 'production') {
            $this->authUrl = config('satusehat.auth_url_prod');
            $this->baseUrl = config('satusehat.base_url_prod');
            $this->consentUrl = config('satusehat.consent_url_prod');
        } else if ($this->env == 'staging') {
            $this->authUrl = config('satusehat.auth_url_stg');
            $this->baseUrl = config('satusehat.base_url_stg');
            $this->consentUrl = config('satusehat.consent_url_stg');
        } else {
            $this->authUrl = config('satusehat.auth_url_dev');
            $this->baseUrl = config('satusehat.base_url_dev');
            $this->consentUrl = config('satusehat.consent_url_dev');
        }

        $this->clientId = config('satusehat.client_id');
        $this->clientSecret = config('satusehat.client_secret');
        $this->organizationId = config('satusehat.organization_id');
    }
}