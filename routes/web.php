<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RootPageController;
use App\Http\Controllers\TaskController;

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

Route::get('/', RootPageController::class)->name('root');

Route::get('/task', [TaskController::class, 'task'])->name('task');
Route::get('/raffle', [TaskController::class, 'raffle'])->name('raffle');

// リリースノート
Route::get('/releases', function () {
    return view('release');
})->name('release');
