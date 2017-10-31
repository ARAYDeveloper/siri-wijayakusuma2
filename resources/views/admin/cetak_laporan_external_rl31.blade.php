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
                    SIRI | Laporan Ext RL 3.1.
                    @php($date = \Carbon\Carbon::now('Asia/Jakarta')->toDateTimeString())
                    <small class="pull-right">{{$date}}</small>
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
                        <th rowspan="2" data-field="number" data-sortable="true">
                            <center>No</center>
                        </th>
                        <th rowspan="2" data-field="text" data-sortable="true">
                            <center>Jenis Pelayanan</center>
                        </th>
                        <th rowspan="2" data-field="number" data-sortable="true">
                            <center>Pasien Awal Tahun</center>
                        </th>
                        <th rowspan="2" data-field="number" data-sortable="true">
                            <center>Pasien Masuk</center>
                        </th>
                        <th rowspan="2" data-field="number" data-sortable="true">
                            <center>Pasien Keluar Hidup</center>
                        </th>
                        <th colspan="2" data-field="number" data-sortable="true">
                            <center>Pasien Keluar Mati</center>
                        </th>
                        <th rowspan="2" data-field="number" data-sortable="true">
                            <center>Jumlah Lama Dirawat</center>
                        </th>
                        <th rowspan="2" data-field="number" data-sortable="true">
                            <center>Pasien Akhir Tahun</center>
                        </th>
                        <th rowspan="2" data-field="number" data-sortable="true">
                            <center>Jumlah Hari Perawatan</center>
                        </th>
                        <th colspan="7" data-field="number" data-sortable="true">
                            <center>Perincian Tempat Tidur Kelas</center>
                        </th>
                    </tr>
                    <tr>
                        <th data-field="number" data-sortable="true">
                            <center>&lt 48 Jam</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>&gt 48 Jam</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>VIP atas</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>VIP bawah</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>Mawar</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>Melati</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>Dahlia</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>Seruni</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>HCU</center>
                        </th>
                    </tr>
                    <tr>
                        <th data-field="number" data-sortable="true">
                            <center>1</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>2</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>3</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>4</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>5</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>6</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>7</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>8</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>9</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>10</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>11</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>12</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>13</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>14</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>15</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>16</center>
                        </th>
                        <th data-field="number" data-sortable="true">
                            <center>17</center>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 0)
                    @foreach($pelayanan as $layanan)
                        @php($i++)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$layanan->jenis_pelayanan}}</td>
                            @if($tahunnya != null)
                                @php($pasienawal = \App\riwayat::join('kamars as k', 'riwayats.id_kamar', '=', 'k.id')->whereYear('riwayats.created_at', ($tahunnya - 1))->where('id_pelayanan', $layanan->id)->where('status_keluar', 'Belum')->count())
                                @php($pasienmasuk = \App\riwayat::join('kamars as k', 'riwayats.id_kamar', '=', 'k.id')->whereYear('riwayats.created_at', ($tahunnya))->where('id_pelayanan', $layanan->id)->count())
                                @php($keluarhidup = \App\riwayat::join('kamars as k', 'riwayats.id_kamar', '=', 'k.id')->whereYear('riwayats.created_at', ($tahunnya))->where('id_pelayanan', $layanan->id)->where('status_keluar', 'Hidup')->count())
                                @php($kurangdari = \App\riwayat::join('kamars as k', 'riwayats.id_kamar', '=', 'k.id')->whereYear('riwayats.created_at', ($tahunnya))->where('id_pelayanan', $layanan->id)->where('status_keluar', 'Meninggal')->where('kurang_48', '<>', 0)->count())
                                @php($lebihdari = \App\riwayat::join('kamars as k', 'riwayats.id_kamar', '=', 'k.id')->whereYear('riwayats.created_at', ($tahunnya))->where('id_pelayanan', $layanan->id)->where('status_keluar', 'Meninggal')->where('kurang_48', 0)->count())
                                @php($lamarawat = \App\riwayat::join('kamars as k', 'riwayats.id_kamar', '=', 'k.id')->whereYear('riwayats.created_at', ($tahunnya))->where('id_pelayanan', $layanan->id)->sum('jumlah_lama_perawatan'))
                                @php($pasienakhir = \App\riwayat::join('kamars as k', 'riwayats.id_kamar', '=', 'k.id')->whereYear('riwayats.created_at', ($tahunnya))->where('id_pelayanan', $layanan->id)->where('status_keluar', 'Belum')->count())
                                @php($harirawat = \App\riwayat::join('kamars as k', 'riwayats.id_kamar', '=', 'k.id')->whereYear('riwayats.created_at', ($tahunnya))->where('id_pelayanan', $layanan->id)->sum('jumlah_hari_perawatan'))
                                <td>
                                    <center>{{$pasienawal}}</center>
                                </td>
                                <td>
                                    <center>{{$pasienmasuk}}</center>
                                </td>
                                <td>
                                    <center>{{$keluarhidup}}</center>
                                </td>
                                <td>
                                    <center>{{$kurangdari}}</center>
                                </td>
                                <td>
                                    <center>{{$lebihdari}}</center>
                                </td>
                                <td>
                                    <center>{{$lamarawat}}</center>
                                </td>
                                <td>
                                    <center>{{$pasienakhir}}</center>
                                </td>
                                <td>
                                    <center>{{$harirawat}}</center>
                                </td>
                                @foreach($kamar as $kamarlapor2)
                                    @php($okejumlahkamar = \App\kamar::where('id_pelayanan', $layanan->id)->whereYear('created_at', $tahunnya)->where('id', $kamarlapor2->id)->sum('jumlah'))
                                    @if($okejumlahkamar != 0)
                                        <td>
                                            <center>{{ $okejumlahkamar }}</center>
                                        </td>
                                    @else
                                        <td>
                                            <center>0</center>
                                        </td>
                                    @endif
                                @endforeach
                            @else
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            @endif
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
