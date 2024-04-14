<?php

namespace Ekopras18\Satusehat\Config;

class Environment
{
    public static function env()
    {
        return config('satusehat.environment');
    }

    public static function url()
    {
        $env = config('satusehat.environment');

        if ($env == 'production') {
            return [
                'authUrl' => config('satusehat.urls.production.auth'),
                'baseUrl' => config('satusehat.urls.production.base'),
                'consentUrl' => config('satusehat.urls.production.consent')
            ];
        } else if ($env == 'staging') {
            return [
                'authUrl' => config('satusehat.urls.staging.auth'),
                'baseUrl' => config('satusehat.urls.staging.base'),
                'consentUrl' => config('satusehat.urls.staging.consent')
            ];
        } else {
            return [
                'authUrl' => config('satusehat.urls.development.auth'),
                'baseUrl' => config('satusehat.urls.development.base'),
                'consentUrl' => config('satusehat.urls.development.consent')
            ];
        }
    }

    public static function auth()
    {
        return [
            'clientId' => config('satusehat.auth.client_id'),
            'clientSecret' => config('satusehat.auth.client_secret'),
            'organizationId' => config('satusehat.auth.organization_id'),
            'organizationName' => config('satusehat.auth.organization_name')
        ];
    }
}
