<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhenThuongController;
use App\Http\Controllers\KhenThuong_CaNhanController;
use App\Http\Controllers\ThongTinCaNhanController;

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

Route::get('/', [loginController::class, "home"])->name('login');
Route::post('/', [loginController::class, "submitLogin"])->name('submitLogin');

// các mục nào viết về admin thì cho route trong này
Route::middleware(['checkHT'])->group(function () {
    // Route::get('/admin', function () {
    //     return view('admin/manager');
    // })->name('admin');
    // Route::get('/nhansu', function () {
    //     return view('nhansu/manager');
    // })->name('nhansu');
    // Route::get('/nhanvien', function () {
    //     return view('nhanvien/manager');
    // })->name('nhanvien');
});

// các mục nào viết về Nhân viên nhân sự thì cho route trong này
Route::middleware(['checkNVNS'])->group(function () {
    Route::get('/quanlynhanvien', function () {
        return view('nhanvien/manager');
    })->name('quanlynhanvien');

    // Thong tin ca nhan
    Route::prefix('thongtincanhan')->group(function() {
        Route::get('/', [ThongTinCaNhanController::class, 'index'])->name('canhan.index');
        Route::get('chitietluong', [ThongTinCaNhanController::class, 'chiTietLuong'])->name('canhan.chiTietLuong');
        Route::post('/', [ThongTinCaNhanController::class, 'addPhoto'])->name('canhan.addPhoto');
    });

    // Khen thuong cua nhan vien phong nhan su
    Route::prefix('khenthuong')->group(function() {
        Route::get('/', [KhenThuongController::class, 'index'])->name('khenthuong.index');
        Route::get('create', [KhenThuongController::class, 'create'])->name('khenthuong.create');
        Route::post('create', [KhenThuongController::class, 'store']);
        Route::get('{id}/edit', [KhenThuongController::class, 'edit'])->whereNumber('id')->name('khenthuong.edit');
        Route::put('{id}/edit', [KhenThuongController::class, 'update'])->whereNumber('id')->name('khenthuong.update');
        Route::delete('{id}/destroy', [KhenThuongController::class, 'destroy'])->whereNumber('id')->name('khenthuong.destroy');
    });

    // Danh sach khen thuong cua nhan vien phong nhan su
    Route::prefix('khenthuong-canhan')->group(function() {
        Route::get('/', [KhenThuong_CaNhanController::class, 'index'])->name('khenthuong_canhan.index');
        Route::get('create', [KhenThuong_CaNhanController::class, 'create'])->name('khenthuong_canhan.create');
        Route::post('create', [KhenThuong_CaNhanController::class, 'store']);
        Route::get('{id}/edit', [KhenThuong_CaNhanController::class, 'edit'])->whereNumber('id')->name('khenthuong_canhan.edit');
        Route::put('{id}/edit', [KhenThuong_CaNhanController::class, 'update'])->whereNumber('id')->name('khenthuong_canhan.update');
        Route::delete('{id}/destroy', [KhenThuong_CaNhanController::class, 'destroy'])->whereNumber('id')->name('khenthuong_canhan.destroy');
        Route::post('search', [KhenThuong_CaNhanController::class, 'search'])->name('khenthuong_canhan.search');
    });
});

// các mục nào viết về nhân viên thì cho route trong này
Route::middleware(['checkNV'])->group(function () {

});

// các mục nào viết về giáo viên thì cho route trong này
Route::middleware(['checkGV'])->group(function () {
    Route::get('/nhanvien', function () {
        return view('nhanvien/manager');
    })->name('nhanvien');
});

// các mục nào viết về nhân viên tài chính thì cho route trong này
Route::middleware(['checkNVTC'])->group(function () {

});

// Route::get('/thongtincanhan', function () {
//     return view('admin/thongtincanhan');
// })->name('thongtincanhan');

// Route::get('/thongtincanhan', function () {
//     return view('nhanvien/thongtincanhan');
// })->name('thongtinnhanvien');