<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SuperAdminController;
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

Route::post('/register',[RegisterController::class, 'store']);
Route::get('/',[RegisterController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    // User
    Route::get('/user/dashboard',[AspirasiController::class, 'index']);
    Route::get('/user/info',[AspirasiController::class, 'info']);
    Route::get('/user/test',[AspirasiController::class, 'test']);
    Route::get('/user/{aspirasi}/detail',[AspirasiController::class, 'detail']);
    Route::get('/user/create',[AspirasiController::class, 'create']);
    Route::post('/user/create',[AspirasiController::class, 'store']);
    Route::get('/user/collection',[AspirasiController::class, 'show']);
    Route::get('/aspirasi/{aspirasi}/edit',[AspirasiController::class, 'edit']);
    Route::put('/edit/{aspirasi}',[AspirasiController::class, 'update']);  
    Route::delete('/delete/{aspirasi}',[AspirasiController::class, 'destroy']);
    Route::get('/about',[AspirasiController::class, 'about']);
    Route::get('/panduan',[AspirasiController::class, 'panduan']);
    Route::get('/like/{aspirasi}',[LikeController::class, 'like']);
    Route::delete('/user/delete/{komentar}',[KomentarController::class, 'DeleteKomentar']);

    // Komentar
    Route::post('/komentar',[KomentarController::class, 'post_komentar']);
    Route::post('/logout',[LoginController::class, 'logout']);

    Route::get('/user/category/{category}', [CategoryController::class, 'showAspirasi']);
    
});
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/controller',[AdminController::class, 'index']);
    Route::get('/admin/dashboard',[AdminController::class, 'dashboard']);
    Route::get('/admin/users',[AdminController::class, 'show']);
    Route::get('/admin/aspirasi/{aspirasi}/edit',[AdminController::class, 'edit']);
    Route::put('/admin/edit/{aspirasi}',[AdminController::class, 'update']);
    Route::get('/admin/{aspirasi}/detail',[AdminController::class, 'adm_detail']);
    Route::get('/admin/create',[AdminController::class, 'create']);
    Route::post('/admin/create',[AdminController::class, 'store']);
    Route::delete('/admin/delete/{komentar}',[KomentarController::class, 'DeleteKomentar']);
    Route::delete('/delete/{aspirasi}',[AdminController::class, 'destroy']);
    Route::delete('/delete/user/{user}',[AdminController::class, 'DeleteUser']);
    
});

Route::middleware(['superadmin'])->group(function () {
    Route::get('/superadmin',[SuperAdminController::class, 'show']);
    Route::get('/superadmin/formedituser/{user}/edit',[SuperAdminController::class, 'edit']);
    Route::put('/superadmin/formedituser/{user}/update',[SuperAdminController::class, 'update']);
});

