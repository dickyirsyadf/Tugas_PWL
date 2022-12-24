<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');


Route::get('/test', function (){
    return "hello";
})->middleware ('auth');

Route::middleware('is_admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('home', [App\Http\Controllers\AdminController::class, 'index']);
        Route::get('books', [App\Http\Controllers\AdminController::class, 'books'])->name('admin.books');
        Route::post('book', [App\Http\Controllers\AdminController::class, 'submit_book'])->name("admin.book.submit");
        Route::patch('book/update', [App\Http\Controllers\AdminController::class, 'update_book'])->name("admin.book.update");
        Route::get('ajaxadmin/dataBuku/{id}', [App\Http\Controllers\AdminController::class, 'getDataBuku']);
        Route::post('books/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete_book']);
        Route::get('print_books', [App\Http\Controllers\AdminController::class, 'print_books'])->name('print.books');
        Route::get('books/export', [App\Http\Controllers\AdminController::class, 'export'])->name('admin.books.export');
        Route::post('books/import', [App\Http\Controllers\AdminController::class, 'import'])->name('admin.books.import');
    });
});

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home')
        ->middleware('auth');

