<?php

namespace Ekopras18\Satusehat\Exception;

/**
 * Class ExceptionHandler
 *
 * This class provides static methods to handle different types of HTTP responses.
 */
class ExceptionHandler
{
    /**
     * Generate a 200 OK response.
     *
     * @param string $message The response message.
     * @param mixed $data The data to be included in the response.
     * @return \Illuminate\Http\JsonResponse
     */
    public static function response200($message, $data)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'code' => 200,
            'data' => $data
        ], 200);
    }

    /**
     * Generate a 201 Created response.
     *
     * @param string $message The response message.
     * @return \Illuminate\Http\JsonResponse
     */
    public static function response201($message)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'code' => 201
        ], 201);
    }

    /**
     * Generate a 401 Unauthorized response.
     *
     * @param string $message The response message.
     * @return \Illuminate\Http\JsonResponse
     */
    public static function response401($message)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'code' => 401
        ], 401);
    }

    /**
     * Generate a 404 Not Found response.
     *
     * @param string $message The response message.
     * @return \Illuminate\Http\JsonResponse
     */
    public static function response404($message)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'code' => 404
        ], 404);
    }

    /**
     * Generate a 401 Unauthorized response with detailed error information.
     *
     * @param array $response The response data containing error details.
     * @return \Illuminate\Http\JsonResponse
     */
    public static function operationOutcome($response)
    {
        $issue = $response['issue'][0];
        $severity = $issue['severity'];
        $code = $issue['code'];
        $details = $issue['details']['text'];

        if (isset($issue['details']['diagnostics'])) {
            $diagnostics = $issue['details']['diagnostics'];
        } else {
            $diagnostics = '-';
        }

        if (isset($issue['diagnostics'])) {
            $diagnostics = $issue['diagnostics'];
        } else {
            $diagnostics = '-';
        }

        return response()->json([
            'status' => false,
            'message' => "Error - Severity: $severity, Code: $code, Details: $details, Diagnostics: $diagnostics",
            'code' => 401
        ], 401);
    }
}