@extends('admin.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Transaksi Pasien Masuk
                <!-- <small>tambah makanan</small> -->
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">

                            <div class="box-body">
                                <table id="example2" data-toggle="table" data-search="true" data-select-item-name="toolbar1" data-pagination="true" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th data-field="text" data-sortable="true">Nama</th>
                                        <th data-field="text">No. RM</th>
                                        <th data-field="text" data-sortable="true">Keluhan</th>
                                        <th data-field="text" data-sortable="true">Kamar</th>
                                        <th data-field="text" data-sortable="true">Tanggal Masuk</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection