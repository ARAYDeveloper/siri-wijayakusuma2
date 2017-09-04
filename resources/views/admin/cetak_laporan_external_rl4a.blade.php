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
                    <th rowspan="3">No. Urut</th>
                    <th rowspan="3">No. DTD</th>
                    <th rowspan="3">No. Daftar Terperinci</th>
                    <th rowspan="3">Golongan Sebab Penyakit</th>
                    <th colspan="18">Jumlah Pasien Hidup dan Mati menurut Golongan Umur & Jenis Kelamin</th>
                    <th colspan="2">Pasien Keluar (Hidup & Mati) Menurut Jenis Kelamin</th>
                    <th rowspan="2">Jumlah Pasien Keluar Hidup (23+24)</th>
                    <th rowspan="2">Jumlah Pasien Keluar Mati</th>
                  </tr>
                  <tr>
                   <th colspan="2">0-6 hr</th>
                   <th colspan="2">7-28hr</th>
                   <th colspan="2">28hr-&lt 1th</th>
                   <th colspan="2">1-4th</th>
                   <th colspan="2">5-14th</th>
                   <th colspan="2">15-24th</th>
                   <th colspan="2">25-44th</th>
                   <th colspan="2">45-64th</th>
                   <th colspan="2">&gt 65</th>
                   <th rowspan="2">LK</th>
                   <th rowspan="2">PR</th>
                 </tr>
                 <tr>
                   <th>L</th>
                   <th>P</th>
                   <th>L</th>
                   <th>P</th>
                   <th>L</th>
                   <th>P</th>
                   <th>L</th>
                   <th>P</th>
                   <th>L</th>
                   <th>P</th>
                   <th>L</th>
                   <th>P</th>
                   <th>L</th>
                   <th>P</th>
                   <th>L</th>
                   <th>P</th>
                   <th>L</th>
                   <th>P</th>
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
                   <th>9</th>
                   <th>10</th>
                   <th>11</th>
                   <th>12</th>
                   <th>13</th>
                   <th>14</th>
                   <th>15</th>
                   <th>16</th>
                   <th>17</th>
                   <th>18</th>
                   <th>19</th>
                   <th>20</th>
                   <th>21</th>
                   <th>22</th>
                   <th>23</th>
                   <th>24</th>
                   <th>25</th>
                   <th>26</th>
                 </tr>
               </thead>
               <tbody>
                <tr>
                 <td>1</td>
                 <td>001</td>
                 <td>A00</td>
                 <td>Kolera</td>
               </tr>
               <tr>
                 <td>2</td>
                 <td>002</td>
                 <td>A01</td>
                 <td>Demam Tifoid dan Paratifoid</td>
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
