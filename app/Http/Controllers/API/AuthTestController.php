<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\JsonResponse;

class AuthTestController extends BaseController
{
    /**
     * Test authentication status
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function testAuth(Request $request): JsonResponse
    {
        $data = [
            'authenticated' => auth()->check(),
            'user' => auth()->check() ? auth()->user() : null,
            'token' => $request->bearerToken(),
            'headers' => $request->header(),
            'request_data' => $request->all()
        ];
        
        return $this->sendResponse($data, 'Authentication test information');
    }
}
