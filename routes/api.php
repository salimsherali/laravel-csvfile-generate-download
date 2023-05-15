<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\FileController;
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


Route::prefix('v1')->group(function () {

    Route::post('/login', [UserController::class, 'login']);

    Route::group(['middleware' => 'auth:api'], function () {
        // define route to handle generate request
        Route::post('/generate-csv-file', [FileController::class, 'generate_csv_file']);      
    });
    
  // define route to handle download request
  Route::get('/download-csv-file/{token}', [FileController::class, 'download_csv_file'])->name('download-csv-file');    

});