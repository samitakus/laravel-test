<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [TaskController::class, 'index']);


Route::get('add-task', [TaskController::class, 'create']);
Route::post('add-task', [TaskController::class, 'store']);
Route::get('edit-task/{id}', [TaskController::class, 'create']);
Route::post('edit-task/{id}', [TaskController::class, 'store']);
Route::get('delete-task/{id}', [TaskController::class, 'delete']);