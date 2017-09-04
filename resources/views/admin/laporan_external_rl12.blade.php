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
                                        <select class="form-control select2">
                                            <option selected="selected">Kamar</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                            <option>D</option>
                                            <option>E</option>
                                            <option>F</option>
                                        </select>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-primary">Tampil</button>
                                    </li>
                                    <li><a href="/adm_ctk_lap_ex_rl12" target="_blank" class="btn btn-default">Print</a>
                                    </li>
                                </ol>
                            </div>
                        </div><!-- /.box-header -->
                    </div>
                </div>
                <h3>
                    Formulir RL 1.2 Indikator Pelayanan Rumah Sakit
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
                                    <td>2017</td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <h3>
                    RL 1.2 Indikator Pelayanan Rumah Sakit
                    <!-- <small>advanced tables</small> -->
                </h3>
                <div class="box-body">
                    <table id="example2" data-toggle="table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th data-field="text" data-sortable="true">Tahun</th>
                            <th data-field="text" data-sortable="true">BOR</th>
                            <th data-field="text" data-sortable="true">LOS</th>
                            <th data-field="text" data-sortable="true">TOI</th>
                            <th data-field="text" data-sortable="true">BTO</th>
                            <th data-field="text" data-sortable="true">NDR</th>
                            <th data-field="text" data-sortable="true">GDR</th>
                            <th data-field="text" data-sortable="true">Rata-Rata Kunjungan Per Hari</th>
                        </tr>
                        <tr>
                            <th data-field="text" data-sortable="true">1</th>
                            <th data-field="text" data-sortable="true">2</th>
                            <th data-field="text" data-sortable="true">3</th>
                            <th data-field="text" data-sortable="true">4</th>
                            <th data-field="text" data-sortable="true">5</th>
                            <th data-field="text" data-sortable="true">6</th>
                            <th data-field="text" data-sortable="true">7</th>
                            <th data-field="text" data-sortable="true">8</th>
                        </tr>
                        </thead>
                        <tbody>
                        <td>2017</td>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div>
        </section>
    </div>
    <!-- </div> -->
@endsection