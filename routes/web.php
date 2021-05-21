<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

//------------------------------------------
//---POSTS----------

 Route::get('/postt', [PostController::class, 'index'])->name('postt');
 Route::get('/postt/create', [PostController::class, 'create']);
 Route::post('/postt/create', [PostController::class, 'store']);
 Route::get('/postt/edit/{post_id}', [PostController::class, 'edit']);
 Route::put('/postt/edit/{post_id}', [PostController::class, 'update']);
 Route::delete('/postt {post_id}', [PostController::class, 'destroy']);
//---Profile----------
Route::get('/postt/profile/{User_id}', [PostController::class, 'profile']);
//---landing-page---------

