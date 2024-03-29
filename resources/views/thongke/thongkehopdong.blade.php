@extends('layouts.app')
@section('content')
    <div class="qlbaocao-main">
        <div class="wrap">
            <div class="qlbaocao-title">
                <h1>Quản lý báo cáo thống kê</h1>
            </div>
            <div class="container tkhd">
                <h4>Thống kê hợp đồng</h4>

                <form class="form-tkhd" action="{{ route('thongkehopdong') }}" method="POST">
                    @csrf
                    <label class="nam" for="">Năm:</label>
                    <div>
                        <input class="inp-nam" type="number" placeholder="Nhập năm" name="nam"
                            value="{{ $nam ?? '' }}" required>
                        @error('nam')
                            <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn-tkkd" type="submit">
                        <span class="icon-search-tkhd">
                            <img src="{{ asset('icon/search.png') }}">
                        </span>
                    </button>
                </form>
                <div class="row">
                    <div class="col left-tkhd">
                        <div id="piechart" style="width: 600px; height: 400px; background-color: #E4E9F7"></div>
                    </div>
                    <div class="col right-tkhd">
                        <div class="list-tkhd">
                            <h4>Danh sách các hợp đồng đã hết hạn năm {{ $nam }}</h4>
                            <div class="row">
                                <table class="table table-tkhd-1 table-bordered table-fixed">
                                    <thead>
                                        <tr>
                                            <th class="col" scope="col">Mã nhân viên</th>
                                            <th class="col" scope="col">Tên nhân viên</th>
                                            <th class="col" scope="col">Mã hợp đồng</th>
                                            <th class="col" scope="col">Ngày hết hạn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hopdongs as $hopdong)
                                                <tr class="">
                                                    <td class="col" scope="row">{{ $hopdong->manv }}</td>
                                                    <td class="col" scope="row">{{ $hopdong->nhanvien->tennv }}</td>
                                                    <td class="col" scope="row">{{ $hopdong->id }}</td>
                                                    <td class="col" scope="row">
                                                        @if ($hopdong->ngayketthuc)
                                                            @php
                                                                $newEndDate = date('d-m-Y', strtotime($hopdong->ngayketthuc));
                                                            @endphp
                                                            {{ $newEndDate }}
                                                        @endif
                                                    </td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    {{ 'Thống kê hợp đồng' }}
@endsection
@section('script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(@json($data));

            var options = {
                title: 'Thống kê hợp đồng của nhân viên năm {{ $nam }}',
                // pieHole: 0.4,
                'colors': ['#F40C0C', '#4A6EEB']
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
@endsection
