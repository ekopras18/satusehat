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
     * Handles a response.
     *
     * @param string $message The message to send to the client.
     * @param int $code The HTTP status code to send to the client.
     * @param mixed $data The data to send to the client.
     * @return \Illuminate\Http\JsonResponse The response to send to the client.
     */
    public static function response(string $message, int $code, $data = null)
    {
        $response = [
            'status' => $code >= 200 && $code < 300,
            'message' => $message,
            'code' => $code
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }

    /**
     * Handles a 401 response.
     *
     * @param array $response The response from the server.
     * @return \Illuminate\Http\JsonResponse The response to send to the client.
     */
    public static function operationOutcome($response)
    {
        $issue = $response['issue'][0];
        $severity = $issue['severity'];
        $code = $issue['code'];
        $details = $issue['details']['text'];
        $diagnostics = $issue['details']['diagnostics'] ?? $issue['diagnostics'] ?? '-';

        $message = "Error - Severity: $severity, Code: $code, Details: $details, Diagnostics: $diagnostics";

        return self::response($message, 401);
    }
}