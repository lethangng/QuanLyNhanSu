<?php

use App\Http\Controllers\HopDongController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ThongKeHDController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhenThuongController;
use App\Http\Controllers\KyLuatController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\KhoaController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\TangLuongController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\PhongBanController;
use App\Http\Controllers\ThongTinController;
use App\Http\Controllers\TrangThaiController;
use Illuminate\Routing\Router;
use App\Http\Controllers\ThongKeTLController;

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

Route::middleware(['checklogin'])->group(function () {


    Route::get('/danhsachnhanvien', [NhanVienController::class, 'index2'])->name('danhsachnhanvien');
    Route::get('locphongban/id={id}', [NhanVienController::class, 'locphongban'])->name('locphongban');
    Route::get('locchucvu/id={id}', [NhanVienController::class, 'locchucvu'])->name('locchucvu');
    Route::get('lockhoa/id={id}', [NhanVienController::class, 'lockhoa'])->name('lockhoa');
    Route::get('timnhanvien/tennv={name}', [NhanVienController::class, 'timnhanvien'])->name('timnhanvien');
    /*
Route::get('/danhsachnhanvien', function () {
    return view('nhansu.danhsachnhanvien.danhsachnhanvien');
})->name('danhsachnhanvien');
*/

    /*
Route::get('/danhsachchucvu', function () {
    return view('nhansu.danhsachchucvu.danhsachchucvu');
})->name('danhsachchucvu');
*/
    Route::get('/danhsachchucvu', [ChucVuController::class, 'index'])->name('danhsachchucvu');
    Route::get('timkiemchucvu/tenchucvu={name}', [ChucVuController::class, 'timchucvu'])->name('timkiemchucvu');
    /*
Route::get('/danhsachkhoa', function () {
    return view('nhansu.danhsachkhoa.danhsachkhoa');
})->name('danhsachkhoa');
*/
    Route::get('/danhsachkhoa', [KhoaController::class, 'index'])->name('danhsachkhoa');
    Route::get('timkiemkhoa/tenkhoa={name}', [KhoaController::class, 'timkhoa'])->name('timkiemkhoa');
    Route::get('/themmoikkhoa', function () {
        return view('nhansu.danhsachkhoa.themmoikhoa');
    })->name('themmoikhoa');
    Route::post('/themkhoa', [KhoaController::class, 'store'])->name('themkhoa');
    /*
Route::get('/suakhoa', function () {
    return view('nhansu.danhsachkhoa.suakhoa');
})->name('suakhoa');
*/
    Route::get('suakhoa/id={id}', [KhoaController::class, 'edit'])->name('suakhoa');
    Route::post('capnhatkhoa/id={id}', [KhoaController::class, 'update'])->name('capnhatkhoa');
    Route::post('/xoakhoa', [KhoaController::class, 'destroy'])->name('xoakhoa');
    /*
Route::get('/danhsachphongban', function () {
    return view('nhansu.danhsachphongban.danhsachphongban');
})->name('danhsachphongban');
*/
    Route::get('/danhsachphongban', [PhongBanController::class, 'index'])->name('danhsachphongban');
    Route::get('timkiemphongban/tenphongban={name}', [PhongBanController::class, 'timphongban'])->name('timkiemphongban');


    Route::get('/themmoichucvu', function () {
        return view('nhansu.danhsachchucvu.themmoichucvu');
    })->name('themmoichucvu');


    Route::post('/themchucvu', [ChucVuController::class, 'store'])->name('themchucvu');
    Route::get('suachucvu/id={id}', [ChucVuController::class, 'edit'])->name('suachucvu');
    Route::post('capnhatchucvu/id={id}', [ChucVuController::class, 'update'])->name('capnhatchucvu');
    Route::post('/xoachucvu', [ChucVuController::class, 'destroy'])->name('xoachucvu');
    /*
Route::get('/suachucvu', function () {
    return view('nhansu.danhsachchucvu.suachucvu');
})->name('suachucvu');
*/
    Route::get('/themmoinhanvien', [NhanVienController::class, 'create'])->name('themmoinhanvien');
    Route::post('/themnhanvien', [NhanVienController::class, 'store'])->name('themnhanvien');

    Route::post('/xoanhanvien', [NhanVienController::class, 'destroy'])->name('xoanhanvien');
    /*
Route::get('/suanhanvien', function () {
    return view('.nhansu.danhsachnhanvien.suanhanvien');
})->name('suanhanvien');
*/
    Route::get('suanhanvien/id={id}', [NhanVienController::class, 'edit'])->name('suanhanvien');
    Route::post('capnhatnhanvien/id={id}', [NhanVienController::class, 'update'])->name('capnhatnhanvien');
    Route::get('/themmoiphongban', function () {
        return view('nhansu.danhsachphongban.themmoiphongban');
    })->name('themmoiphongban');
    Route::post('/themphongban', [PhongBanController::class, 'store'])->name('themphongban');

    /*
Route::get('/suaphongban', function () {
    return view('nhansu.danhsachphongban.suaphongban');
})->name('suaphongban');
*/
    Route::get('suaphongban/id={id}', [PhongBanController::class, 'edit'])->name('suaphongban');
    Route::post('capnhatphongban/id={id}', [PhongBanController::class, 'update'])->name('capnhatphongban');
    Route::post('/xoaphongban', [PhongBanController::class, 'destroy'])->name('xoaphongban');
    Route::prefix('danhsachtrangthai')->group(function () {
        Route::get('/', [TrangThaiController::class, 'index'])->name('danhsachtrangthai');

        Route::post('/xoa', [TrangThaiController::class, 'del'])->name('xoatrangthai');

        Route::post('/tim', [TrangThaiController::class, 'search']);
        Route::get('/tim', [TrangThaiController::class, 'searchAll']);

        Route::get('/them', [TrangThaiController::class, 'formAdd'])->name('themmoitrangthai');
        Route::post('/them', [TrangThaiController::class, 'Add']);

        Route::get('/sua', [TrangThaiController::class, 'formUpdate'])->name('suatrangthai');

        Route::post('/sua', [TrangThaiController::class, 'Update']);
    });


    Route::prefix('danhsachtaikhoan')->group(function () {
        Route::get('/', [TaiKhoanController::class, 'index'])->name('danhsachtaikhoan');

        Route::get('/them', [TaiKhoanController::class, 'formAdd'])->name('themmoitaikhoan');
        Route::post('/them', [TaiKhoanController::class, 'Add']);

        Route::get('/sua', [TaiKhoanController::class, 'formUpdate'])->name('suataikhoan');
        Route::post('/sua', [TaiKhoanController::class, 'Update']);

        Route::post('/xoa', [TaiKhoanController::class, 'del'])->name('xoataikhoan');

        Route::post('/tim', [TaiKhoanController::class, 'search']);
        Route::get('/tim', [TaiKhoanController::class, 'searchAll']);

        Route::post('/timten', [TaiKhoanController::class, 'findNameNv']);
    });

    Route::get('/qlbaocaothongke', function () {
        return view('thongke.qlbaocaothongke');
    })->name('qlbaocaothongke');

    Route::get('/thongkenhanvien', [NhanVienController::class, 'thongkenhanvien'])->name('thongkenhanvien');





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
        Route::post('ajax_tennv', [KyLuatController::class, 'findNameNvKyLuat'])->name('kyluat.findNameNv');
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

    // Danh sach hợp đồng
    Route::prefix('hopdong')->group(function () {
        Route::get('/', [HopDongController::class, 'index'])->name('hopdong.index');
        Route::get('create', [HopDongController::class, 'create'])->name('hopdong.create');
        Route::post('create', [HopDongController::class, 'store'])->name('hopdong.store');
        Route::get('{id}/edit', [HopDongController::class, 'edit'])->whereNumber('id')->name('hopdong.edit');
        Route::put('{id}/edit', [HopDongController::class, 'update'])->whereNumber('id')->name('hopdong.update');
        Route::delete('{id}/destroy', [HopDongController::class, 'destroy'])->whereNumber('id')->name('hopdong.destroy');
        Route::post('search', [HopDongController::class, 'search'])->name('hopdong.search');
    });
    // Route::post('upfile', [ThongTinCaNhanController::class, 'upfile'])->name('upfile');
    Route::get('thong-ke-hop-dong', [ThongKeHDController::class, 'index'])->name('thongke.hopdong');
    Route::get('thong-ke-tang-luong', [ThongKeTLController::class, 'index'])->name('thongke.tangluong');
    // Thống kê
    Route::post('thong-ke-hop-dong', [ThongKeHDController::class, 'thongke'])->name('thongkehopdong');
    Route::Post('thong-ke-tang-luong', [ThongKeTLController::class, 'thongke'])->name('thongketangluong');


    //test qlns
    Route::get('/sm', [NhanvienController::class, 'index2']);
    //Route::get('/sendtextfind',[ThongTinCaNhanController::class,'find2']);
    Route::get('/smkhoa', [KhoaController::class, 'index']);
    Route::view('/smkhoa2', 'nhansu.danhsachkhoa.quanlykhoa');
    Route::view('/sm2', 'nhansu.danhsachnhanvien.danhsachnhanvien');
});


Route::get('/', [loginController::class, "home"])->name('login');
Route::post('/', [loginController::class, "submitLogin"])->name('submitLogin');

Route::post('/fogotPassword', [loginController::class, "fogotPassword"])->name('fogotPassword');

Route::get('/fogotPassword/{id}/{token}', [loginController::class, "formFogotPassword"])->name('formFogotPassword');
Route::post('/fogotPassword/{id}/{token}', [loginController::class, "postFormFogotPassword"])->name('postFormFogotPassword');
