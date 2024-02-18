<?php

return [
    /*
     * Environment can be 'production', 'staging', or 'development'
     */
    'environment' => env('SATUSEHAT_ENV', 'development'),

    /*
     * This is the client_id, client_secret, and organization_id that will be used to generate the token
     */

    'client_id' => env('SATUSEHAT_CLIENT_ID', 'your-client-id'),
    'client_secret' => env('SATUSEHAT_CLIENT_SECRET', 'your-client-secret'),
    'organization_id' => env('SATUSEHAT_ORGANIZATION_ID', 'your-organization-id'),
    'organization_name' => env('SATUSEHAT_ORGANIZATION_NAME', 'your-organization-name'),

    /*
     * Set the auth_url, base_url, and consent_url for each environment
     */

    'auth_url_prod' => env('SATUSEHAT_AUTH_URL_PROD', 'https://api-satusehat.kemkes.go.id/oauth2/v1'),
    'base_url_prod' => env('SATUSEHAT_BASE_URL_PROD', 'https://api-satusehat.kemkes.go.id/fhir-r4/v1'),
    'consent_url_prod' => env('SATUSEHAT_CONSENT_URL_PROD', 'https://api-satusehat.dto.kemkes.go.id/consent/v1'),

    'auth_url_stg' => env('SATUSEHAT_AUTH_URL_STG', 'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1'),
    'base_url_stg' => env('SATUSEHAT_BASE_URL_STG', 'https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1'),
    'consent_url_stg' => env('SATUSEHAT_CONSENT_URL_STG', 'https://api-satusehat-stg.dto.kemkes.go.id/consent/v1'),

    'auth_url_dev' => env('SATUSEHAT_AUTH_URL_DEV', 'https://api-satusehat-dev.dto.kemkes.go.id/oauth2/v1'),
    'base_url_dev' => env('SATUSEHAT_BASE_URL_DEV', 'https://api-satusehat-dev.dto.kemkes.go.id/fhir-r4/v1'),
    'consent_url_dev' => env('SATUSEHAT_CONSENT_URL_DEV', 'https://api-satusehat-dev.dto.kemkes.go.id/consent/v1'),


    /*
     * Set the table name for token, organization, Location, and Encounter
     */

    'token_table' => 'ss_token',
    'organization_table' => 'ss_organization',
    'location_table' => 'ss_location',
    'encounter_table' => 'ss_encounter',

];