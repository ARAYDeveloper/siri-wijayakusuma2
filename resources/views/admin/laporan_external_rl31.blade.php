@extends('admin.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Laporan External
                <!-- <small>advanced tables</small> -->
            </h1>
            <!-- <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Tables</a></li>
              <li class="active">Data tables</li>
            </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <!-- <h3 class="box-title">Tahun</h3> -->
                            <div>
                                <ol class="breadcrumb">
                                    <li>
                                        <select id="tahunlapor" class="form-control select2" style="width: 100%;">
                                            <option selected="selected" value="">Tahun</option>
                                            @foreach($datatahun as $th)
                                                <option value="{{$th->tahun}}">{{$th->tahun}}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li>
                                        <button id="tampilkan" type="button" class="btn btn-primary">Tampil</button>
                                    </li>
                                    <li><a href="/adm_ctk_lap_ex_rl31/{{$tahunnya}}" target="_blank"
                                           class="btn btn-default">Print</a>
                                    </li>
                                </ol>
                            </div>
                        </div><!-- /.box-header -->
                    </div>
                </div>
                <h3>
                    Formulir RL 3.1 Kegiatan Pelayanan Rawat Inap
                    <!-- <small>advanced tables</small> -->
                </h3>
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td>Kode RS</td>
                                    <td>01</td>
                                </tr>
                                <tr>
                                    <td>Nama RS</td>
                                    <td>RS. Wijaya Kusuma Lumajang</td>
                                </tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td>@if($tahunnya == null) - @else {{$tahunnya}} @endif</td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <h3>
                    RL 1.3 Kegiatan Pelayanan Rawat Inap
                    <!-- <small>advanced tables</small> -->
                </h3>
                <div class="box-body">
                    @if($tahunnya == null)
                        <h3>
                            <center>Silahkan Pilih Tahun Dulu</center>
                        </h3>
                    @else
                        <table id="example2" class="table table-bordered table-hover">
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
                                @foreach($kamar as $kamarlapor)
                                    <th data-field="text" data-sortable="true">{{ $kamarlapor->nama_kamar }}</th>
                                @endforeach
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
                                        @php($kurangdari = \App\riwayat::join('kamars as k', 'riwayats.id_kamar', '=', 'k.id')->whereYear('riwayats.created_at', ($tahunnya))->where('id_pelayanan', $layanan->id)->where('status_keluar', 'Meninggal')->where('kurang_48', '<>', 0)->count())())
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
                                            @php($okejumlahkamar = \App\kamar::where('id_pelayanan', $layanan->id)->where('id', $kamarlapor2->id)->sum('jumlah'))
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
                    @endif
                </div><!-- /.box-body -->
            </div>
        </section>
    </div>
    <!-- </div> -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#tampilkan").click(function () {
                if ($('#tahunlapor').val() != '') {
                    window.location.href = '/adm_lap_ex_rl31/' + $('#tahunlapor').val();
                } else {
                    alert('Pilih Tahun');
                }
            })
        })
    </script>
@endpush