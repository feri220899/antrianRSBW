<?php

use App\Http\Controllers\loketA;
use App\Http\Controllers\loketB;
use App\Http\Controllers\loketD;
use App\Http\Controllers\loketE;
use App\Http\Controllers\loketF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\PendaftaranAController;
use App\Http\Controllers\PendaftaranBController;

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

Route::get('/', [IndexController::class, 'Index']);
Route::get('/pw', [Controller::class, 'Index']);

Route::get('/pendaftaranA', [PendaftaranAController::class, 'pendaftaranA'])->name('pendaftaranA');
    Route::get('/viewpendaftaranA', [PendaftaranAController::class, 'viewpendaftaranA']);
Route::get('/pendaftaranB', [PendaftaranBController::class, 'pendaftaranB'])->name('pendaftaranB');
    Route::get('/viewpendaftaranB', [PendaftaranBController::class, 'viewpendaftaranB']);


// LOKET A
Route::get('/loketa', [loketA::class, 'loketa'])->name('loketa');
Route::post('/inputadaloketa', [loketA::class, 'inputadaloketa'])->name('inputadaloketa');
Route::post('/inputtidakadaloketa', [loketA::class, 'inputtidakadaloketa'])->name('inputtidakadaloketa');

// LOKET B
Route::get('/loketb', [loketB::class, 'loketb'])->name('loketb');
Route::post('/inputadaloketb', [loketB::class, 'inputadaloketb'])->name('inputadaloketb');
Route::post('/inputtidakadaloketb', [loketB::class, 'inputtidakadaloketb'])->name('inputtidakadaloketb');

// LOKET D
Route::get('/loketd', [loketD::class, 'loketd'])->name('loketd');
Route::post('/inputadaloketd', [loketD::class, 'inputadaloketd'])->name('inputadaloketd');
Route::post('/inputtidakadaloketd', [loketD::class, 'inputtidakadaloketd'])->name('inputtidakadaloketd');

// LOKET E
Route::get('/lokete', [loketE::class, 'lokete'])->name('lokete');
Route::post('/inputadalokete', [loketE::class, 'inputadalokete'])->name('inputadalokete');
Route::post('/inputtidakadalokete', [loketE::class, 'inputtidakadalokete'])->name('inputtidakadalokete');

// LOKET F
Route::get('/loketf', [loketF::class, 'loketf'])->name('loketf');
Route::post('/inputadaloketf', [loketF::class, 'inputadaloketf'])->name('inputadaloketf');
Route::post('/inputtidakadaloketf', [loketF::class, 'inputtidakadaloketf'])->name('inputtidakadaloketf');
