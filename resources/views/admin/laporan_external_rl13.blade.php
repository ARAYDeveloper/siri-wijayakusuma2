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
                                        <button type="button" class="btn btn-primary">Tampil</button>
                                    </li>
                                    <li><a href="/adm_ctk_lap_ex_rl13" target="_blank" class="btn btn-default">Print</a>
                                    </li>
                                </ol>
                            </div>
                        </div><!-- /.box-header -->
                    </div>
                </div>
                <h3>
                    Formulir RL 1.3 Fasilitas Tempat Tidur Rawat Inap
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
                                    <td>2017</td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <h3>
                    RL 1.3 Fasilitas Tempat Tidur Rawat Inap
                    <!-- <small>advanced tables</small> -->
                </h3>
                <div class="box-body">
                    <table id="example2"class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th rowspan="2" data-field="text" data-sortable="true">No</th>
                            <th rowspan="2" data-field="text" data-sortable="true">Jenis Pelayanan</th>
                            <th rowspan="2" data-field="text" data-sortable="true">Jumlah TT</th>
                            <th colspan="7" data-field="text" data-sortable="true">Perincian Tempat Tidur Kelas</th>
                        </tr>
                        <tr>
                            <th data-field="text" data-sortable="true">VIP atas</th>
                            <th data-field="text" data-sortable="true">VIP bawah</th>
                            <th data-field="text" data-sortable="true">Mawar</th>
                            <th data-field="text" data-sortable="true">Melati</th>
                            <th data-field="text" data-sortable="true">Dahlia</th>
                            <th data-field="text" data-sortable="true">Seruni</th>
                            <th data-field="text" data-sortable="true">HCU</th>
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
                            <th data-field="text" data-sortable="true">9</th>
                            <th data-field="text" data-sortable="true">10</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Kesehatan Anak</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Penyakit Dalam</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Obstetri</td>
                        </tr>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div>
        </section>
    </div>
    <!-- </div> -->
@endsection
