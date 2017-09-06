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
                Pasien
                <!-- <small>tambah makanan</small> -->
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="panel panel-blue">
                        <div class="panel-heading">Data Pasien</div>
                        <div class="panel-body">
                            <!-- form start -->
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Pasien</label>
                                        <div class="col-sm-10">
                                            <select id="id_pasien" class="form-control select2" width="100%"
                                                    style="width: 100%">
                                                <option value="">-- PILIH PASIEN --</option>
                                                @foreach($data as $datapasien)
                                                    @if($datapasien->status_rawat == 'tidak')
                                                        <option value="{{$datapasien->id}}">{{$datapasien->nama}} &nbsp;&nbsp;#nik={{$datapasien->nik}}
                                                            &nbsp;#alamat={{$datapasien->alamat}}
                                                            &nbsp;#no_rm={{$datapasien->no_rm}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Bangsal</label>
                                        <div class="col-sm-10">
                                            <select id="id_kamar" class="form-control select2" width="100%"
                                                    style="width: 100%">
                                                <option value="">-- PILIH BANGSAL/KAMAR --</option>
                                                @foreach($kamar as $databangsal)
                                                    <option value="{{$databangsal->id}}">
                                                        <b>#nama_bangsal={{$databangsal->nama_kamar}}</b>
                                                        &nbsp;#kelas={{$databangsal->jenisLayanan->jenis_pelayanan}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Bayar</label>
                                        <div class=" col-sm-4">
                                            <select name="id_pembayaran" class="form-control">
                                                @foreach($bayar as $databayar)
                                                    <option value="{{$databayar->id_pembayaran}}">{{$databayar->jenis_pembayaran}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label class="col-sm-3 control-label">No. Asuransi</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Diagnosa</label>
                                        <div class="col-sm-10">
                                            <select name="id_diagnosis" class="form-control select2">
                                                <option value="">-- PILIH DIAGNOSA --</option>
                                                @foreach($diagnosis as $datadiagnosa)
                                                    <option value="{{$datadiagnosa->id_diagnosis}}">{{$datadiagnosa->nama_penyakit}}
                                                        &nbsp;#kode_dtd={{$datadiagnosa->kode_dtd}}
                                                        &nbsp;#kode_icd={{$datadiagnosa->kode_icd}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tanggal Masuk</label>
                                        <div class="col-sm-10">
                                            <input id="tgl_masuk" name="tgl_masuk" type="text"
                                                   class="form-control form_datetime"
                                                   placeholder="" data-date-format='yyyy-mm-dd'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tanggal Lapor</label>
                                        <div class="col-sm-10">
                                            <input id="tgl_lapor" type="text" class="form-control form_datetime"
                                                   placeholder="" data-date-format='yyyy-mm-dd'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tanggal Keluar</label>
                                        <div class="col-sm-10">
                                            <input id="tgl_keluar" type="text" class="form-control form_datetime"
                                                   placeholder="" data-date-format='yyyy-mm-dd'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Pindah Dari</label>
                                        <div class=" col-sm-10">

                                            <select id="pindah_dari" class="form-control select2">
                                                <option value="">-- TIDAK --</option>
                                                @foreach($kamar as $databangsal)
                                                    <option value="{{$databangsal->id}}">
                                                        <b>#nama_bangsal={{$databangsal->nama_kamar}}</b>
                                                        &nbsp;#kelas={{$databangsal->jenisLayanan->jenis_pelayanan}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Pindah Ke</label>
                                        <div class="col-sm-10">
                                            <select id="pindah_ke" class="form-control select2">
                                                <option value="">-- TIDAK --</option>
                                                @foreach($kamar as $databangsal)
                                                    <option value="{{$databangsal->id}}">
                                                        <b>#nama_bangsal={{$databangsal->nama_kamar}}</b>
                                                        &nbsp;#kelas={{$databangsal->jenisLayanan->jenis_pelayanan}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Status Keluar</label>
                                        <div class=" col-sm-10">
                                            <select id="status_keluar" class="form-control ">
                                                <option value="Hidup">Hidup</option>
                                                <option value="Dirujuk">Dirujuk</option>
                                                <option value="Meninggal">Meninggal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Pulang Paksa</label>
                                        <div class="col-sm-10">
                                            <select id="pulang_paksa" class="form-control ">
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Rujuk Ke</label>
                                        <div class=" col-sm-10">
                                            <select id="id_rumah_sakit_rujuks" class="form-control select2"
                                                    width="100%" style="width: 100%">
                                                <option value="null">-- PILIH --</option>
                                                @foreach($datars as $rs)
                                                    <option value="{{$rs->id}}">{{$rs->nama_rs}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button id="simpan" class="btn btn-default pull-right">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Start ini -->
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Riwayat Pasien</div>
                        <div class="panel-body">
                            <!-- form start -->
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <table id="tableRiwayat" class="table table-bordered table-hover">
                                        <thead class="bg-ocean-blue">
                                        <tr>
                                            <th>Tanggal Masuk</th>
                                            <th>Diagnosis</th>
                                            <th>Kamar</th>
                                            <th>Status Keluar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.Left col -->
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
                                            <option value="">-- Semua --</option>
                                            @foreach($kamar as $item)
                                                <option value="{{$item->id}}">{{$item->nama_kamar}}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li>
                                        <button id="tampil" type="button" class="btn btn-primary">Tampil</button>
                                    </li>
                                </ol>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="table_pasien" data-toggle="table" data-search="true"
                                   data-select-item-name="toolbar1"
                                   data-pagination="true" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">No. RM</th>
                                    <th data-field="text">Nama Pasien</th>
                                    <th data-field="text">Diagnosa</th>
                                    <th data-field="text" data-sortable="true">Tgl. Masuk</th>
                                    <th data-field="text" data-sortable="true">Tgl. Keluar</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </section>
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

        $('#simpan').click(function () {
            if ($('#id_pasien').val() != '' && $('#id_kamar').val() != '' && $('#id_diagnosis').val() != '' && $('#tgl_masuk').val() != '') {

            }
        })
    </script>
@endpush