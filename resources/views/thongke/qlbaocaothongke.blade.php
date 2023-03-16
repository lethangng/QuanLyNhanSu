@extends('layouts.app')
@section('content')
    <div class="qlbaocao-main">
        <div class="wrap">
            <div class="qlbaocao-title">
                <h1>Quản lý báo cáo thống kê</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-4 left">
                        <a href="{{ route('thongkenhanvien') }}">
                            <div class="container-icon-thongke">
                                <span class="icon-thongke">
                                    <img src="{{ asset('icon/icon-thongke-1.png') }}" alt="">
                                </span>
                                <h4>Thống kê nhân viên</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 mid">
                        <a href="">
                            <div class="container-icon-thongke">
                                <span class="icon-thongke">
                                    <img src="{{ asset('icon/icon-thongke-1.png') }}" alt="">
                                </span>
                                <h4>Thống kê khen thưởng</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 left">
                        <form action="{{ route('thongketangluong') }}" method="post">
                            @php
                                use Carbon\Carbon;
                                $year_now = Carbon::now()->year;
                            @endphp
                            <input type="text" name="nam" value="{{ $year_now }}" hidden>
                            @csrf
                            <button type="submit" class="container-icon-thongke">
                                <span class="icon-thongke-5">
                                    <img src="{{ asset('icon/icon-thongke-1.png') }}" alt="">
                                </span>
                                <h4>Thống kê tăng lương</h4>
                            </button>
                        </form>
                    </div>
                    <div class="col-4 mid">
                        <form action="{{ route('thongkehopdong') }}" method="post">
                            <input type="text" name="nam" value="{{ $year_now }}" hidden>
                            @csrf
                            <button type="submit" class="container-icon-thongke">
                                <span class="icon-thongke-5">
                                    <img src="{{ asset('icon/icon-thongke-1.png') }}" alt="">
                                </span>
                                <h4>Thống kê hợp đồng</h4>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
