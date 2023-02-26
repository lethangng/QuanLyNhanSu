@extends('nhansu/manager')
@section('content')
<link rel="stylesheet" href="./css/style4.css">

    <div class="header">
        <h1>Danh sách nhân viên</h1>
    </div>

    <div class="container-btn">
        <button class="btn-add">Thêm mới nhân viên</button>
    </div>

    <div class="container-status">
        <form action="">
            <label for="" class="status">Trạng thái:</label>
            <input name="" type="radio" value="" class="inp-stt" />Tất cả
            <input name="" type="radio" value="" class="inp-stt" />Đang làm việc
            <input name="" type="radio" value="" class="inp-stt" />Nghỉ việc
        </form>
    </div>
    <div class="container-search">
        <form action="">
            <label for="" class="search">Tìm kiếm theo:</label>
            <input name="" type="radio" value="" class="inp-stt" />Mã nhân viên
            <input name="" type="radio" value="" class="inp-stt" />Tên nhân viên
            <input name="" type="radio" value="" class="inp-stt" />Phòng ban
        </form>
        </form>
    </div>

    <div class="input-search">
        <input type="text" name="" id="inp-search">
        <button class="btn-search" ><i class='bx bx-search icon'></i></button>
    </div>

    <div class="container-table">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th class="head-table" scope="col">ID</th>
                <th class="head-table" scope="col">Mã cá nhân</th>
                <th class="head-table" scope="col">Họ tên</th>
                <th class="head-table" scope="col">Ngày sinh</th>
                <th class="head-table" scope="col">Giới tính</th>
                <th class="head-table" scope="col">CCCD</th>
                <th class="head-table" scope="col">Địa chỉ</th>
                <th class="head-table" scope="col">Phòng ban</th>
                <th class="head-table" scope="col">Chức vụ</th>
                <th class="head-table" scope="col">Khoa</th>
                <th class="head-table" scope="col">Ảnh đại diện</th>
                <th class="head-table" scope="col">Trạng thái</th>
                <th class="head-table" scope="col">User ID</th>
                <th class="head-table" scope="col">Edit</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($caNhan as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->MaCaNhan}}</td>
                <td>{{ $item->HoTen }}</td>
                <td>{{ $item->NgaySinh }}</td>
                <td>{{ $item->GioiTinh }}</td>
                <td>{{ $item->CCCD }}</td>
                <td>{{ $item->DiaChi }}</td>
                <td>{{ $item->PhongBan_id }}</td>
                <td>{{ $item->ChucVu_id }}</td>
                <td>{{ $item->Khoa_id }}</td>
                <td>{{ $item->AnhDaiDien }}</td>
                <td>{{ $item->TrangThai}}</td>
                <td>{{ $item->User_id}}</td>
                <td>
                    <input type="checkbox" name="" value="" class="check-box">
                </td>
                <td>
                    <button class="icon-edit">
                        <i class='bx bx-edit'></i>
                    </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
