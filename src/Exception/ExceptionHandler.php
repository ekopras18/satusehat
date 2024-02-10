<?php

namespace Ekopras18\Satusehat\Exception;
class ExceptionHandler
{
    public function response200($message, $data)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'code' => 200,
            'data' => $data
        ], 200);
    }

    public function response201($message)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'code' => 201
        ], 201);
    }

    public function response401($message)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'code' => 401
        ], 401);
    }

    public function response404($message)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'code' => 404
        ], 404);
    }

    public static function OperationOutcome($response)
    {
        $issue = $response['issue'][0];
        $severity = $issue['severity'];
        $code = $issue['code'];
        $details = $issue['details']['text'];

        return response()->json([
            'status' => false,
            'message' => "Error - Severity: $severity, Code: $code, Details: $details",
            'code' => 401
        ], 401);
    }

    public static function responseAuth($message,$response)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'code' => 200,
            'data' => [
                'api_product' => $response['api_product_list'],
                'access_token' => $response['access_token'],
                'token_type' => $response['token_type'],
                'expires_in' => $response['expires_in']
            ]
        ], 200);
    }
}