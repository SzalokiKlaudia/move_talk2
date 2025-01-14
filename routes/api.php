<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ForumTopicController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Moderator;
use App\Http\Middleware\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// store metódus új fh-i fiókot hoz létre a rendszerben, miután validálta az adatokat (például e-mail cím és jelszó).
Route::post('/register', [RegisteredUserController::class, 'store']);


//  ellenőrzi a fh-i hitelesítési adatokat, és ha helyesek, létrehoz egy hozzáférési tokent a felhasználó számára
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () { ///user útvonal visszaadja a hitelesített felhasználó adatait
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']); //kijelentkezési útvonal
});



//Admin útvonalak

//csak azok férhetnek hozzá akik hitelesített fh-k és, admin joggal rendelkeznek
//felhasználólistát ad vissza, amihez csak adminok férhetnek hozzá
Route::middleware(['auth:sanctum', Admin::class])->group(function () {
    Route::get('/admin/users', [RegisteredUserController::class, 'index']);
    Route::delete('/admin/delete/{id}', [RegisteredUserController::class, 'destroy']);
    Route::delete('/admin/delete/topic/{id}', [RegisteredUserController::class, 'destroyTopic']);
    Route::delete('/admin/delete/comment/{id}', [RegisteredUserController::class, 'destroyComment']);
});


//Moderátor
Route::middleware(['auth:sanctum', Moderator::class])->group(function () {
    Route::delete('/moderator/delete/comment/{id}', [RegisteredUserController::class, 'destroyComment']);
});



//Regisztrált tag
Route::middleware(['auth:sanctum', User::class])->group(function () {
    Route::post('/user/topic', [RegisteredUserController::class, 'storeTopic']);
    Route::post('/user/comment', [RegisteredUserController::class, 'storeComment']);
    Route::get('/user/user_movies', [RegisteredUserController::class, 'indexMovies']);
    Route::get('/user/comment', [RegisteredUserController::class, 'indexComment']);
    Route::get('/user/topic', [RegisteredUserController::class, 'indexTopic']);
});



//vendég
Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/{id}', [MovieController::class, 'show']);
Route::get('/forum-topics', [ForumTopicController::class, 'index']);


