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

