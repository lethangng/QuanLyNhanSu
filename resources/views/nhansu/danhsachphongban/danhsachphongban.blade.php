@extends('layouts.app')
@section('content')
        <div class="dspb-main">
            <div class="wrap">
                <div class="dspb-title">
                    <h1>Danh sách phòng ban</h1>
                </div>
                <div class="btn-tpb">
                    <button class="nv">Thêm mới phòng ban</button>
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
                    <input class="input-search-name-1" type="text" placeholder="Nhập tên nhân viên cần tìm">
                   
                </div>
                <div class="list-dspb">
                    <table class="table-dspb table-bordered">
                        <thead>
                          <tr class = "bg-info">
                            <th class="head-table" scope="col">Mã phòng ban</th>
                            <th class="head-table" scope="col">Tên phòng ban</th>
                            <th class="head-table" scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="">
                            <th class="h1" scope="row">1</th>
                            <th class="h1" scope="row">Tài chính</th>
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