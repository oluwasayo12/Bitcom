<?php

use App\Http\Controllers\LocalGovController;
use App\Http\Controllers\PollingUnitController;
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

Route::get('/', [PollingUnitController::class, 'index'])->name('getResult');
Route::post('/', [PollingUnitController::class, 'getPollingUnitResult']);

Route::get('/local_government', [LocalGovController::class, 'index'])->name('getlgaResult');
Route::post('/local_government', [LocalGovController::class, 'getLgaSum']);



