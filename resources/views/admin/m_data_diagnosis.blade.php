@extends('admin.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Diagnosis
                <!-- <small>tambah makanan</small> -->
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <!-- <h3 class="box-title">Tahun</h3> -->
                            <div>
                                <h4 class="panel-title">
                                    <a class="btn btn-default" data-toggle="collapse" id="tbh_data"><span><i
                                                    class="glyphicon-plus"></i></span> Tambah Data</a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="box box-info">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Tambah Data Diagnosis</h3>
                                            </div><!-- /.box-header -->
                                            <!-- form start -->
                                            <div class="form-horizontal">
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="hidden" name="id_diagnosis" id="id_diagnosis"
                                                                   value="">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Kode DTD</label>
                                                                <div class="col-sm-7">
                                                                    <input name="kode_dtd" id="kode_dtd" value=""
                                                                           type="text"
                                                                           class="form-control"
                                                                           placeholder="Kode DTD">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Kode ICD</label>
                                                                <div class="col-sm-7">
                                                                    <input name="kode_icd" id="kode_icd" value=""
                                                                           type="text"
                                                                           class="form-control"
                                                                           placeholder="Kode ICD">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Nama
                                                                    Penyakit</label>
                                                                <div class="col-sm-7">
                                                                    <input name="nama" id="nama" value="" type="text"
                                                                           class="form-control"
                                                                           placeholder="Nama Penyakit">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Deskripsi</label>
                                                                <div class="col-sm-7">
                                                                    <!-- <input type="textarea" class="form-control" placeholder=""> -->
                                                                    <textarea name="deskripsi" id="deskripsi"
                                                                              class="form-control"
                                                                              placeholder="Deskripsi Penyakit"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /.box-body -->
                                                <div class="box-footer">
                                                    <div class="col-md-4"></div>
                                                    <button class="btn btn-primary" id="simpan">Simpan</button>
                                                    <button id="batal" type="reset" class="btn btn-warning">Batal
                                                    </button>
                                                </div><!-- /.box-footer -->
                                            </div>
                                        </div><!-- /.box -->
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" data-toggle="table" data-search="false"
                                   data-select-item-name="toolbar1"
                                   data-pagination="true" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th data-sortable="true">Kode DTD</th>
                                    <th data-sortable="true">Kode ICD</th>
                                    <th>Nama Penyakit</th>
                                    <th data-sortable="true">Deskripsi</th>
                                    <th data-field="button" data-sortable="true">Operasi</th>
                                </tr>
                                </thead>
                                <tbody id="listdata">
                                @foreach($diagnosis as $pas)
                                    <tr>
                                        <td>{{$pas->kode_dtd}}</td>
                                        <td>{{$pas->kode_icd}}</td>
                                        <td>{{$pas->nama_penyakit}}</td>
                                        <td>{{$pas->deskripsi}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success btn-ubah"
                                                    data_id="{{$pas->id}}">
                                                Ubah
                                            </button>
                                            <button class="btn btn-sm btn-danger btn-hapus"
                                                    data_id="{{$pas->id}}">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="delete_modal" role="dialog">
        <div class="modal-dialog" style="color: #5e5e5e">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <input type="hidden" id="del_id" value="">
                        <label>Apakah Anda Yakin Akan Menghapus Diagnosis</label><br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Penyakit</label>
                            <div class="col-sm-8">
                                <input name="del_nama" id="del_nama" value="" type="text"
                                       class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="yakin_hapus" class="btn btn-danger">Yakin</button>
                    <button id="batal_hapus" class="btn btn-success">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- </div> -->
@endsection

@push('scripts')
<script>

    function resetForm() {
        $('#id_diagnosis').val('');
        $('#kode_dtd').val('');
        $('#kode_icd').val('');
        $('#nama').val('');
        $('#deskripsi').val('');
    }

    function bukaCollapse() {
        $('#collapse1').collapse('show');
    }

    function tutupCollapse() {
        resetForm();
        $('#collapse1').collapse('hide');
    }

    function refreshTable(response) {
        $('#listdata').html('');
        $.each(response.data.dataDiagnosis, function (index, obj) {
            $('#listdata').append('' +
                    '<tr>' +
                    '<td>' + obj.kode_dtd + '</td>' +
                    '<td>' + obj.kode_icd + '</td>' +
                    '<td>' + obj.nama_penyakit + '</td>' +
                    '<td>' + obj.deskripsi + '</td>' +
                    '<td>' +
                    '<button class="btn btn-success btn-sm btn-detail btn-ubah" data_id="' + obj.id + '">Ubah</button>' +
                    ' <button class="btn btn-danger btn-sm btn-detail btn-hapus" data_id="' + obj.id + '">Hapus</button>' +
                    '</td>' +
                    '</tr>')
        });
        alert(response.message);
        ubah();
        hapus();
    }

    function ubah() {
        $(".btn-ubah").click(function () {
            $.ajax({
                url: "/diagnosis/" + $(this).attr('data_id'),
                type: "GET",
                success: function (response) {
                    var obj = response.data.dataDiagnosis;
                    $('#id_diagnosis').val(obj.id);
                    $('#kode_dtd').val(obj.kode_dtd);
                    $('#kode_icd').val(obj.kode_icd);
                    $('#nama').val(obj.nama_penyakit);
                    $('#deskripsi').val(obj.deskripsi);
                    bukaCollapse();
                }
            });
        });
    }

    function hapus() {
        $(".btn-hapus").click(function () {
            $('#del_id').val($(this).attr('data_id'));
            $.ajax({
                url: "/diagnosis/" + $(this).attr('data_id'),
                type: "GET",
                success: function (response) {
                    $('#del_nama').val(response.data.dataDiagnosis.nama_penyakit);
                    $('#delete_modal').modal('show');
                }
            });
        });
    }

    function tutupModal() {
        $('#del_id').val('');
        $('#del_nama').val('');
        $('#delete_modal').modal('hide');
    }

    $('#tbh_data').click(function () {
        bukaCollapse();
    });

    $('#batal').click(function () {
        tutupCollapse();
    });

    $('#batal_hapus').click(function () {
        tutupModal();
    });

    $(function () {
        $('#yakin_hapus').click(function () {
            $.ajax({
                url: "/diagnosis/" + $('#del_id').val(),
                type: "DELETE",
                success: function (response) {
                    refreshTable(response);
                    tutupModal();
                }
            });
        });
    });

    $(function () {
        $('#simpan').click(function () {
            if ($('#id_diagnosis').val() == "") {
                var value = {
                    kode_dtd: $('#kode_dtd').val(),
                    kode_icd: $('#kode_icd').val(),
                    nama: $('#nama').val(),
                    deskripsi: $('#deskripsi').val(),
                };
                var url = "/diagnosis";

                $.ajax({
                    url: url,
                    type: "POST",
                    data: value,
                    success: function (response) {
                        refreshTable(response);
                        tutupCollapse();
                    }
                });
            } else {
                var value = {
                    kode_dtd: $('#kode_dtd').val(),
                    kode_icd: $('#kode_icd').val(),
                    nama: $('#nama').val(),
                    deskripsi: $('#deskripsi').val(),
                };
                var url = "/diagnosis/" + $('#id_diagnosis').val();

                $.ajax({
                    url: url,
                    type: "PATCH",
                    data: value,
                    success: function (response) {
                        refreshTable(response);
                        tutupCollapse();
                    }
                });
            }
        });
        ubah();
        hapus();
    });
</script>
@endpush
