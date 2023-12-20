@extends('layouts.main')
@section('konten')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chart Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Chart Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card text-start">
                <div class="card-body">
                    <h4 class="card-tittle">Chart Produk</h4>
                    <p class="card-text"></p>
                    <div class="mb-5" id="columnChart" style="height: 300px;"></div>
                    <div class="mb-5" id="pieChart" style="height: 500px;"></div>
                    <div class="mb-5" id="stockCountChart" style="height: 300px;"></div>
                </div>
            </div>
      </div>
      <!-- /.card -->
    </section>
    
   
<script src="{{ asset('Highcharts/code/highcharts.js') }}"></script>



<script>
    Highcharts.chart('pieChart', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Produk Composition'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Total Produk',
            colorByPoint: true,
            data: [{
                name: 'Jumlah Produk',
                y: {{ $totalProducts }}
            }, {
                name: 'Jumlah Kategori',
                sliced: true,
                selected: true,
                y: {{ $totalCategories }}
            },{
                name: 'Total Stok',
                y: {{ $totalStock }}
            }]
        }]
    });
</script>

<script>
    Highcharts.chart('columnChart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Statistik Produk'
        },
        xAxis: {
            categories: ['Total Produk', 'Total Kategori', 'Total Stok']
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            }
        },
        series: [{
            name: 'Jumlah',
            data: [
                {
                    name: 'Total Produk',
                    y: {{ $totalProducts }}
                },
                {
                    name: 'Total Kategori',
                    y: {{ $totalCategories }}
                }
            ]
        }]
    });
</script>

<script>
   Highcharts.chart('stockCountChart', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Jumlah Stok Produk per Kategori'
        },
        xAxis: {
            categories: @json($categories)
        },
        yAxis: {
            title: {
                text: 'Jumlah Stok'
            }
        },
        series: [{
            name: 'Jumlah Stok',
            data: [
                @foreach($categories as $key => $category)
                {name: '{{ $category }}', y: {{ $totalStocks[$key] }}},
                @endforeach
            ]
        }]
    });
</script>




<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
</body>
</html>

@endsection