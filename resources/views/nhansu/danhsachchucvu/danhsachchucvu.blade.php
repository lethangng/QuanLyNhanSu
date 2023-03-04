@extends('layouts.app')
@section('content')
        <div class="dscv-main">
            <div class="wrap">
                <div class="dscv-title">
                    <h1>Danh sách chức vụ</h1>
                </div>
                <div class="btn-tcv">
                    <button class="nv">Thêm mới chức vụ</button>
                </div>


                <div class="custom-input">
                    <span class="icon-reset-1">
                        <img src="{{ asset('icon/reset.png') }}" alt="">
                    </span>
                    <span class="icon-search-1">
                        <img src="{{ asset('icon/search.png') }}" alt="">
                    </span>
                   
                    <input class="input-search-name-1" type="text" placeholder="Nhập tên nhân viên cần tìm">
                   
                </div>
                <div class="list-dscv">
                    <table class="table-dscv table-bordered">
                        <thead>
                          <tr class = "bg-info">
                            <th class="head-table" scope="col">Mã chức vụ</th>
                            <th class="head-table" scope="col">Tên chứ vụ</th>
                            <th class="head-table" scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="">
                            <th class="h1" scope="row">1</th>
                            <th class="h1" scope="row">Giám đốc</th>
                            <th class="h1" scope="row">
                                <button class="i-edit">
                                    <i class='bx bx-edit'></i>
                                </button>
                                <button class="i-rotate">
                                    <i class='bx bx-trash'></i>
                                </button>
                                
                            </th>
                          </tr>
                          <tr class="">
                            <th class="h1" scope="row">2</th>
                            <th class="h1" scope="row">Phó giám đốc</th>
                            <th class="h1" scope="row">
                                <button class="i-edit">
                                    <i class='bx bx-edit'></i>
                                </button>
                                <button class="i-rotate">
                                    <i class='bx bx-trash'></i>
                                </button>
                                
                            </th>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection