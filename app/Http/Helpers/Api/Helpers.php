<?php

namespace App\Http\Helpers\Api;

class Helpers
{
    public static function unauthorized($message = 'Something Went Wrong')
    {
        return response()->json(['message' => $message], 401);
    }
    public static function success($message = null, $data = [])
    {
        return response()->json(['message' => $message, 'data' => $data], 200);
    }
    public static function onlySuccess($message = null)
    {
        return response()->json(['message' => $message], 200);
    }

    public static function no_content($message = 'No Data Found')
    {
        return response()->json(['message' => $message, 'data' => null], 204);
    }

    public static function created($message = 'Data Created', $data = [])
    {
        return response()->json(['message' => $message, 'data' => $data], 201);
    }

    public static function updated($message = 'Data Updated', $data = [])
    {
        return response()->json(['message' => $message, 'data' => $data], 202);
    }

    public static function deleted($message = 'Data Deleted', $data = [])
    {
        return response()->json(['message' => $message, 'data' => $data], 202);
    }

    public static function error($message = 'Something Went Wrong', $data = [])
    {
        return response()->json(['message' => $message, 'data' => $data], 400);
    }

    public static function onlyError($message = 'Something Went Wrong')
    {
        return response()->json(['message' => $message], 400);
    }

    public static function api_error($message = 'Something Went Wrong', $data = [])
    {
        return response()->json(['message' => $message, 'data' => $data], 400);
    }

    public static function validation($message = 'Invalid Submission', $data = [])
    {
        return response()->json(['message' => $message, 'data' => $data], 422);
    }

    public static function onlyValidation($message = 'Invalid Submission')
    {
        return response()->json(['message' => $message], 422);
    }

    public static function not_found($message = 'Not Found', $data = [])
    {
        return response()->json(['message' => $message, 'data' => $data], 404);
    }
    public static function warning($message, $data = null)
    {
        return response()->json(['message' => $message, 'data' => $data], 400);
    }
    public static function onlyWarning($message)
    {
        return response()->json(['message' => $message], 400);
    }
}
