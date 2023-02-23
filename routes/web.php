<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhenThuongController;
use App\Http\Controllers\KhenThuong_CaNhanController;

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
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/admin',function(){
    return view('admin/manager');
})->name('admin');
Route::get('/nhansu',function(){
    return view('nhansu/manager');
})->name('nhansu');
Route::get('/nhanvien',function(){
    return view('nhanvien/manager');
})->name('nhanvien');

Route::get('/thongtincanhan',function(){
    return view('admin/thongtincanhan');
})->name('thongtincanhan');

Route::get('/thongtincanhan',function(){
    return view('nhanvien/thongtincanhan');
})->name('thongtinnhanvien');

Route::get('/quanlynhanvien',function (){
 return view('nhansu/quanlynhanvien');
})->name('quanlynhanvien');

Route::prefix('khenthuong')->group(function() {
    Route::get('/', [KhenThuongController::class, 'index'])->name('khenthuong.index');
    Route::get('create', [KhenThuongController::class, 'create'])->name('khenthuong.create');
    Route::post('create', [KhenThuongController::class, 'store']);
    Route::get('{id}/edit', [KhenThuongController::class, 'edit'])->whereNumber('id')->name('khenthuong.edit');
    Route::put('{id}/edit', [KhenThuongController::class, 'update'])->whereNumber('id')->name('khenthuong.update');
    Route::delete('{id}/destroy', [KhenThuongController::class, 'destroy'])->whereNumber('id')->name('khenthuong.destroy');
});

Route::prefix('khenthuong-canhan')->group(function() {
    Route::get('/', [KhenThuong_CaNhanController::class, 'index'])->name('khenthuong_canhan.index');
    Route::get('create', [KhenThuong_CaNhanController::class, 'create'])->name('khenthuong_canhan.create');
    Route::post('create', [KhenThuong_CaNhanController::class, 'store']);
    Route::get('{id}/edit', [KhenThuong_CaNhanController::class, 'edit'])->whereNumber('id')->name('khenthuong_canhan.edit');
    Route::put('{id}/edit', [KhenThuong_CaNhanController::class, 'update'])->whereNumber('id')->name('khenthuong_canhan.update');
    Route::delete('{id}/destroy', [KhenThuong_CaNhanController::class, 'destroy'])->whereNumber('id')->name('khenthuong_canhan.destroy');
    Route::post('search', [KhenThuong_CaNhanController::class, 'search'])->name('khenthuong_canhan.search');
});