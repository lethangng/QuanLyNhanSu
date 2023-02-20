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
                <th class="head-table" scope="col">Mã giảng viên</th>
                <th class="head-table" scope="col">Họ tên</th>
                <th class="head-table" scope="col">Tên tài khoản</th>
                <th class="head-table" scope="col">CMND</th>
                <th class="head-table" scope="col">Giới tính</th>
                <th class="head-table" scope="col">Chức vụ</th>
                <th class="head-table" scope="col">Tên phòng ban</th>
                <th class="head-table" scope="col">Khoa</th>
                <th class="head-table" scope="col">Trạng thái</th>
                <th class="head-table" scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th class="number-table" scope="row">1</th>
                <td>Vũ Trí Thành</td>
                <td>ThanhVu</td>
                <td>12323232</td>
                <td>Nam</td>
                <td>Nhân viên</td>
                <td>Phòng CNTT</td>
                <td>CNTT</td>
                <td>
                    <input type="checkbox" name="" value="" class="check-box">
                </td> 
                <td>
                    <button class="icon-edit">
                        <i class='bx bx-edit'></i>
                    </button>
                </td>
              </tr>
              <tr>
                <th class="number-table" scope="row">2</th>
                <td>Vũ Trí Thành</td>
                <td>ThanhVu</td>
                <td>12323232</td>
                <td>Nam</td>
                <td>Nhân viên</td>
                <td>Phòng CNTT</td>
                <td>CNTT</td>
                <td>
                    <input type="checkbox" name="" value="" class="check-box">
                </td> 
                <td>
                    <button class="icon-edit">
                        <i class='bx bx-edit'></i>
                    </button>
                </td>
              </tr>
              <tr>
                <th class="number-table" scope="row">3</th>
                <td>Vũ Trí Thành</td>
                <td>ThanhVu</td>
                <td>12323232</td>
                <td>Nam</td>
                <td>Nhân viên</td>
                <td>Phòng CNTT</td>
                <td>CNTT</td>
                <td>
                    <input type="checkbox" name="" value="" class="check-box">
                </td> 
                <td>
                    <button class="icon-edit">
                        <i class='bx bx-edit'></i>
                    </button>
                </td>
              </tr>
            </tbody>
          </table>
    </div>
@endsection