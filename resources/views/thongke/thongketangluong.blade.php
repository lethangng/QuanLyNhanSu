@extends('layouts.app')
@section('content')
    <div class="qlbaocao-main">
        <div class="wrap">
            <div class="qlbaocao-title">
                <h1>Quản lý báo cáo thống kê</h1>
            </div>
            <div class="container tkhd">
                <h4>Thống kê hợp đồng</h4>

                <form class="form-tkhd" action="{{ route('thongketangluong') }}" method="POST">
                    @csrf
                    <label class="nam" for="">Năm:</label>
                    <div>
                        <input class="inp-nam" type="number" placeholder="Nhập năm" name="nam" required>
                        @error('nam')
                            <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn-tkkd">
                        <span class="icon-search-tkhd">
                            <img src="{{ asset('icon/search.png') }}">
                        </span>
                    </button>
                </form>
                <div class="row">
                    <div class="col left-tkhd">
                        <!-- Create a container for the chart -->
                        <div id="chart_div"></div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('title')
        {{ 'Thống kê tăng lương' }}
    @endsection
    @section('script')
        <!-- Load the Google Charts library -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            // Load the Visualization API and the corechart package.
            google.charts.load('current', {
                'packages': ['corechart']
            });

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                // Define the chart data
                var data = google.visualization.arrayToDataTable(@json($data));

                // Define the chart options
                var options = {
                    'title': 'Thống kê tăng lương của năm {{ $nam }}',
                    'height': 500,
                    // 'width': 600,
                    // 'legend': 'none'
                };

                // Create the chart and draw it in the container
                var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
    @endsection
