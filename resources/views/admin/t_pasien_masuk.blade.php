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
                                <table id="example2" data-toggle="table" data-search="true"
                                       data-select-item-name="toolbar1" data-pagination="true"
                                       class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>No. RM</th>
                                        <th>Keluhan</th>
                                        <th>Kamar</th>
                                        <th data-field="text" data-sortable="true">Tanggal Masuk</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $pas)
                                        <tr>
                                            <td>{{$pas->pasien->nama}}</td>
                                            <td>{{$pas->pasien->no_rm}}</td>
                                            <td>{{$pas->diagnosis->nama_penyakit}}</td>
                                            <td>{{$pas->kamar->nama_kamar}}</td>
                                            <td>{{$pas->tgl_masuk}}</td>
                                        </tr>
                                    @endforeach
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