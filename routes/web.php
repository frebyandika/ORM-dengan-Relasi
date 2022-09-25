<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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

Route::prefix('mahasiswa')->group(function () {
    Route::get('/index', [MahasiswaController::class, 'index']);
    Route::get('/create', [MahasiswaController::class, 'create']);
    Route::post('/store', [MahasiswaController::class, 'store']);
    Route::get('/show/{nim}', [MahasiswaController::class, 'show']);
    Route::get('/edit/{nim}', [MahasiswaController::class, 'edit']);
    Route::get('/update/{nim}', [MahasiswaController::class, 'update']);
    Route::get('/destroy/{nim}', [MahasiswaController::class, 'destroy']);
});
