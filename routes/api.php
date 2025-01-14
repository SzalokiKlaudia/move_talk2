<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ForumTopicController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// store metódus új fh-i fiókot hoz létre a rendszerben, miután validálta az adatokat (például e-mail cím és jelszó).
Route::post('/register', [RegisteredUserController::class, 'store']);


//  ellenőrzi a fh-i hitelesítési adatokat, és ha helyesek, létrehoz egy hozzáférési tokent a felhasználó számára
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::middleware(['auth:sanctum']) ///user útvonal visszaadja a hitelesített felhasználó adatait
->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']); //kijelentkezési útvonal


//Admin útvonalak

//csak azok férhetnek hozzá akik hitelesített fh-k és, admin joggal rendelkeznek
//felhasználólistát ad vissza, amihez csak adminok férhetnek hozzá
Route::middleware(['auth:sanctum', Admin::class])
->group(function () {
    Route::get('/admin/users', [RegisteredUserController::class, 'index']);
});

//admin felrak 1 filmet
//admin módosít egy filmet
//admin felrak 1 témát
//admin töröl egy tagot




//regisztrált tag
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//felrak 1 filmet magának
//módosít 1 filmet magának
//user felrak 1 témát


//vendég
Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/{id}', [MovieController::class, 'show']);
Route::get('/forum-topics', [ForumTopicController::class, 'index']);


