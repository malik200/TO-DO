<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskcontroller;

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

Route::get('/', [taskcontroller::class, 'home'])->name('task.home');

Route::get('/task/{id}' , [taskcontroller::class, 'show'])->name('task.show');

Route::post('/task/submit', [taskcontroller::class, 'store'])->name('task.store');

Route::get('/task/{id}/update-to-ongoing', [taskcontroller::class, 'updateToOngoing'])->name('task.update.ongoing');

Route::get('/task/{id}/update-to-done', [taskcontroller::class, 'updateToDone'])->name('task.update.done');

Route::get('/task/{id}/deleteTask', [taskcontroller::class, 'deleteTask'])->name('task.delete');