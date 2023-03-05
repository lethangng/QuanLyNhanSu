@extends('layouts.app')
@section('content')
        <div class="dshd-main">
            <div class="wrap">
                <div class="dshd-title">
                    <h1>Danh sách hợp đồng lao động</h1>
                </div>
                <div class="btn-tmhd">
                    <button class="nv">Thêm mới hợp đồng</button>
                </div>
                <div class="date">
                    <label for="">
                        Tháng
                        <select name="" id="">
                            <option value=""></option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                            <option value="">7</option>
                            <option value="">8</option>
                            <option value="">9</option>
                            <option value="">10</option>
                            <option value="">11</option>
                            <option value="">12</option>
                        </select>
                    </label>

                    <label for="">
                        Năm
                        <select name="" id="">
                            <option value=""></option>
                            <option value="">Năm 2016</option>
                            <option value="">Năm 2017</option>
                            <option value="">Năm 2018</option>
                            <option value="">Năm 2019</option>
                        </select>
                    </label>
                </div>

                <div class="custom-input">
                    <div class="container-search-reset">
                        <span class="icon-reset-1">
                            <img src="{{ asset('icon/reset.png') }}" alt="">
                        </span>
                        <span class="icon-search-1">
                            <img src="{{ asset('icon/search.png') }}" alt="">
                        </span>
                    </div>
                    <input class="input-search-name-1" type="text" placeholder="Nhập mã nhân viên cần tìm">
                   
                </div>
                <div class="list-dshd">
                    <table class="table-dshd table-bordered">
                        <thead>
                          <tr class = "bg-info">
                            <th class="head-table" scope="col">Mã hợp đồng</th>
                            <th class="head-table" scope="col">Mã nhân viên</th>
                            <th class="head-table" scope="col">Tên nhân viên</th>
                            <th class="head-table" scope="col">Ngày bắt đầu</th>
                            <th class="head-table" scope="col">Ngày kết thúc</th>
                            <th class="head-table" scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="">
                            <th class="h1" scope="row">1</th>
                            <th class="h1" scope="row">1</th>
                            <th class="h1" scope="row">Vũ Trí Thành</th>
                            <th class="h1" scope="row">10/10/2020</th>
                            <th class="h1" scope="row">12/10/2020</th>
                            <th class="h1" scope="row">
                                <button class="i-save">
                                    <img src="{{ asset('icon/save.png') }}" alt="">
                                </button>
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