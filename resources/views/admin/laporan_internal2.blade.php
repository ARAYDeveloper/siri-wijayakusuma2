@extends('admin.master')

@section('content')

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="/adm_dash">
                    <svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg>
                </a></li>
            <li class="active">laporan internal</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Laporan Internal</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- Advanced Table -->
                    <div class="col-md-2">
                        <select class="form-control">
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary">Tampil</button>
                    <button type="button" class="btn btn-primary">Print</button>
                </div>
                <div class="panel-body">
                    <table data-toggle="table" class="table">
                        <thead>
                        <tr>
                            <!-- <th data-field="state" data-checkbox="false" >Item ID</th> -->
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
                </div>
            </div>
        </div>
    </div><!--/.row-->

@endsection