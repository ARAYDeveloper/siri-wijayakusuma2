<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIRI | Laporan Ext RL 1.2</title>
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
              SIRI | Laporan Ext RL 1.2
              <small class="pull-right"> Dicetak Tanggal: {{ date('d/m/Y') }}</small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            Tahun: {{ $tahunnya }} <br>
            Kamar : {{ \App\kamar::where('id',$kamarid)->first()->nama_kamar }}
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
                  <th>Tahun</th>
                  <th>BOR</th>
                  <th>LOS</th>
                  <th>TOI</th>
                  <th>BTO</th>
                  <th>NDR</th>
                  <th>GDR</th>
                  <th>Rata-Rata Kunjungan Per Hari</th>
                </tr>
                <tr>
                  <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                  <th>5</th>
                  <th>6</th>
                  <th>7</th>
                  <th>8</th>
                </tr>
              </thead>
              <tbody>
              <tbody>
              <td>{{ $tahunnya }}</td>
              <td>{{ $datanya['bor'] }}</td>
              <td>{{ $datanya['los'] }}</td>
              <td>{{ $datanya['toi'] }}</td>
              <td>{{ $datanya['bto'] }}</td>
              <td>{{ $datanya['ndr'] }}</td>
              <td>{{ $datanya['gdr'] }}</td>
              <td>{{ $datanya['kunjungan'] }}</td>
              </tbody>
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
