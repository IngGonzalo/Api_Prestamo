<?php

use App\Http\Controllers\Rol\RolController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

 // roles 
   Route::get('/roles', [RolController::class, 'index']);
   Route::post('/roles', [RolController::class, 'store']);
   Route::get('/roles/{term}', [RolController::class, 'show']);
   Route::put('/roles/{id}', [RolController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
