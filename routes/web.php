<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;
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


//tasks
Route::get('/',[TaskController::class, 'index']);
Route::get('create',[TaskController::class, 'create']);
Route::post('store',[TaskController::class, 'store']);
Route::get('show/{id}',[TaskController::class, 'show']);
Route::get('edit/{id}',[TaskController::class, 'edit']);
Route::post('edit',[TaskController::class, 'editStore']);
Route::get('delete/{id}',[TaskController::class, 'destroy']);
//comments
Route::post('comment/{task}',[CommentController::class, 'store'])->name('comment.store');
Route::get('editComment/{id}',[CommentController::class, 'edit']);
Route::post('editComment',[CommentController::class, 'editStore']);
Route::get('deleteComment/{id}',[CommentController::class, 'destroy']);
//auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//branches
Route::get('asd',[TaskController::class, 'getBranch']);
