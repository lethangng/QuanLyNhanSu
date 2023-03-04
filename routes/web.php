<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhenThuongController;
use App\Http\Controllers\KyLuatController;
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

// Danh sach khen thuong 
Route::prefix('khenthuong')->group(function () {
    Route::get('/', [KhenThuongController::class, 'index'])->name('khenthuong.index');
    Route::get('create', [KhenThuongController::class, 'create'])->name('khenthuong.create');
    Route::post('create', [KhenThuongController::class, 'store']);
    Route::get('{id}/edit', [KhenThuongController::class, 'edit'])->whereNumber('id')->name('khenthuong.edit');
    Route::put('{id}/edit', [KhenThuongController::class, 'update'])->whereNumber('id')->name('khenthuong.update');
    Route::delete('{id}/destroy', [KhenThuongController::class, 'destroy'])->whereNumber('id')->name('khenthuong.destroy');
    Route::post('search', [KhenThuongController::class, 'search'])->name('khenthuong.search');
});

// Danh sach ky luat 
Route::prefix('kyluat')->group(function () {
    Route::get('/', [KyLuatController::class, 'index'])->name('kyluat.index');
    Route::get('create', [KyLuatController::class, 'create'])->name('kyluat.create');
    Route::post('create', [KyLuatController::class, 'store']);
    Route::get('{id}/edit', [KyLuatController::class, 'edit'])->whereNumber('id')->name('kyluat.edit');
    Route::put('{id}/edit', [KyLuatController::class, 'update'])->whereNumber('id')->name('kyluat.update');
    Route::delete('{id}/destroy', [KyLuatController::class, 'destroy'])->whereNumber('id')->name('kyluat.destroy');
    Route::post('search', [KyLuatController::class, 'search'])->name('kyluat.search');
});




// Route::post('upfile', [ThongTinCaNhanController::class, 'upfile'])->name('upfile');
//test qlns
Route::get('/sm', [ThongTinCaNhanController::class, 'index2']);
//Route::get('/sendtextfind',[ThongTinCaNhanController::class,'find2']);
Route::get('/smkhoa', [KhoaController::class, 'index']);
Route::view('/smkhoa2', 'nhansu.danhsachkhoa.quanlykhoa');
Route::view('/sm2', 'nhansu.danhsachnhanvien.danhsachnhanvien');

