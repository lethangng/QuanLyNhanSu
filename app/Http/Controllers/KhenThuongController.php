<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhenThuong;
use App\Http\Requests\KhenThuongRequest;

class KhenThuongController extends Controller
{
    public function index() {
        $title = 'Quản lý khen thưởng';
        $khenthuongs = KhenThuong::paginate(5);
        return view('nhansu.khenThuong.index', compact('khenthuongs', 'title'));
    }

    public function create() {
        $title = 'Thêm mới khen thưởng';
        return view('nhansu.khenThuong.create', compact('title'));
    }

    public function store(KhenThuongRequest $request) {
        KhenThuong::create([
            'TenKhenThuong' => $request->TenKhenThuong,
            'TienThuong' => $request->TienThuong
        ]);
        return redirect()->route('khenthuong.index');
    }

    public function edit($id) {
        $khenthuong = KhenThuong::find($id);
        $title = 'Cập nhập khen thưởng';
        // dd($khenthuong);
        return view('nhansu.khenThuong.edit', compact('khenthuong', 'title'));
    }

    public function update(KhenThuongRequest $request, $id) {
        KhenThuong::where('id', $id)
        ->update([
            'TenKhenThuong' => $request->TenKhenThuong,
            'TienThuong' => $request->TienThuong,
        ]);
        return redirect()->route('khenthuong.index');
    }

    public function destroy($id)
    {
        KhenThuong::where('id', $id)->delete();
        return redirect()->route('khenthuong.index');
    }
}
