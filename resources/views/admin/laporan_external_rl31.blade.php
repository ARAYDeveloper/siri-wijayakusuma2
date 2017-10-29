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
                                        <select class="form-control select2" style="width: 100%;">
                                            <option selected="selected" value="">Tahun</option>
                                            @foreach($datatahun as $th)
                                                <option value="{{$th->tahun}}">{{$th->tahun}}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-primary">Tampil</button>
                                    </li>
                                    <li><a href="/adm_ctk_lap_ex_rl31" target="_blank" class="btn btn-default">Print</a>
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
                            <table id="example2" data-toggle="table" class="table table-bordered table-hover">
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
                                    <td>@if($tahunnya == null) - @else {{$tahunnya-1}} @endif</td>
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
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th rowspan="2" data-field="number" data-sortable="true">No</th>
                            <th rowspan="2" data-field="text" data-sortable="true">Jenis Pelayanan</th>
                            <th rowspan="2" data-field="number" data-sortable="true">Pasien Awal Tahun</th>
                            <th rowspan="2" data-field="number" data-sortable="true">Pasien Masuk</th>
                            <th rowspan="2" data-field="number" data-sortable="true">Pasien Keluar Hidup</th>
                            <th colspan="2" data-field="number" data-sortable="true">Pasien Keluar Mati</th>
                            <th rowspan="2" data-field="number" data-sortable="true">Jumlah Lama Dirawat</th>
                            <th rowspan="2" data-field="number" data-sortable="true">Pasien Akhir Tahun</th>
                            <th rowspan="2" data-field="number" data-sortable="true">Jumlah Hari Perawatan</th>
                            <th colspan="7" data-field="number" data-sortable="true">Perincian Tempat Tidur Kelas</th>
                        </tr>
                        <tr>
                            <th data-field="number" data-sortable="true"> &lt 48 Jam</th>
                            <th data-field="number" data-sortable="true"> &gt 48 Jam</th>
                            <th data-field="number" data-sortable="true">VIP atas</th>
                            <th data-field="number" data-sortable="true">VIP bawah</th>
                            <th data-field="number" data-sortable="true">Mawar</th>
                            <th data-field="number" data-sortable="true">Melati</th>
                            <th data-field="number" data-sortable="true">Dahlia</th>
                            <th data-field="number" data-sortable="true">Seruni</th>
                            <th data-field="number" data-sortable="true">HCU</th>
                        </tr>
                        <tr>
                            <th data-field="number" data-sortable="true">1</th>
                            <th data-field="number" data-sortable="true">2</th>
                            <th data-field="number" data-sortable="true">3</th>
                            <th data-field="number" data-sortable="true">4</th>
                            <th data-field="number" data-sortable="true">5</th>
                            <th data-field="number" data-sortable="true">6</th>
                            <th data-field="number" data-sortable="true">7</th>
                            <th data-field="number" data-sortable="true">8</th>
                            <th data-field="number" data-sortable="true">9</th>
                            <th data-field="number" data-sortable="true">10</th>
                            <th data-field="number" data-sortable="true">11</th>
                            <th data-field="number" data-sortable="true">12</th>
                            <th data-field="number" data-sortable="true">13</th>
                            <th data-field="number" data-sortable="true">14</th>
                            <th data-field="number" data-sortable="true">15</th>
                            <th data-field="number" data-sortable="true">16</th>
                            <th data-field="number" data-sortable="true">17</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@php($i = 0)--}}
                        {{--@foreach($pelayanan as $layanan)--}}
                            {{--@php($i++)--}}
                            {{--<tr>--}}
                                {{--<td>{{$i}}</td>--}}
                                {{--<td>{{$layanan->jenis_pelayanan}}</td>--}}
                                {{--@if($tahun != null)--}}
                                    {{--@php($pasienawal = \App\riwayat::join('kamars as k', 'r.id_kamar', '=', 'k.id')->whereYear('r.created_at', ($tahun))->where('id_pelayanan', $layanan->id)->count())--}}
                                {{--@else @php($pasienawal = '-') @endif;--}}
                                {{--<td>{{$pasienawal}}</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div>
        </section>
    </div>
    <!-- </div> -->
@endsection