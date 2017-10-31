<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIRI | Laporan Internal</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('fontawesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/font-awesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              SIRI | Laporan Internal
              <small class="pull-right"> Dicetak Tanggal: {{ date('d/m/Y') }}</small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            Tahun: {{ $tahunnya }}
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b><center>RS. Wijaya Kusuma</center></b>
              <br>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <br><br>
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-bordered table-responsive">
              <thead>
               <tr>
                  <th>Bulan</th>
                  <th>Pasien Awal</th>
                  <th>Ps. Masuk</th>
                  <th>Ps. Keluar</th>
                  <th>Sisa Pasien</th>
                  <th>Jml Hr Perawatan</th>
                  <th>Jml Lm Dirawat</th>
                  <th>TT</th>
                  <th>Periode</th>
                  <th>BOR (%)</th>
                  <th>ALOS (HR)</th>
                  <th>BTO</th>
                  <th>Mati 48 jam</th>
                  <th>Mati 48 jam</th>
                  <th>NDR</th>
                  <th>GDR</th>
                </tr>
              </thead>
              <tbody>
              @for($i=0; $i<count($datanya); $i++)
                <tr>
                  <td>{{ $datanya[$i]["bulan"] }}</td>
                  <td>{{ $datanya[$i]["pasienawal"] }}</td>
                  <td>{{ $datanya[$i]["pasienmasuk"] }}</td>
                  <td>{{ $datanya[$i]["pasienkeluar"] }}</td>
                  <td>{{ $datanya[$i]["sisapasien"] }}</td>
                  <td>{{ $datanya[$i]["jml_hari_perawatan"] }}</td>
                  <td>{{ $datanya[$i]["jml_lama_dirawat"] }}</td>
                  <td>{{ $datanya[$i]["tt"] }}</td>
                  <td>{{ $datanya[$i]["periode"] }}</td>
                  <td>{{ round($datanya[$i]["jml_hari_perawatan"]/($datanya[$i]["tt"] * $datanya[$i]["periode"]) * 100, 2) }}</td>
                  @if($datanya[$i]["pasienkeluar"] != 0)
                    <td>{{ round($datanya[$i]["jml_lama_dirawat"]/$datanya[$i]["pasienkeluar"],2) }}</td>
                  @else
                    <td>0</td>
                  @endif
                  @if($datanya[$i]["tt"] != 0)
                    <td>{{ round($datanya[$i]["pasienkeluar"]/$datanya[$i]["tt"],2) }}</td>
                  @else
                    <td>0</td>
                  @endif
                  <td>{{ $datanya[$i]["mati_kurang_48"] }}</td>
                  <td>{{ $datanya[$i]["mati_lebih_48"] }}</td>
                  @if($datanya[$i]["pasienkeluar"] != 0)
                    <td>{{ round($datanya[$i]["mati_lebih_48"]/$datanya[$i]["pasienkeluar"] * 1000,2) }}</td>
                    <td>{{ round($datanya[$i]["mati_kurang_48"]+$datanya[$i]["mati_lebih_48"]/$datanya[$i]["pasienkeluar"] * 1000,2) }}</td>
                  @else
                    <td>0</td>
                    <td>0</td>
                  @endif
                </tr>
              @endfor
              </tbody>
            </table>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <br>
        <hr>
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
  </body>
</html>
