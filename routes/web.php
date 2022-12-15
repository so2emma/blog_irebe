<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Author;

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

Route::prefix("author")->name("author.")->group(function() {
    Route::middleware(["guest:web"])->group(function(){
        Route::view("/login", "back.pages.auth.login")->name("login");
        Route::view("/forget-password", "back.pages.auth.forget")->name("forgot-passowrd");
    });

    Route::middleware([])->group(function(){
        Route::get("/home", [AuthorController::class, "index"])->name("home");
    });
});
