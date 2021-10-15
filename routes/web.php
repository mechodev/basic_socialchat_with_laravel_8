<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\PublicationController;

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

Route::get('/', function(){
    return view('auth.login');
});

Route::get('/messages', [MessageController::class, 'index'])->name('messages')->middleware('auth');



Route::get('/messages/{id}', [MessageController::class, 'details'])->name('details')->middleware('auth');


Route::get('/home', [PublicationController::class, 'index'])->name('home')->middleware('auth');

Route::post('/home', [PublicationController::class, 'store'])->name('home');

Route::post('/commentaire/{id}', [CommentaireController::class, 'store'])->name('commentaire');

Route::get('/publication/{id}', [PublicationController::class, 'show'])->name('comment')->middleware('auth');


Route::get('/friends', [FriendController::class, 'index'])->name('friend_liste')->middleware('auth');

Route::post('/friends/delete/{id}', [FriendController::class, 'delete'])->name('friend_delete')->middleware('auth');

Route::post('/friends/add/{id}', [FriendController::class, 'store'])->name('friend_add')->middleware('auth');


Route::get('/profile', [FriendController::class, 'profile'])->name('profile')->middleware('auth');



Route::post('/response', [MessageController::class, 'store'])->name('response')->middleware('auth');


require __DIR__.'/auth.php';
