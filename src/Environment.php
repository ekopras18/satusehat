<?php

namespace Ekopras18\Satusehat;

/**
 * Class Environment
 *
 * This class provides static methods to retrieve various configuration values.
 */
class Environment
{
    /**
     * Get the environment configuration value.
     *
     * @return string The environment configuration value.
     */
    public static function env()
    {
        return config('satusehat.environment');
    }

    /**
     * Get the URL configuration values based on the environment.
     *
     * @return array The URL configuration values.
     */
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

    /**
     * Get the auth configuration values.
     *
     * @return array The auth configuration values.
     */
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