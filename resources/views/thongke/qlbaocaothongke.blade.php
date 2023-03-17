@extends('layouts.app')
@section('content')
    <div class="qlbaocao-main">
        <div class="wrap">
            <div class="qlbaocao-title">
                <h1>Quản lý báo cáo thống kê</h1>
            </div>
            <div class="container">
                <div class="row top">
                    <div class="col left">
                        <a href="{{ route('thongkenhanvien') }}">
                            <div class="container-icon-thongke">
                                <span class="icon-thongke">
                                    <img src="{{ asset('icon/icon-thongke-1.png') }}" alt="">
                                </span>
                                <h4>Thống kê nhân viên</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col right">
                        <a href="">
                            <div class="container-icon-thongke">
                                <span class="icon-thongke">
                                    <img src="{{ asset('icon/icon-thongke-1.png') }}" alt="">
                                </span>
                                <h4>Thống kê khen thưởng</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 mid">
                        <a href="">
                            <div class="container-icon-thongke">
                                <span class="icon-thongke">
                                    <img src="{{ asset('icon/icon-thongke-1.png') }}" alt="">
                                </span>
                                <h4>Thống kê kỷ luật</h4>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row bot">
                    {{-- <div class="col left">
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
                    </div> --}}
                    <div class="col-4 mid">
                        <a href="{{ route('thongke.tangluong') }}">
                            <div class="container-icon-thongke">
                                <span class="icon-thongke">
                                    <img src="{{ asset('icon/icon-thongke-1.png') }}" alt="">
                                </span>
                                <h4>Thống kê tăng lương</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col right">
                        <a href="{{ route('thongke.hopdong') }}">
                            <div class="container-icon-thongke">
                                <span class="icon-thongke">
                                    <img src="{{ asset('icon/icon-thongke-1.png') }}" alt="">
                                </span>
                                <h4>Thống kê hợp đồng</h4>
                            </div>
                        </a>
                    </div>
                    {{-- <div class="col-4 mid">
                        <form action="{{ route('thongke.hopdong') }}" method="post">
>>>>>>> 069a48bd0c239553ca5d39d248fba1b6823afd59
                            <input type="text" name="nam" value="{{ $year_now }}" hidden>
                            @csrf
                            <button type="submit" class="container-icon-thongke">
                                <span class="icon-thongke-5">
                                    <img src="{{ asset('icon/icon-thongke-1.png') }}" alt="">
                                </span>
                                <h4>Thống kê hợp đồng</h4>
                            </button>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
