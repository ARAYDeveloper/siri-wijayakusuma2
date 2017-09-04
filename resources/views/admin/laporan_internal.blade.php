@extends('admin.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Laporan Internal
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
                                            <option selected="selected">Tahun</option>
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                            <option>2021</option>
                                            <option>2022</option>
                                        </select>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-primary">Tampil</button>
                                    </li>
                                    <li><a href="/adm_ctk_lap_in" target="_blank"
                                           class="btn btn-default">Print</a></button></li>
                                </ol>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" data-toggle="table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">Bulan</th>
                                    <th data-field="text">Pasien Awal</th>
                                    <th data-field="text" data-sortable="true">Ps. Masuk</th>
                                    <th data-field="text" data-sortable="true">Ps. Keluar</th>
                                    <th data-field="text" data-sortable="true">Sisa Pasien</th>
                                    <th data-field="text" data-sortable="true">Jml Hr Perawatan</th>
                                    <th data-field="text" data-sortable="true">Jml Lm Dirawat</th>
                                    <th data-field="text" data-sortable="true">TT</th>
                                    <th data-field="text" data-sortable="true">Periode</th>
                                    <th data-field="text" data-sortable="true">BOR (%)</th>
                                    <th data-field="text" data-sortable="true">ALOS (HR)</th>
                                    <th data-field="text" data-sortable="true">BTO</th>
                                    <th data-field="text" data-sortable="true">Mati 48 jam</th>
                                    <th data-field="text" data-sortable="true">Mati 48 jam</th>
                                    <th data-field="text" data-sortable="true">NDR</th>
                                    <th data-field="text" data-sortable="true">GDR</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Januari</td>
                                    <!-- <td>29</td>
                                    <td>2</td>
                                    <td>212</td>
                                    <td>224</td>
                                    <td>225</td>
                                    <td>212</td>
                                    <td>122</td>
                                    <td>522</td>
                                    <td>222</td>
                                    <td>922</td>
                                    <td>212</td>
                                    <td>022</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>10</td> -->
                                </tr>
                                <tr>
                                    <td>Februari</td>
                                </tr>
                                <tr>
                                    <td>Maret</td>
                                </tr>
                                <tr>
                                    <td>April</td>
                                </tr>
                                <tr>
                                    <td>Mei</td>
                                </tr>
                                <tr>
                                    <td>Juni</td>
                                </tr>
                                <tr>
                                    <td>Juli</td>
                                </tr>
                                <tr>
                                    <td>Agustus</td>
                                </tr>
                                <tr>
                                    <td>September</td>
                                </tr>
                                <tr>
                                    <td>Oktober</td>
                                </tr>
                                <tr>
                                    <td>November</td>
                                </tr>
                                <tr>
                                    <td>Desember</td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </section>
    </div>
    <!-- </div> -->
    @endsection