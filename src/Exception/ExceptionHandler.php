<?php

namespace Ekopras18\Satusehat\Exception;
class ExceptionHandler
{
    public static function response200($message, $data)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'code' => 200,
            'data' => $data
        ], 200);
    }

    public static function response201($message)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'code' => 201
        ], 201);
    }

    public static function response401($message)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'code' => 401
        ], 401);
    }

    public static function response404($message)
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