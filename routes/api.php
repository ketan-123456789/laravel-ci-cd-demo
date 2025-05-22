<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\AuthTestController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

  
// Public route to test authentication status
Route::get('test-auth-public', [AuthTestController::class, 'testAuth']);

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
     
Route::middleware('auth:api')->group( function () {
    Route::resource('products', ProductController::class);
    
    // Protected route to test authentication status
    Route::get('test-auth', [AuthTestController::class, 'testAuth']);

    Route::get('user', function (Request $request) {
        return $request->user();
    });
});

// Make sure the OAuth token endpoint is working correctly
// Route::post('oauth/test', function (Request $request) {
//     $response = app()->call(
//         '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken',
//         [$request]
//     );
//     return $response;
// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
