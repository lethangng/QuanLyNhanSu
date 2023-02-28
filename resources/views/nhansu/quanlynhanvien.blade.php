@extends('nhansu/manager')
@section('content')
<link rel="stylesheet" href="./css/style4.css">

    <div class="header">
        <h1>Danh sách nhân viên</h1>
    </div>

    <div class="container-btn">
        <button class="btn-add"><a href="{{url('create')}}">Thêm mới nhân viên</a></button>
    </div>
    <form action="{{url('sendtextfind')}}" method="get">
        <div class="container-status">
            <label for="" class="status">Trạng thái:</label>
            <input name="aa" type="radio" value="2" class="inp-stt" />Tất cả
            <input name="aa" type="radio" value="1" class="inp-stt" />Đang làm việc
            <input name="aa" type="radio" value="0" class="inp-stt" />Nghỉ việc
    </div>
    <div class="container-search">
            <label for="" class="search">Tìm kiếm theo:</label>
            <input name="bb" type="radio" value="thongtincanhan.id" class="inp-stt" />Mã nhân viên
            <input name="bb" type="radio" value="thongtincanhan.HoTen" class="inp-stt" />Tên nhân viên
            <input name="bb" type="radio" value="phongban.TenPhongBan" class="inp-stt" />Phòng ban
    </div>

    <div class="input-search" id="bt">
        <input type="text" name="textFind" id="inp-search">
        <button type="submit" class="btn-search" ><i class='bx bx-search icon'></i></button>
    </div>

    </form>

    <div class="container-table">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th class="head-table" scope="col">ID</th>
                <th class="head-table" scope="col">Họ tên</th>
                <th class="head-table" scope="col">Ngày sinh</th>
                <th class="head-table" scope="col">Giới tính</th>
                <th class="head-table" scope="col">CCCD</th>
                <th class="head-table" scope="col">Địa chỉ</th>
                <th class="head-table" scope="col">Phòng ban</th>
                <th class="head-table" scope="col">Chức vụ</th>
                <th class="head-table" scope="col">Khoa</th>
                <th class="head-table" scope="col">Trạng thái</th>
                <th class="head-table" scope="col">Edit</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($caNhan as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->HoTen }}</td>
                <td>{{ $item->NgaySinh }}</td>
                <td>{{ $item->GioiTinh }}</td>
                <td>{{ $item->CCCD }}</td>
                <td>{{ $item->DiaChi }}</td>
                <td>{{ $item->TenPhongBan }}</td>
                <td>{{ $item->TenChucVu }}</td>
                <td>{{ $item->TenKhoa }}</td>
                @if($item->TrangThai==1)
                <td>
                    <input type="checkbox" name="" value="" class="check-box" checked disabled="disabled">
                </td>
                @else
                <td>
                    <input type="checkbox" name="" value="" class="check-box" disabled="disabled">
                </td>
                @endif
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
