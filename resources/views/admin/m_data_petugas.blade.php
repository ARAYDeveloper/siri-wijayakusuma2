@extends('admin.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Petugas
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
                                                <h3 class="box-title">Tambah Data Petugas</h3>
                                            </div><!-- /.box-header -->
                                            <!-- form start -->
                                            <div class="form-horizontal">
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="hidden" name="id_pegawai" id="id_pegawai"
                                                                   value="">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">NIK</label>
                                                                <div class="col-sm-7">
                                                                    <input name="nik" id="nik" value="" type="text"
                                                                           class="form-control"
                                                                           placeholder="NIK Pegawai">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">NIP</label>
                                                                <div class="col-sm-7">
                                                                    <input name="nip" id="nip" value="" type="text"
                                                                           class="form-control"
                                                                           placeholder="NIP Pegawai">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Nama</label>
                                                                <div class="col-sm-7">
                                                                    <input name="nama" id="nama" value="" type="text"
                                                                           class="form-control"
                                                                           placeholder="Nama Pegawai">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Tanggal
                                                                    Lahir</label>
                                                                <div class="col-sm-7">
                                                                    <input name="tgl_lahir" id="tgl_lahir" type="text"
                                                                           class="form-control"
                                                                           data-date-format='yyyy-mm-dd'>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Alamat</label>
                                                                <div class="col-sm-7">
                                                                    <!-- <input type="textarea" class="form-control" placeholder=""> -->
                                                                    <textarea name="alamat" id="alamat"
                                                                              class="form-control"
                                                                              placeholder="Alamat Pegawai"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Jenis
                                                                    Kelamin</label>
                                                                <div class=" col-sm-7">
                                                                    <select name="jenis_kelamin" id="jenis_kelamin"
                                                                            class="form-control ">
                                                                        <option selected="selected" value="Laki-Laki">
                                                                            Laki-Laki
                                                                        </option>
                                                                        <option value="Perempuan">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Agama</label>
                                                                <div class=" col-sm-7">
                                                                    <select name="agama" id="agama"
                                                                            class="form-control ">
                                                                        <option selected="selected" value="Islam">
                                                                            Islam
                                                                        </option>
                                                                        <option value="Katolik">Katolik</option>
                                                                        <option value="Protestan">Protestan</option>
                                                                        <option value="Budha">Budha</option>
                                                                        <option value="Hindu">Hindu</option>
                                                                        <option value="Konghucu">Konghucu</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Kewarganegaraan</label>
                                                                <div class=" col-sm-7">
                                                                    <select name="warga" id="warga"
                                                                            class="form-control ">
                                                                        <option selected="selected" value="WNI">WNI
                                                                        </option>
                                                                        <option value="WNA">WNA</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Status</label>
                                                                <div class=" col-sm-7">
                                                                    <select name="status" id="status"
                                                                            class="form-control ">
                                                                        <option value="Kawin">Kawin</option>
                                                                        <option selected="selected" value="Belum Kawin">
                                                                            Belum
                                                                            Kawin
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Spesialis</label>
                                                                <div class=" col-sm-7">
                                                                    <select name="spesialis" id="spesialis"
                                                                            class="form-control ">
                                                                        @foreach($spesialis as $dataspes)
                                                                            <option value="{{$dataspes->id}}">{{$dataspes->spesialis}}</option>
                                                                        @endforeach
                                                                    </select>
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
                                    <th data-sortable="true">NIP</th>
                                    <th data-sortable="true">NIK</th>
                                    <th>Nama</th>
                                    <th data-sortable="true">Tanggal Lahir</th>
                                    <th data-sortable="true">Alamat</th>
                                    <th data-sortable="true">Jenis Kelamin</th>
                                    <th data-sortable="true">Agama</th>
                                    <th data-sortable="true">Kewarganegaraan</th>
                                    <th data-sortable="true">Status</th>
                                    <th data-sortable="true">Spesialis</th>
                                    <th data-field="button" data-sortable="true">Operasi</th>
                                </tr>
                                </thead>
                                <tbody id="listdata">
                                @foreach($petugas as $pas)
                                    <tr>
                                        <td>{{$pas->nip}}</td>
                                        <td>{{$pas->nik}}</td>
                                        <td>{{$pas->nama}}</td>
                                        <td>{{$pas->tgl_lahir}}</td>
                                        <td>{{$pas->alamat}}</td>
                                        <td>{{$pas->jenis_kelamin}}</td>
                                        <td>{{$pas->agama}}</td>
                                        <td>{{$pas->kewarganegaraan}}</td>
                                        <td>{{$pas->status}}</td>
                                        <td>{{$pas->spesialis->spesialis}}</td>
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
                        <label>Apakah Anda Yakin Akan Menghapus Petugas</label><br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">NIP</label>
                            <div class="col-sm-8">
                                <input name="del_nip" id="del_nip" value="" type="text"
                                       class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">NIK</label>
                            <div class="col-sm-8">
                                <input name="del_nik" id="del_nik" value="" type="text"
                                       class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama</label>
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

    $(function () {
        $('input[name="tgl_lahir"]').datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, autoclose: true});

        $("#nik, #nip").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && (e.keyCode < 96 || e.keyCode > 105)) {
                //display error message
                return false;
            }
        });

    });
    function resetForm() {
        $('#id_pegawai').val('');
        $('#nip').val('');
        $('#nik').val('');
        $('#nama').val('');
        $('#alamat').val('');
        $('#tgl_lahir').val('');
        $('#jenis_kelamin').find('option').prop('selected', function () {
            return this.defaultSelected;
        });
        $('#agama').find('option').prop('selected', function () {
            return this.defaultSelected;
        });
        $('#warga').find('option').prop('selected', function () {
            return this.defaultSelected;
        });
        $('#status').find('option').prop('selected', function () {
            return this.defaultSelected;
        });
        $('#spesialis').find('option').prop('selected', function () {
            return this.defaultSelected;
        });
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
        $.each(response.data.dataPetugas, function (index, obj) {
            $('#listdata').append('' +
                    '<tr>' +
                    '<td>' + obj.nip + '</td>' +
                    '<td>' + obj.nik + '</td>' +
                    '<td>' + obj.nama + '</td>' +
                    '<td>' + obj.tgl_lahir + '</td>' +
                    '<td>' + obj.alamat + '</td>' +
                    '<td>' + obj.jenis_kelamin + '</td>' +
                    '<td>' + obj.agama + '</td>' +
                    '<td>' + obj.kewarganegaraan + '</td>' +
                    '<td>' + obj.status + '</td>' +
                    '<td>' + obj.spesialis.spesialis + '</td>' +
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
                url: "/petugas/" + $(this).attr('data_id'),
                type: "GET",
                success: function (response) {
                    var obj = response.data.dataPetugas;
                    $('#id_pegawai').val(obj.id);
                    $('#nip').val(obj.nip);
                    $('#nik').val(obj.nik);
                    $('#nama').val(obj.nama);
                    $('#alamat').val(obj.alamat);
                    $('#tgl_lahir').val(obj.tgl_lahir);
                    $('#jenis_kelamin').val(obj.jenis_kelamin).trigger('change');
                    $('#agama').val(obj.agama).trigger('change');
                    $('#warga').val(obj.kewarganegaraan).trigger('change');
                    $('#status').val(obj.status).trigger('change');
                    $('#spesialis').val(obj.id_spesialis).trigger('change');
                    bukaCollapse();
                }
            });
        });
    }

    function hapus() {
        $(".btn-hapus").click(function () {
            $('#del_id').val($(this).attr('data_id'));
            $.ajax({
                url: "/petugas/" + $(this).attr('data_id'),
                type: "GET",
                success: function (response) {
                    $('#del_nip').val(response.data.dataPetugas.nip);
                    $('#del_nik').val(response.data.dataPetugas.nik);
                    $('#del_nama').val(response.data.dataPetugas.nama);
                    $('#delete_modal').modal('show');
                }
            });
        });
    }

    function tutupModal() {
        $('#del_id').val('');
        $('#del_nip').val('');
        $('#del_nik').val('');
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
                url: "/petugas/" + $('#del_id').val(),
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
            if ($('#id_pegawai').val() == "") {
                var value = {
                    nip: $('#nip').val(),
                    nik: $('#nik').val(),
                    nama: $('#nama').val(),
                    alamat: $('#alamat').val(),
                    tgl_lahir: $('#tgl_lahir').val(),
                    jenis_kelamin: $('#jenis_kelamin').val(),
                    agama: $('#agama').val(),
                    warga: $('#warga').val(),
                    status: $('#status').val(),
                    id_spesialis: $('#spesialis').val(),
                };
                var url = "/petugas";

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
                    nip: $('#nip').val(),
                    nik: $('#nik').val(),
                    nama: $('#nama').val(),
                    alamat: $('#alamat').val(),
                    tgl_lahir: $('#tgl_lahir').val(),
                    jenis_kelamin: $('#jenis_kelamin').val(),
                    agama: $('#agama').val(),
                    warga: $('#warga').val(),
                    status: $('#status').val(),
                    id_spesialis: $('#spesialis').val(),
                };
                var url = "/petugas/" + $('#id_pegawai').val();

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
