<?php

namespace Ekopras18\Satusehat;

use Ekopras18\Satusehat\Exception\ExceptionHandler;

class  Satusehat
{
    public static $access_token = null;

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

    public function fhir()
    {
        return $this->$access_token;
    }

    public function generateToken()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->authUrl . '/accesstoken?grant_type=client_credentials',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'client_id=' . $this->clientId . '&client_secret=' . $this->clientSecret,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response, true);

        if ($response === null) {
            return ExceptionHandler::response401('Error - Failed to create token, please check your client_id and client_secret');
        }

        // Check structure of response
        if (isset($response['resourceType']) && $response['resourceType'] === 'OperationOutcome') {

            return ExceptionHandler::OperationOutcome($response);

        } else {
            self::$access_token = $response['access_token'];

            return ExceptionHandler::responseAuth('Success Create Token', $response);
        }
    }


}