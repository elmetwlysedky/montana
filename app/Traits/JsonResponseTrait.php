<?php

namespace App\Traits;

trait JsonResponseTrait
{
    protected function jsonSuccess($data = null, $message = null,  $status = \Illuminate\Http\Response::HTTP_OK)
    {
        $response = [
            'success' => true,
            'data' => $data,
            'message' => $message ?? 'Success',

        ];

        return response()->json($response, $status);
    }

    protected function jsonFailed($data = null, $message = null,  $status = \Illuminate\Http\Response::HTTP_BAD_REQUEST)
    {
        $response = [
            'success' => false,
            'data' => $data,
            'message' => $message ?? 'Failed',

        ];

        return response()->json($response, $status);
    }
}
