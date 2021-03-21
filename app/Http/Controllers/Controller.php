<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param bool $error
     * @param int $code
     * @param string $message
     * @param array $data
     * @return JsonResponse
     */
    public function response($error = false, $code = 200, $message = 'Success', $data = [])
    {
        return response()->json([
            'error' => $error,
            'message' => $message,
            'code' => $code,
            'data' => $data
        ], $code);
    }
}
