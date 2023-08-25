<?php

namespace App\Http\Controllers;

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

Route::get('/', function () {
    return view('welcome');
});

\Auth::routes();

// Admin routes
Route::middleware([ 'auth', 'role:admin' ])->prefix('admin')->group(function() {
    Route::resources(
        [
            'authors'        => AuthorController::class,
            'books'          => BookController::class,
            'borrowed-books' => BorrowedBookController::class,
            'categories'     => CategoryController::class,
            'roles'          => RoleController::class,
            'users'          => UserController::class,
        ],
        [
            'except' => [ 'show' ]
        ]
    );
});

// User routes
Route::middleware([ 'auth' ])->group(function() {
    Route::get('/home', [ HomeController::class, 'index' ])->name('home');

    // Authors
    Route::get('/authors',      [ AuthorController::class, 'userIndex' ])->name('authors');
    Route::get('/authors/{id}', [ AuthorController::class, 'show' ])->name('author');

    // Books
    Route::get('/books',           [ BookController::class, 'userIndex' ])->name('books');
    Route::get('/books/{id}',      [ BookController::class, 'show' ])->name('book');

    // Categories
    Route::get('/categories/',     [ CategoryController::class, 'userIndex' ])->name('categories');
    Route::get('/categories/{id}', [ CategoryController::class, 'show' ])->name('category');

    // Borrowed Books
    Route::post('/books/{book}/borrowed-books', [ BorrowedBookController::class, 'userStore' ])->name('borrow-book');
    Route::patch('/borrowed-books/{id}',        [ BorrowedBookController::class, 'return' ])->name('return-book');

    // Users
    Route::get('/users/self',        [ UserController::class, 'getProfile' ])->name('profile');
    Route::get('/users/{user}/edit', [ UserController::class, 'edit' ])->middleware('owner')->name('user-edit');
});

