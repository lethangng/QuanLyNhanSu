<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhenThuongController;
use App\Http\Controllers\KyLuatController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\KhoaController;
use App\Http\Controllers\TangLuongController;
use App\Http\Controllers\ThongTinController;
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
Route::get('/danhsachnhanvien', [NhanVienController::class, 'index2'])->name('danhsachnhanvien');
/*
Route::get('/danhsachnhanvien', function () {
    return view('nhansu.danhsachnhanvien.danhsachnhanvien');
})->name('danhsachnhanvien');
*/
Route::get('/danhsachchucvu', function () {
    return view('nhansu.danhsachchucvu.danhsachchucvu');
})->name('danhsachchucvu');
/*
Route::get('/danhsachkhoa', function () {
    return view('nhansu.danhsachkhoa.danhsachkhoa');
})->name('danhsachkhoa');
*/
Route::get('/danhsachkhoa', [KhoaController::class, 'index'])->name('danhsachkhoa');

Route::get('/themmoikkhoa', function () {
    return view('nhansu.danhsachkhoa.themmoikhoa');
})->name('themmoikhoa');

Route::get('/suakhoa', function () {
    return view('nhansu.danhsachkhoa.suakhoa');
})->name('suakhoa');

Route::get('/danhsachphongban', function () {
    return view('nhansu.danhsachphongban.danhsachphongban');
})->name('danhsachphongban');

Route::get('/themmoichucvu', function () {
    return view('nhansu.danhsachchucvu.themmoichucvu');
})->name('themmoichucvu');

Route::get('/suachucvu', function () {
    return view('nhansu.danhsachchucvu.suachucvu');
})->name('suachucvu');

Route::get('/index', function () {
    return view('tangluong.index');
})->name('danhsachtangluong');


Route::get('/themmoinhanvien', [NhanVienController::class, 'create'])->name('themmoinhanvien');
Route::post('/themnhanvien', [NhanVienController::class, 'store'])->name('themnhanvien');

Route::post('/xoanhanvien',[NhanVienController::class, 'destroy'])->name('xoanhanvien');
/*
Route::get('/suanhanvien', function () {
    return view('.nhansu.danhsachnhanvien.suanhanvien');
})->name('suanhanvien');
*/
Route::get('suanhanvien/id={id}', [NhanVienController::class, 'edit'])->name('suanhanvien');
Route::post('capnhatnhanvien/id={id}', [NhanVienController::class, 'update'])->name('capnhatnhanvien');

Route::get('/danhsachhopdong', function () {
    return view('hopdong.danhsachhopdong');
})->name('danhsachhopdong');

Route::get('/themmoikhenthuong', function () {
    return view('khenthuong.themmoikhenthuong');
})->name('themmoikhenthuong');

Route::get('/themmoiphongban', function () {
    return view('nhansu.danhsachphongban.themmoiphongban');
})->name('themmoiphongban');

Route::get('/suaphongban', function () {
    return view('nhansu.danhsachphongban.suaphongban');
})->name('suaphongban');

Route::get('/danhsachtrangthai', function () {
    return view('trangthai.danhsachtrangthai');
})->name('danhsachtrangthai');

Route::get('/qlbaocaothongke', function () {
    return view('thongke.qlbaocaothongke');
})->name('qlbaocaothongke');

Route::get('/danhsachtaikhoan', function () {
    return view('taikhoan.danhsachtaikhoan');
})->name('danhsachtaikhoan');

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
    // Route::get('/login/user', function () {
    //     return view('welcome')->name('login.user');
    // });
});

// các mục nào viết về nhân viên thì cho route trong này
Route::middleware(['checkNV'])->group(function () {

});


// Thong tin ca nhan(dung chung)
Route::prefix('thongtincanhan')->group(function () {
    Route::get('{id}', [ThongTinController::class, 'index'])->whereNumber('id')->name('canhan.index');
    Route::post('{id}/add-photo', [ThongTinController::class, 'addPhoto'])->whereNumber('id')->name('canhan.addPhoto');
    Route::post('update-password', [ThongTinController::class, 'updatePassword'])->name('canhan.updatePassword');
});

// Danh sach khen thuong
Route::prefix('khenthuong')->group(function () {
    Route::get('/', [KhenThuongController::class, 'index'])->name('khenthuong.index');
    Route::get('create', [KhenThuongController::class, 'create'])->name('khenthuong.create');
    Route::post('create', [KhenThuongController::class, 'store'])->name('khenthuong.store');
    Route::get('{id}/edit', [KhenThuongController::class, 'edit'])->whereNumber('id')->name('khenthuong.edit');
    Route::put('{id}/edit', [KhenThuongController::class, 'update'])->whereNumber('id')->name('khenthuong.update');
    Route::delete('{id}/destroy', [KhenThuongController::class, 'destroy'])->whereNumber('id')->name('khenthuong.destroy');
    Route::post('search', [KhenThuongController::class, 'search'])->name('khenthuong.search');
});
//ajax 
Route::post('/ajax_tennv', [KhenThuongController::class, 'findNameNv']);

// Danh sach ky luat
Route::prefix('kyluat')->group(function () {
    Route::get('/', [KyLuatController::class, 'index'])->name('kyluat.index');
    Route::get('create', [KyLuatController::class, 'create'])->name('kyluat.create');
    Route::post('create', [KyLuatController::class, 'store'])->name('kyluat.store');
    Route::get('{id}/edit', [KyLuatController::class, 'edit'])->whereNumber('id')->name('kyluat.edit');
    Route::put('{id}/edit', [KyLuatController::class, 'update'])->whereNumber('id')->name('kyluat.update');
    Route::delete('{id}/destroy', [KyLuatController::class, 'destroy'])->whereNumber('id')->name('kyluat.destroy');
    Route::post('search', [KyLuatController::class, 'search'])->name('kyluat.search');
});

// Danh sach tăng lương
Route::prefix('tangluong')->group(function () {
    Route::get('/', [TangLuongController::class, 'index'])->name('tangluong.index');
    Route::get('create', [TangLuongController::class, 'create'])->name('tangluong.create');
    Route::post('create', [TangLuongController::class, 'store'])->name('tangluong.store');
    Route::get('{id}/edit', [TangLuongController::class, 'edit'])->whereNumber('id')->name('tangluong.edit');
    Route::put('{id}/edit', [TangLuongController::class, 'update'])->whereNumber('id')->name('tangluong.update');
    Route::delete('{id}/destroy', [TangLuongController::class, 'destroy'])->whereNumber('id')->name('tangluong.destroy');
    Route::post('search', [TangLuongController::class, 'search'])->name('tangluong.search');
});
// Route::post('upfile', [ThongTinCaNhanController::class, 'upfile'])->name('upfile');


//test qlns
Route::get('/sm', [NhanvienController::class, 'index2']);
//Route::get('/sendtextfind',[ThongTinCaNhanController::class,'find2']);
Route::get('/smkhoa', [KhoaController::class, 'index']);
Route::view('/smkhoa2', 'nhansu.danhsachkhoa.quanlykhoa');
Route::view('/sm2', 'nhansu.danhsachnhanvien.danhsachnhanvien');






