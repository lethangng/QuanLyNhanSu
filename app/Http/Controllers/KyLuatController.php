<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KyLuat;
use App\Http\Requests\KyLuatRequest;

class KyLuatController extends Controller
{
    public function index() {
        $title = 'Quản lý kỷ luật';
        $kyluats = KyLuat::paginate(5);
        return view('nhansu.kyLuat.index', compact('kyluats', 'title'));
    }
    
    public function create() {
        $title = 'Thêm mới kỷ luật';
        return view('nhansu.kyLuat.create', compact('title'));
    }

    public function store(KyLuatRequest $request) {
        KyLuat::create([
            'TenKyLuat' => $request->TenKyLuat,
            'TienPhat' => $request->TienPhat
        ]);
        return redirect()->route('kyLuat.index');
    }

    public function edit($id) {
        $kyluat = KyLuat::find($id);
        $title = 'Cập nhập kỷ luật';
        // dd($kyLuat);
        return view('nhansu.kyLuat.edit', compact('kyluat', 'title'));
    }

    public function update(KyLuatRequest $request, $id) {
        KyLuat::where('id', $id)
        ->update([
            'TenKyLuat' => $request->TenKyLuat,
            'TienPhat' => $request->TienPhat,
        ]);
        return redirect()->route('kyLuat.index');
    }

    public function destroy($id)
    {
        KyLuat::where('id', $id)->delete();
        return redirect()->route('kyLuat.index');
    }
}
