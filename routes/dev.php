<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes Custom
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[\App\Http\Controllers\Dev\DevController::class,'index'])->name('home');

Route::get('merge',[\App\Http\Controllers\Main\Merge\MergeController::class,'index'])->name('merge-data');


Route::prefix('error')->group(function (){
    Route::get('/500',[\App\Http\Controllers\Error\ErrorController::class,'index'])->name('error');
});

Route::prefix('output')->group(function (){

    Route::prefix('lamp')->group(function (){
        Route::get('/a',[\App\Http\Controllers\Main\Output\LampA\LampAController::class,'index'])->name('lamp-a-index');
        Route::get('/b',[\App\Http\Controllers\Main\Output\LampB\LampBController::class,'index'])->name('lamp-b-index');
        Route::get('/turn-on',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOnLampA'])->name('turn-on-lamp');
        Route::get('/turn-off',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOffLampA'])->name('turn-off-lamp');
        Route::get('/turn-on-b',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOnLampB'])->name('turn-on-lamp-b');
        Route::get('/turn-off-b',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOffLampB'])->name('turn-off-lamp-b');
    });

    Route::prefix('pump')->group(function (){
        Route::get('/a',[\App\Http\Controllers\Main\Output\PumpA\PumpAController::class,'index'])->name('pump-a-index');
        Route::get('/b',[\App\Http\Controllers\Main\Output\PumpB\PumpBController::class,'index'])->name('pump-b-index');
        Route::get('/turn-on',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOnPumpA'])->name('turn-on-pump');
        Route::get('/turn-off',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOffPumpA'])->name('turn-off-pump');
        Route::get('/turn-on-b',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOnPumpB'])->name('turn-on-pump-b');
        Route::get('/turn-off-b',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOffPumpB'])->name('turn-off-pump-b');
    });
});
