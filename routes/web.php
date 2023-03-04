<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhenThuongController;
use App\Http\Controllers\KhenThuong_CaNhanController;
use App\Http\Controllers\KyLuatController;
use App\Http\Controllers\KyLuat_CaNhanController;
use App\Http\Controllers\LuongController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\KhoaController;

use Illuminate\Routing\Router;

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

Route::get('/quanlykhoa', function () {
    return view('nhansu.danhsachkhoa.quanlykhoa');
});
Route::get('/quanlychitietkhenthuong', function () {
    return view('nhansu.khenThuong_CaNhan.chitietkhenthuong');
});
Route::get('/quanlychitietkyluat', function () {
    return view('nhansu.kyLuat_CaNhan.chitietkyluat');
});
Route::get('/danhsachkhenthuong', function () {
    return view('nhansu.khenThuong.danhsachkhenthuong');
});
Route::get('/danhsachkyluat', function () {
    return view('nhansu.kyLuat.danhsachkyluat');
});
Route::get('/danhsachphongban', function () {
    return view('nhansu.danhsachphongban.danhsachphongban');
});
Route::get('/danhsachnhanvien', function () {
    return view('nhansu.danhsachnhanvien.danhsachnhanvien');
});
Route::get('/danhsachchucvu', function () {
    return view('nhansu.danhsachchucvu.danhsachchucvu');
});

Route::get('/', [loginController::class, "home"])->name('login');
Route::post('/', [loginController::class, "submitLogin"])->name('submitLogin');



Route::post('/fogotPassword', [loginController::class, "fogotPassword"])->name('fogotPassword');

Route::get('/fogotPassword/{id}/{token}', [loginController::class, "formFogotPassword"])->name('formFogotPassword');
Route::post('/fogotPassword/{id}/{token}', [loginController::class, "postFormFogotPassword"])->name('postFormFogotPassword');

// các mục nào viết về admin thì cho route trong này
Route::middleware(['checkHT'])->group(function () {
    //
});

// các mục nào viết về Nhân viên nhân sự thì cho route trong này
Route::middleware(['checkNVNS'])->group(function () {
    Route::get('/login/user', function () {
        return view('welcome')->name('login.user');
    });

    // Khen thuong cua nhan vien phong nhan su
    Route::prefix('nhansu/khenthuong')->group(function () {
        Route::get('/', [KhenThuongController::class, 'index'])->name('khenthuong.index');
        Route::get('create', [KhenThuongController::class, 'create'])->name('khenthuong.create');
        Route::post('create', [KhenThuongController::class, 'store']);
        Route::get('{id}/edit', [KhenThuongController::class, 'edit'])->whereNumber('id')->name('khenthuong.edit');
        Route::put('{id}/edit', [KhenThuongController::class, 'update'])->whereNumber('id')->name('khenthuong.update');
        Route::delete('{id}/destroy', [KhenThuongController::class, 'destroy'])->whereNumber('id')->name('khenthuong.destroy');
    });

    // Ky luat cua nhan vien phong nhan su
    Route::prefix('nhansu/kyluat')->group(function () {
        Route::get('/', [KyLuatController::class, 'index'])->name('kyluat.index');
        Route::get('create', [KyLuatController::class, 'create'])->name('kyluat.create');
        Route::post('create', [KyLuatController::class, 'store']);
        Route::get('{id}/edit', [KyLuatController::class, 'edit'])->whereNumber('id')->name('kyluat.edit');
        Route::put('{id}/edit', [KyLuatController::class, 'update'])->whereNumber('id')->name('kyluat.update');
        Route::delete('{id}/destroy', [KyLuatController::class, 'destroy'])->whereNumber('id')->name('kyluat.destroy');
    });

    // Danh sach khen thuong cua nhan vien phong nhan su
    Route::prefix('nhansu/khenthuong-canhan')->group(function () {
        Route::get('/', [KhenThuong_CaNhanController::class, 'index'])->name('khenthuong_canhan.index');
        Route::get('create', [KhenThuong_CaNhanController::class, 'create'])->name('khenthuong_canhan.create');
        Route::post('create', [KhenThuong_CaNhanController::class, 'store']);
        Route::get('{id}/edit', [KhenThuong_CaNhanController::class, 'edit'])->whereNumber('id')->name('khenthuong_canhan.edit');
        Route::put('{id}/edit', [KhenThuong_CaNhanController::class, 'update'])->whereNumber('id')->name('khenthuong_canhan.update');
        Route::delete('{id}/destroy', [KhenThuong_CaNhanController::class, 'destroy'])->whereNumber('id')->name('khenthuong_canhan.destroy');
        Route::post('search', [KhenThuong_CaNhanController::class, 'search'])->name('khenthuong_canhan.search');
    });

    // Danh sach ky luat cua nhan vien phong nhan su
    Route::prefix('nhansu/kyluat-canhan')->group(function () {
        Route::get('/', [KyLuat_CaNhanController::class, 'index'])->name('kyluat_canhan.index');
        Route::get('create', [KyLuat_CaNhanController::class, 'create'])->name('kyluat_canhan.create');
        Route::post('create', [KyLuat_CaNhanController::class, 'store']);
        Route::get('{id}/edit', [KyLuat_CaNhanController::class, 'edit'])->whereNumber('id')->name('kyluat_canhan.edit');
        Route::put('{id}/edit', [KyLuat_CaNhanController::class, 'update'])->whereNumber('id')->name('kyluat_canhan.update');
        Route::delete('{id}/destroy', [KyLuat_CaNhanController::class, 'destroy'])->whereNumber('id')->name('kyluat_canhan.destroy');
        Route::post('search', [KyLuat_CaNhanController::class, 'search'])->name('kyluat_canhan.search');
    });
});

// các mục nào viết về nhân viên thì cho route trong này
Route::middleware(['checkNV'])->group(function () {
    // Thong tin ca nhan
    Route::prefix('nhanvien/thongtincanhan')->group(function () {
        Route::get('/', [ThongTinCaNhanController::class, 'index'])->name('canhan.index');
    });
});

// các mục nào viết về nhân viên tài chính thì cho route trong này
Route::middleware(['checkNVTC'])->group(function () {
    
});

// Thong tin ca nhan(dung chung)
Route::prefix('thongtincanhan')->group(function () {
    Route::get('/', [NhanVienController::class, 'index'])->name('canhan.index');
    Route::post('/', [NhanVienController::class, 'addPhoto'])->name('canhan.addPhoto');
    Route::post('update-password', [NhanVienController::class, 'updatePassword'])->name('canhan.updatePassword');
});

// Route::post('upfile', [ThongTinCaNhanController::class, 'upfile'])->name('upfile');
//test qlns
Route::get('/sm', [ThongTinCaNhanController::class, 'index2']);
//Route::get('/sendtextfind',[ThongTinCaNhanController::class,'find2']);
Route::get('/smkhoa', [KhoaController::class, 'index']);
Route::view('/smkhoa2', 'nhansu.danhsachkhoa.quanlykhoa');
Route::view('/sm2', 'nhansu.danhsachnhanvien.danhsachnhanvien');

