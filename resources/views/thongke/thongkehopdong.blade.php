@extends('layouts.app')
@section('content')
    <div class="qlbaocao-main">
        <div class="wrap">
            <div class="qlbaocao-title">
                <h1>Quản lý báo cáo thống kê</h1>
            </div>
            <div class="container">
                <form action="{{ route('thongkehopdong') }}" method="POST">
                    @csrf
                    <label for="">Năm</label>
                    <input type="text" placeholder="Nhập năm" name="nam">
                    <button type="submit">Tìm kiếm</button>
                </form>
                <div id="piechart" style="width: 900px; height: 500px;"></div>
                <div class="list-dskt">
                    <h1>Danh sách các hợp đồng đã hết hạn năm {{ $nam }}</h1>
                    <table class="table-dskt table-bordered">
                        <thead>
                            <tr class="bg-info">
                                <th class="head-table" scope="col">Mã nhân viên</th>
                                <th class="head-table" scope="col">Tên nhân viên</th>
                                <th class="head-table" scope="col">Mã hợp đồng</th>
                                <th class="head-table" scope="col">Ngày hết hạn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hopdongs as $hopdong)
                                <tr class="">
                                    <th class="h1" scope="row">{{ $hopdong->manv }}</th>
                                    <th class="h1" scope="row">{{ $hopdong->nhanvien->tennv }}</th>
                                    <th class="h1" scope="row">{{ $hopdong->id }}</th>
                                    <th class="h1" scope="row">
                                        @if ($hopdong->ngayketthuc)
                                            @php
                                                $newEndDate = date('d-m-Y', strtotime($hopdong->ngayketthuc));
                                            @endphp
                                            {{ $newEndDate }}
                                        @endif
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
@endsection
