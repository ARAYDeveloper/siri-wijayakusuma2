@extends('admin.master')

@section('head-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
    <style>
        thead.bg-ocean-blue, tr.bg-ocean-blue, td.bg-ocean-blue {
            background-color: #6db8db;
        }
    </style>
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Transaksi Pasien Keluar
                <!-- <small>tambah makanan</small> -->
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3>Pasien Dirawat</h3>
                            <div class="box-body">
                                <table id="pasien_rawat" data-toggle="table" data-search="true"
                                       data-select-item-name="toolbar1" data-pagination="true"
                                       class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>No. RM</th>
                                        <th>Keluhan</th>
                                        <th>Kamar</th>
                                        <th data-field="button">Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rawat as $pas)
                                        <tr>
                                            <td>{{$pas->pasien->nama}}</td>
                                            <td>{{$pas->pasien->no_rm}}</td>
                                            <td>{{$pas->diagnosis->nama_penyakit}}</td>
                                            <td>{{$pas->kamar->nama_kamar}}</td>
                                            <td>
                                                <button class="btn btn-sm btn-danger btn-keluar"
                                                        riwayat_id="{{$pas->id}}">
                                                    Keluarkan
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                            <hr>
                            <h3>Pasien Keluar</h3>
                            <div class="box-body">
                                <table id="pasien_keluar" data-toggle="table" data-search="true"
                                       data-select-item-name="toolbar1" data-pagination="true"
                                       class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>No. RM</th>
                                        <th>Keluhan</th>
                                        <th>Kamar</th>
                                        <th data-field="text" data-sortable="true">Tanggal Keluar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $pas)
                                        <tr>
                                            <td>{{$pas->pasien->nama}}</td>
                                            <td>{{$pas->pasien->no_rm}}</td>
                                            <td>{{$pas->diagnosis->nama_penyakit}}</td>
                                            <td>{{$pas->kamar->nama_kamar}}</td>
                                            <td>{{$pas->tgl_keluar}}</td>
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

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Masukkan Data Pasien</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="box-body">
                            <input type="hidden" name="id_riwayat" id="id_riwayat" value="">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tanggal Keluar</label>
                                <div class="col-sm-8">
                                    <input id="tgl_keluar" type="text" class="form-control form_datetime"
                                           placeholder="" data-date-format='yyyy-mm-dd'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Pulang Paksa</label>
                                <div class=" col-sm-8">
                                    <select name="pulang_paksa" id="pulang_paksa" class="form-control ">
                                        <option value="">-- PILIH --</option>
                                        <option value="Tidak" selected>Tidak</option>
                                        <option value="Ya">Ya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Status Keluar</label>
                                <div class="col-sm-8">
                                    <select id="status_keluar" class="form-control ">
                                        <option value="">-- PILIH --</option>
                                        <option value="Hidup">Hidup</option>
                                        <option value="Dirujuk">Dirujuk</option>
                                        <option value="Meninggal">Meninggal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Rujuk Ke</label>
                                <div class=" col-sm-8">
                                    <select id="id_rumah_sakit_rujuks" class="form-control select2"
                                            width="100%" style="width: 100%">
                                        <option value="">-- PILIH --</option>
                                        @foreach($datars as $rs)
                                            <option value="{{$rs->id}}">{{$rs->nama_rs}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-8"></div>
                            <button id="simpan" class="btn btn-primary">Simpan</button>
                            <button id="batal" type="reset" class="btn btn-warning">Batal
                            </button>
                        </div><!-- /.box-footer -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/locales/bootstrap-datetimepicker.id.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'});
            $('.select2').select2();
        });
    </script>

    <script>
        function keluarkan() {
            $(".btn-keluar").click(function () {
                $('#id_riwayat').val($(this).attr('riwayat_id'));
                $('#myModal').modal('show');
            })
        }

        $("#batal").click(function () {
            $('#id_riwayat').val('');
            $('#myModal').modal('hide');
        });

        function refreshTable(response) {

            $('#pasien_rawat tbody').html('');
            $('#pasien_keluar tbody').html('');

            $.each(response.data.dataRiwayats, function (index, obj) {
                $('#pasien_rawat tbody').append('' +
                    '<tr>' +
                    '<td>' + obj.pasien.nama + '</td>' +
                    '<td>' + obj.pasien.no_rm + '</td>' +
                    '<td>' + obj.diagnosis.nama_penyakit + '</td>' +
                    '<td>' + obj.kamar.nama_kamar + '</td>' +
                    '<td><button class="btn btn-sm btn-keluar" riwayat_id="' + obj.id + '">Keluarkan</button></td>' +
                    '</tr>');
            });

            $.each(response.data.dataRiwayatKeluar, function (index, obj) {
                $('#pasien_keluar tbody').append('' +
                    '<tr>' +
                    '<td>' + obj.pasien.nama + '</td>' +
                    '<td>' + obj.pasien.no_rm + '</td>' +
                    '<td>' + obj.diagnosis.nama_penyakit + '</td>' +
                    '<td>' + obj.kamar.nama_kamar + '</td>' +
                    '<td>' + obj.tgl_keluar + '</td>' +
                    '</tr>');
            });
            alert(response.message);
            $("#myModal").modal('hide');
        }

        function simpan(posisi) {
            var value = {
                id_riwayat: $('#id_riwayat').val(),
                tgl_keluar: $('#tgl_keluar').val(),
                status_keluar: $('#status_keluar').val(),
                pulang_paksa: $('#pulang_paksa').val(),
            };

            if (posisi == 'Dirujuk') {
                value.id_rumah_sakit_rujuks = $('#id_rumah_sakit_rujuks').val();
            }

            var url = "/riwayat/" + $('#id_riwayat').val();
            $.ajax({
                url: url,
                type: "PATCH",
                data: value,
                success: function (response) {
                    refreshTable(response);
                }
            });
        }

        $(function () {
            $('#simpan').click(function () {
                if ($("#tgl_keluar").val() == '' || $("#pulang_paksa").val() == '' || $("#status_keluar").val() == '') {
                    alert('Lengkapi Form Isian !');
                } else {
                    if ($("#status_keluar").val() == 'Dirujuk') {
                        if ($("#id_rumah_sakit_rujuks").val() == '') {
                            alert('Status Keluar Dirujuk, Pastikan Form Rumah Sakit Tujuan Terisi !');
                        } else {
                            simpan('Dirujuk');
                        }
                    } else {
                        simpan('lain');
                    }
                }
            });
            keluarkan();
        });

    </script>


@endpush