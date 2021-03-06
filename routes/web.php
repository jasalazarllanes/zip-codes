<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZipCodeController;
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

Route::get('/import', [ZipCodeController::class, 'import'])->name('import');
Route::get('/zip-codes/{code}', [ZipCodeController::class, 'zip_codes'])->name('codes');
Route::get('/ztest/{code}', [ZipCodeController::class, 'zip_codes_old'])->name('test');
