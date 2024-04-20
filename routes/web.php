<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth')->group(function () {
    Route::get('/',                                                [App\Http\Controllers\BookController::class, 'dashboard'])->name('dashboard');
    Route::get('/book_manage',                                     [App\Http\Controllers\BookController::class, 'view_book_manage'])->name('book_manage');
    Route::post('add_bookdetails',                                 [App\Http\Controllers\BookController::class, 'add_bookdetails'])->name('add_bookdetails');
    Route::get('deleteBook/{id}',                                  [App\Http\Controllers\BookController::class, 'deleteBook'])->name('deleteBook');
    Route::get('editBook/{id}',                                    [App\Http\Controllers\BookController::class, 'editBook'])->name('editBook');
    Route::post('update_book/{id}',                                [App\Http\Controllers\BookController::class, 'update_book'])->name('update_book');
    Route::get('/book_issued',                                     [App\Http\Controllers\BookController::class, 'bookIssued'])->name('book_issued');
    Route::get('/book_exchange',                                   [App\Http\Controllers\BookController::class, 'book_exchange'])->name('book_exchange');
    Route::get('/issue-book/{user}/{book}',                        [App\Http\Controllers\BookController::class, 'showIssueForm'])->name('show-issue-form');
    Route::get('/return-book/{user}/{book}',                       [App\Http\Controllers\BookController::class, 'showReturnForm'])->name('show-return-form');
    Route::post('/return-book/{user}/{book}',                      [App\Http\Controllers\BookController::class, 'returnBook'])->name('return-book');
    Route::get('/return-book/{return_id}',                         [App\Http\Controllers\BookController::class, 'returnBook'])->name('return-book');

    Route::get('/user_list',                                       [App\Http\Controllers\UserController::class, 'view_user_list'])->name('user_list')->middleware('auth');
    Route::post('create_users',                                    [App\Http\Controllers\UserController::class, 'create_users'])->name('create_users');
    Route::get('deleteUser/{id}',                                  [App\Http\Controllers\UserController::class, 'deleteUser']);
    Route::get('edit_user/{id}',                                   [App\Http\Controllers\UserController::class, 'edit_user']);
    Route::post('update_user/{id}',                                [App\Http\Controllers\UserController::class, 'update_user'])->name('update_user');
    Route::post('update_role/{id}',                                [App\Http\Controllers\UserController::class, 'update_role']);
    Route::get('/user_edit/{id}',                                  [App\Http\Controllers\UserController::class, 'view_user_edit'])->name('user_edit')->middleware('auth');
});


require __DIR__ . '/auth.php';
