<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* user controller */

Route::get("/register", [UserController::class, "register"])->middleware('guest');

Route::get("/login", [UserController::class, "login"])->middleware('guest');

Route::post("/user/register", [UserController::class, "store"])->middleware('guest');

Route::post("/user/login", [UserController::class, "authenticate"])->middleware('guest');

Route::post("/logout", [UserController::class, "logout"])->middleware('auth');

Route::get("/user", [UserController::class, "getData"])->middleware('auth');

Route::get("/user/edit", [UserController::class, "edit"])->middleware('auth');

Route::post("/user/update", [UserController::class, "update"])->middleware('auth');

/* posts controller */
Route::get("/post/create", [PostController::class, 'create'])->middleware('auth');

Route::post('/post/store', [PostController::class, 'store'])->middleware('auth');

Route::get('/', [PostController::class, 'index']);

Route::post('/increment/{posts}', [PostController::class, 'incrementLikes']);

Route::get('/post/edit/{posts}', [PostController::class, 'edit']);

Route::post('/post/update/{posts}', [PostController::class, 'update'])->middleware('auth');

Route::post('/post/delete/{posts}', [PostController::class, 'delete'])->middleware('auth');

/* api controller */
Route::post('/ai/create', [ApiController::class, 'generatePhoto'])->middleware('auth');
