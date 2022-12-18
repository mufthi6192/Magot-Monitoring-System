<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('data')->group(function (){
   Route::get('all',[\App\Http\Controllers\Api\ApiController::class,'allData'])->name('api-all-data');
   Route::get('latest',[\App\Http\Controllers\Api\ApiController::class,'latestData'])->name('api-latest-data');
   Route::get('insert',[\App\Http\Controllers\Api\ApiController::class,'insertData'])->name('api-insert-data');
});
