<?php

namespace App\Http\Controllers;

/**
 * Clase padre de los controladores de API.
 *
 * El formato de respuesta venia de InfyOm\Generator\Utils\ResponseUtil. Ese
 * paquete se elimino en el upgrade a Laravel 13; eran dos armadores de array,
 * asi que quedaron aqui y el formato de la respuesta no cambia.
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return response()->json([
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ]);
    }

    public function sendError($error, $code = 404)
    {
        return response()->json([
            'success' => false,
            'message' => $error,
        ], $code);
    }

    public function sendSuccess($message)
    {
        return response()->json([
            'success' => true,
            'message' => $message
        ], 200);
    }
}
