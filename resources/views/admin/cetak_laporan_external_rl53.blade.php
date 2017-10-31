<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIRI | Laporan Ext RL 5.3</title>
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
                  SIRI | Laporan Ext RL 5.3
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
            </div><!-- /.row -->

            <!-- Table row -->
            <br><br>
            <div class="row">
              <div class="col-xs-12 table-responsive">
                <table class="table table-bordered table-responsive">
                  <thead>
                   <tr>
                    <th rowspan="2">No Urut</th>
                    <th rowspan="2">Kode ICD X</th>
                    <th rowspan="2">Deskripsi</th>
                    <th colspan="2">Pasien Keluar Hidup Menurut Jenis Kelamin</th>
                    <th colspan="2">Pasien Keluar Mati Menurut Jenis Kelamin</th>
                    <th rowspan="2">Total (Hidup dan Mati)</th>
                  </tr>
                  <tr>
                   <th>LK</th>
                   <th>PR</th>
                   <th>LK</th>
                   <th>PR</th>
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
               @php($i=0)
               @foreach($datadiagnosis as $diagnosis)
                   @php($i++)
                   <tr>
                       <td>{{ $i }}</td>
                       <td>{{ $diagnosis->kode_icd }}</td>
                       <td>{{ $diagnosis->deskripsi }}</td>
                       <td>{{ $datakeluarhiduplaki = \App\riwayat::join('pasiens as p','riwayats.id_pasien','=','p.id')->whereNotNull('tgl_keluar')->whereYear('tgl_keluar',$tahunnya)->where('id_diagnosis',$diagnosis->id)->where('status_keluar','Hidup')->where('p.jenis_kelamin','Laki-Laki')->count() }}</td>
                       <td>{{ $datakeluarhidupperempuan = \App\riwayat::join('pasiens as p','riwayats.id_pasien','=','p.id')->whereNotNull('tgl_keluar')->whereYear('tgl_keluar',$tahunnya)->where('id_diagnosis',$diagnosis->id)->where('status_keluar','Hidup')->where('p.jenis_kelamin','Perempuan')->count() }}</td>
                       <td>{{ $datakeluarmatilaki = \App\riwayat::join('pasiens as p','riwayats.id_pasien','=','p.id')->whereNotNull('tgl_keluar')->whereYear('tgl_keluar',$tahunnya)->where('id_diagnosis',$diagnosis->id)->where('status_keluar','Meninggal')->where('p.jenis_kelamin','Laki-Laki')->count() }}</td>
                       <td>{{ $datakeluarmatiperempuan = \App\riwayat::join('pasiens as p','riwayats.id_pasien','=','p.id')->whereNotNull('tgl_keluar')->whereYear('tgl_keluar',$tahunnya)->where('id_diagnosis',$diagnosis->id)->where('status_keluar','Meninggal')->where('p.jenis_kelamin','Perempuan')->count() }}</td>
                       <td>{{ $datakeluarhiduplaki + $datakeluarhidupperempuan + $datakeluarmatilaki + $datakeluarmatiperempuan }}</td>
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
