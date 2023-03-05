@extends('layouts.app')
@section('title')
    {{ $title ?? 'Danh sách khen thưởng' }}
@endsection
@section('content')
    <div class="dskt-main">
        <div class="wrap">
            <div class="dskt-title">
                <h1>Danh sách khen thưởng</h1>
            </div>
<<<<<<< HEAD
            <div class="btn-tkt">
                <a href="{{ route('khenthuong.create') }}">
                    <button class="nv">
                        Thêm mới khen thưởng
                    </button>
                </a>
=======
            <form action="{{ route('themmoikhenthuong') }}">
                <div class="btn-tkt">
                    <button class="nv">Thêm mới khen thưởng</button>
                </div>
            </form>
            <div class="date">
                <label for="">
                    Tháng
                    <select name="thang" id="">
                        <option value="">MM</option>
                        @for ($i = 1; $i < 13; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </label>
                @php
                    use Carbon\Carbon;
                    $year = Carbon::now()->year;
                @endphp
                <label for="">
                    Năm
                    <select name="nam" id="">
                        <option value="">YYYY</option>
                        @for ($i = 2000; $i <= $year; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </label>
            </div>
>>>>>>> 444951d2f56a3cc52e7360f02dc3c258534504a5

            </div>
            <form action="{{ route('khenthuong.search') }}" method="post">
                @csrf
                <div class="date">
                    <label for="">
                        Tháng
                        <select name="thang">
                            <option value="">MM</option>
                            @for ($i = 1; $i < 13; $i++)
                                <option @isset($data) @selected( $i == (int)$data['thang'])  @endisset
                                    value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </label>
                    @php
                        use Carbon\Carbon;
                        $year = Carbon::now()->year;
                    @endphp
                    <label for="">
                        Năm
                        <select name="nam" id="">
                            <option value="">YYYY</option>
                            @for ($i = 2000; $i <= $year; $i++)
                                <option @isset($data) @selected( $i == (int)$data['nam'])  @endisset
                                    value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </label>
                </div>

                <div class="custom-input">
                    <div class="container-search-reset">
                        <button class="icon-search-1" type="submit">
                            <img src="{{ asset('icon/search.png') }}" alt="">
                        </button>
                        <a href="{{ route('khenthuong.index') }}">
                            <span class="icon-reset-1">
                                <img src="{{ asset('icon/reset.png') }}" alt="">
                            </span>
                        </a>
                    </div>
                    <input class="input-search-name-1" type="text" placeholder="Nhập mã nhân viên cần tìm" name="manv"
                        @isset($data) value="{{ $data['manv'] }}"  @endisset>
                </div>
            </form>


            <div class="list-dskt">
                <table class="table-dskt table-bordered">
                    <thead>
                        <tr class="bg-info">
                            <th class="head-table" scope="col">Mã nhân viên</th>
                            <th class="head-table" scope="col">Tên nhân viên</th>
                            <th class="head-table" scope="col">Ngày khen thưởng</th>
                            <th class="head-table" scope="col">Lý do</th>
                            <th class="head-table" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($khenthuongs as $khenthuong)
                            <tr class="">
                                <th class="h1" scope="row">{{ $khenthuong->manv }}</th>
                                <th class="h1" scope="row">{{ $khenthuong->nhanvien->tennv }}</th>
                                <th class="h1" scope="row">
                                    @php
                                        $newDate = date('d-m-Y', strtotime($khenthuong->ngaykhenthuong));
                                    @endphp
                                    {{ $newDate }}
                                </th>
                                <th class="h1" scope="row">{{ $khenthuong->lydo }}</th>
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <nav aria-label="Page navigation example" class="ml-5">
            {{ $khenthuongs->links('pagination::bootstrap-4') }}
        </nav>
    </div>
@endsection
