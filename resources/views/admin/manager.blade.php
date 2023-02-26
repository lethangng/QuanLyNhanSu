@extends('layouts.app')
@section('content')
     <!--content-->
     <div class="title-header">
        <h1>Danh sách tài khoản</h1>
    </div>
    <div class="container">
        
        <div class="content">
            <button class="button button1">Thêm tài khoản</button>
            <div class="container-search">
                <input class="inp-search" placeholder="Nhập tài khoản cần tìm">
                <button class = "btn-icon"><i class='bx bx-search'></i></button>
            </div>

            <div class="container-table">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th class="head-table" scope="col">Mã nhân viên</th>
                        <th class="head-table" scope="col">Tên tài khoản</th>
                        <th class="head-table" scope="col">Quyền</th>
                        <th class="head-table" scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th class="number-table" scope="row">1</th>
                        <td>Admin</td>
                        <td>Admin</td>
                        <td>
                            <button class="icon-edit"><i class='bx bx-edit'></i></button>
                            <button class="icon-delete"><i class='bx bxs-trash-alt'></i></button>
                        </td>
                      </tr>
                      <tr>
                        <th class="number-table" scope="row">2</th>
                        <td>Nhân sự</td>
                        <td>Phòng nhân sự</td>
                        <td>
                            <button class="icon-edit"><i class='bx bx-edit'></i></button>
                            <button class="icon-delete"><i class='bx bxs-trash-alt'></i></button>
                        </td>
                      </tr>
                      <tr>
                        <th class="number-table" scope="row">3</th>
                        <td>Long</td>
                        <td>Nhân viên</td>
                        <td>
                            <button class="icon-edit"><i class='bx bx-edit'></i></button>
                            <button class="icon-delete"><i class='bx bxs-trash-alt'></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
        <!---->
@endsection
           
   