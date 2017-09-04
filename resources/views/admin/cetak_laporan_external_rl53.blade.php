<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIRI | Invoice</title>
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
                  SIRI.
                  <small class="pull-right"> Tanggal: 12/12/2016</small>
                </h2>
              </div><!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Kepada:
                <address>
                  <strong>Alam Ardianto</strong><br>
                  Jalan Melati I No. 79<br>
                  Jember<br>
                  Telepon: 089608960896<br>
                  Email: alamardianto@gmail.com
                </address>
              </div><!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <<b>Invoice #007612</b><br>
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
                <table class="table table-striped">
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
                <tr>
                 <td>1</td>
                 <td>A00.0</td>
                 <td>Cholera due to Vibrio cholerae 01, biovar cholerae</td>
               </tr>
               <tr>
                 <td>2</td>
                 <td>A01.0</td>
                 <td>Typhoid fever</td>
               </tr>
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
