<?php

use App\Http\Controllers\CandidateController;
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

Route::view('api-docs', 'api_docs');

Route::middleware(['auth'])
    ->group(function() {
        Route::get('', function() {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('candidates', CandidateController::class);
    });

require __DIR__.'/auth.php';
