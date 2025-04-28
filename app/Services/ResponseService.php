<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class ResponseService
{
    /**
     * Retorna uma resposta de sucesso.
     */
    public function success($data, int $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data'    => $data
        ], $status);
    }

    /**
     * Retorna uma resposta de erro.
     */
    public function error(string $message, int $status = 500, $details = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'error'   => [
                'message' => $message,
                'details' => $details
            ]
        ], $status);
    }
}
