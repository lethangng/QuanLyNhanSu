<?php

use App\Http\Controllers\loginController;
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
        return view('nhansu/quanlynhanvien');
    })->name('quanlynhanvien');
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



Route::get('/thongtincanhan', function () {
    return view('admin/thongtincanhan');
})->name('thongtincanhan');

Route::get('/thongtincanhan', function () {
    return view('nhanvien/thongtincanhan');
})->name('thongtinnhanvien');
