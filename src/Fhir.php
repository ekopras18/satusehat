<?php

namespace Ekopras18\Satusehat;

use Ekopras18\Satusehat\Exception\ExceptionHandler;
use Ekopras18\Satusehat\Models\Token;
use Ekopras18\Satusehat\Config\Environment;
use Carbon\Carbon;

/**
 * Class Fhir
 *
 * This class provides methods to handle FHIR related operations.
 */
class Fhir
{
    /**
     * Sends a FHIR request.
     *
     * @param string $url The URL to send the request to.
     * @param string $method The HTTP method to use for the request.
     * @param mixed $body The body of the request.
     * @param string $contentType The content type of the request.
     * @return mixed The response from the server.
     */
    public function fhir($url, $method, $body, $contentType)
    {
        // check token
        $this->token();
        $getToken = Token::where('env', Environment::env())->first();
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $body == null ? json_decode($body, true) : json_encode($body, true),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: ' . $contentType,
                'Authorization: Bearer ' . $getToken['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response, true);

        if ($response === null) {
            return ExceptionHandler::response401('Response is null, please check your request body and header');
        }

        // Check error response
        if (isset($response['resourceType']) && $response['resourceType'] === 'OperationOutcome') {
            return ExceptionHandler::operationOutcome($response);
        } else {
            return ExceptionHandler::response200('Success',$response);
        }
    }

    /**
     * Checks and refreshes the token if necessary.
     *
     * @return mixed The response from the server.
     */
    public function token()
    {
        $getToken = Token::where('env', Environment::env())->first();

        if ($getToken === null) {
            $generate_token = $this->generateToken();

            Token::create([
                'env' => Environment::env(),
                'token' => $generate_token['access_token'],
                'last_used_at' => Carbon::now()->addSeconds(3500)->format('Y-m-d H:i:s')
            ]);

            return ExceptionHandler::response201('New Token Generated');

        } else {

            if (Carbon::now()->gt($getToken->last_used_at)) {
                $refresh_token = $this->generateToken();

                Token::where('env', Environment::env())->update([
                    'env' => Environment::env(),
                    'token' => $refresh_token['access_token'],
                    'last_used_at' => Carbon::now()->addSeconds(3500)->format('Y-m-d H:i:s')
                ]);

                return ExceptionHandler::response201('Success Refresh Token');

            } else {

                return ExceptionHandler::response201('Success');

            }
        }

    }

    /**
     * Generates a new token.
     *
     * @return mixed The response from the server.
     */
    public function generateToken()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => Environment::url()['authUrl'] . '/accesstoken?grant_type=client_credentials',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'client_id=' . Environment::auth()['clientId'] . '&client_secret=' . Environment::auth()['clientSecret'],
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

            return ExceptionHandler::operationOutcome($response);

        } else {

            return $response;

        }
    }

}