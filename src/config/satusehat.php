<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Environment
    |--------------------------------------------------------------------------
    |
    | Environment can be 'production', 'staging', or 'development'
    |
    */

    'environment' => env('SATUSEHAT_ENV', 'development'),

    /*
    |--------------------------------------------------------------------------
    | Authentication Information
    |--------------------------------------------------------------------------
    |
    | This is the client_id, client_secret, and organization_id that will be used to generate the token
    |
    */

    'auth' => [
        'client_id' => env('SATUSEHAT_CLIENT_ID', 'your-client-id'),
        'client_secret' => env('SATUSEHAT_CLIENT_SECRET', 'your-client-secret'),
        'organization_id' => env('SATUSEHAT_ORGANIZATION_ID', 'your-organization-id'),
        'organization_name' => env('SATUSEHAT_ORGANIZATION_NAME', 'your-organization-name'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Url Information
    |--------------------------------------------------------------------------
    |
    | Set the auth_url, base_url, and consent_url for each environment
    |
    */

    'urls' => [
        'production' => [
            'auth' => env('SATUSEHAT_AUTH_URL_PROD', 'https://api-satusehat.kemkes.go.id/oauth2/v1'),
            'base' => env('SATUSEHAT_BASE_URL_PROD', 'https://api-satusehat.kemkes.go.id/fhir-r4/v1'),
            'consent' => env('SATUSEHAT_CONSENT_URL_PROD', 'https://api-satusehat.dto.kemkes.go.id/consent/v1'),
        ],
        'staging' => [
            'auth' => env('SATUSEHAT_AUTH_URL_STG', 'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1'),
            'base' => env('SATUSEHAT_BASE_URL_STG', 'https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1'),
            'consent' => env('SATUSEHAT_CONSENT_URL_STG', 'https://api-satusehat-stg.dto.kemkes.go.id/consent/v1'),
        ],
        'development' => [
            'auth' => env('SATUSEHAT_AUTH_URL_DEV', 'https://api-satusehat-dev.dto.kemkes.go.id/oauth2/v1'),
            'base' => env('SATUSEHAT_BASE_URL_DEV', 'https://api-satusehat-dev.dto.kemkes.go.id/fhir-r4/v1'),
            'consent' => env('SATUSEHAT_CONSENT_URL_DEV', 'https://api-satusehat-dev.dto.kemkes.go.id/consent/v1'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Table Information
    |--------------------------------------------------------------------------
    |
    | Set the table name for token, organization, Location, and Encounter
    |
    */

    'table' => [
        'token' => 'ss_token',
        'organization' => 'ss_organization',
        'location' => 'ss_location',
        'encounter' => 'ss_encounter',
    ],


];
