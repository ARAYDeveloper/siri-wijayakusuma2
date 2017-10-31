<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIRI | Laporan Ext RL 1.3</title>
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
                  SIRI | Laporan Ext RL 1.3
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
                <!-- <b>No. Pesanan:</b> PS0029<br> -->
                <!-- <b>Payment Due:</b> 2/22/2014<br> -->
                <!-- <b>ID Akun:</b> 968-34567 -->
              </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Table row -->
            <br><br>
            <div class="row">
              <div class="col-xs-12 table-responsive">
                <table class="table table-bordered table-responsive">
                  <thead>
                   <tr>
                     <th rowspan="2">No</th>
                     <th rowspan="2">Jenis Pelayanan</th>
                     <th rowspan="2">Jumlah TT</th>
                       <th colspan="7"><center>Perincian Tempat Tidur Kelas</center></th>
                   </tr>
                   <tr>
                       @foreach($kamarnya as $kamarlapor)
                           <th>{{ $kamarlapor->nama_kamar }}</th>
                       @endforeach
                   </tr>
                 </thead>
                 <tbody>
                 @php($i=0)
                 @foreach($datapelayanan as $pelayanan)
                     @php($i++)
                     <tr>
                         <td>{{ $i }}</td>
                         <td>{{ $pelayanan->jenis_pelayanan }}</td>
                         @php($okejumlahtt = \App\kamar::where('id_pelayanan', $pelayanan->id)->whereYear('created_at',$tahunnya)->sum('jumlah'))
                         <td>{{ $okejumlahtt }}</td>
                         @foreach($kamarnya as $kamarlapor2)
                             @php($cekkamar = \App\kamar::where('id_pelayanan', $pelayanan->id)->where('id', $kamarlapor2->id)->first())
                             @if($cekkamar != null)
                                 @php($okejumlahkamar = \App\kamar::where('id_pelayanan', $pelayanan->id)->whereYear('created_at', $tahunnya)->where('id', $kamarlapor2->id)->sum('jumlah'))
                                 <td>{{ $okejumlahkamar }}</td>
                             @else
                                 <td>0</td>
                             @endif
                         @endforeach
                     </tr>
                 @endforeach
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
