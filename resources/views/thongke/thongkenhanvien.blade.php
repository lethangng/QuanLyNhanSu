@extends('layouts.app')
@section('content')
    <div class="qlbaocao-main">
        <div class="wrap">
            <div class="qlbaocao-title">
                <h1>Quản lý báo cáo thống kê</h1>
            </div>
            <div class="container tkhd">
                <h4>Thống kê nhân viên</h4>

                <div class="d-flex justify-content-end">
                <div class="p-2"><div id="donutchart" style="width: 400px; height: 400px;"></div></div>
                <div class="p-2"><div id="donutchart2" style="width: 400px; height: 400px;"></div></div>
                <div class="p-2"><div id="donutchart3" style="width: 400px; height: 400px;"></div></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['tenchucvu', 'sochucvu'],
          @php
          echo $chartData
          @endphp
        ]);

        var options = {
          title: 'Chức vụ nhân viên',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['tentrangthai', 'sotrangthai'],
          @php
          echo $chartData2
          @endphp
        ]);

        var options = {
          title: 'Trạng thái nhân viên',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['gioitinh', 'sogioitinh'],
          @php
          echo $chartData3
          @endphp
        ]);

        var options = {
          title: 'Giới tính nhân viên',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart3'));
        chart.draw(data, options);
      }
    </script>
@endsection


