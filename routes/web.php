<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test',[\App\Http\Controllers\Test\TestController::class, 'index'])->name('test');

Route::prefix('auth')->middleware('auth-redirect')->group(function (){
    Route::get('/login',[\App\Http\Controllers\Auth\Login\LoginController::class,'index'])->name('login');
    Route::post('/login',[\App\Http\Controllers\Auth\Login\LoginController::class,'loginProcess'])->name('login-process');
    Route::get('/logout',[\App\Http\Controllers\Auth\Login\LoginController::class,'logoutProcess'])->name('logout');
    Route::get('/register',[\App\Http\Controllers\Auth\Register\RegisterController::class,'index'])->name('register');
});

Route::get('/home',[\App\Http\Controllers\Main\Home\HomeController::class,'index'])->middleware('custom-auth')->name('home');

Route::prefix('merge')->group(function (){
    Route::get('/',[\App\Http\Controllers\Main\Merge\MergeController::class,'index'])->middleware('custom-auth')->name('merge-data');
});

Route::prefix('output')->middleware('custom-auth')->group(function (){

    Route::prefix('lamp')->group(function (){
        Route::get('/a',[\App\Http\Controllers\Main\Output\LampA\LampAController::class,'index'])->name('lamp-a-index');
        Route::get('/b',[\App\Http\Controllers\Main\Output\LampB\LampBController::class,'index'])->name('lamp-b-index');
       Route::get('/turn-on',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOnLampA'])->name('turn-on-lamp');
       Route::get('/turn-off',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOffLampA'])->name('turn-off-lamp');
       Route::get('/turn-on-b',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOnLampB'])->name('turn-on-lamp-b');
       Route::get('/turn-off-b',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOffLampB'])->name('turn-off-lamp-b');
    });

    Route::prefix('pump')->middleware('custom-auth')->group(function (){
        Route::get('/a',[\App\Http\Controllers\Main\Output\PumpA\PumpAController::class,'index'])->name('pump-a-index');
        Route::get('/b',[\App\Http\Controllers\Main\Output\PumpB\PumpBController::class,'index'])->name('pump-b-index');
        Route::get('/turn-on',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOnPumpA'])->name('turn-on-pump');
        Route::get('/turn-off',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOffPumpA'])->name('turn-off-pump');
        Route::get('/turn-on-b',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOnPumpB'])->name('turn-on-pump-b');
        Route::get('/turn-off-b',[\App\Http\Controllers\Main\Output\OutputController::class,'turnOffPumpB'])->name('turn-off-pump-b');
    });
});

Route::prefix('sensor')->middleware('custom-auth')->group(function (){
   Route::prefix('humidity')->group(function (){
      Route::get('/',[\App\Http\Controllers\Main\Sensor\Humidity\HumidityController::class,'index'])->name('humidity-index');
      Route::get('/insert',[\App\Http\Controllers\Main\Sensor\Humidity\HumidityController::class,'insertDataByQueryParam'])->name('insert-humidity');
   });

   Route::prefix('temperature')->middleware('custom-auth')->group(function (){
      Route::get('/',[\App\Http\Controllers\Main\Sensor\Temperature\TemperatureController::class,'index'])->name('temperature-index');
      Route::get('/insert',[\App\Http\Controllers\Main\Sensor\Temperature\TemperatureController::class,'insertByQueryParam'])->name('insert-temperature');
   });
});

Route::prefix('error')->group(function (){
   Route::get('/500',[\App\Http\Controllers\Error\ErrorController::class,'index'])->name('error');
});
