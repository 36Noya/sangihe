<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DinasController;
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

Route::get(
    '/',
    [App\Http\Controllers\PostController::class, 'index']
);

Auth::routes();


Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('index');

Route::get('/reports/showAllReportsByUserId', [App\Http\Controllers\ReportController::class, 'showReportsByUserId'])->name('reports.show_report_by_user_id');

Route::resource('users', UserController::class);
Route::resource('posts', PostController::class);
Route::resource('reports', ReportController::class);
Route::resource('dinas', DinasController::class);


Route::get('/posts/filter_post_by_submenu/{id_submenu}', [App\Http\Controllers\PostController::class, 'filterPostBySubmenu'])->name('posts.filter_post_by_submenu');

Route::get('/posts/show_single_post/{id_submenu}', [App\Http\Controllers\PostController::class, 'showSinglePost'])->name('posts.show_single_post');

Route::get('/posts/edit_single_post/{id_submenu}', [App\Http\Controllers\PostController::class, 'editSinglePost'])->name('posts.edit_single_post');


Route::post('upload_image_ckeditor', [App\Http\Controllers\CkeditorController::class, 'uploadImageCkeditor'])->name('ckeditor.upload');
Route::get('/posts/create/{id_submenu}', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
