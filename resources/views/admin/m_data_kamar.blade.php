@extends('admin.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Kamar
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
                                                <h3 class="box-title">Tambah Data Kamar</h3>
                                            </div><!-- /.box-header -->
                                            <!-- form start -->
                                            <div class="form-horizontal">
                                                <div class="box-body">
                                                    <input type="hidden" name="id_kamar" id="id_kamar" value="">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Nama Kamar</label>
                                                        <div class="col-sm-5">
                                                            <input id="nama" name="nama" type="text"
                                                                   class="form-control" placeholder="Nama Kamar">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Kelas Perawatan</label>
                                                        <div class=" col-sm-5">
                                                            <select name="layanan" id="layanan" class="form-control ">
                                                                @foreach($layanan as $item )
                                                                    <option value="{{$item->id}}">{{$item->jenis_pelayanan}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Jumlah</label>
                                                        <div class="col-sm-5">
                                                            <input name="jumlah" id="jumlah" pattern="[0-9]{1,3}" value="" type="number"
                                                                   class="form-control"
                                                                   placeholder="Jumlah Tempat Tidur" min="1" required>
                                                        </div>
                                                    </div>
                                                </div><!-- /.box-body -->
                                                <div class="box-footer">
                                                    <div class="col-md-4"></div>
                                                    <button id="simpan" class="btn btn-primary">Simpan</button>
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
                            <table id="example2" data-toggle="table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">Nama Kamar</th>
                                    <th data-sortable="true">Kelas Perawatan</th>
                                    <th data-sortable="true">Jumlah Tempat Tidur</th>
                                    <th data-sortable="true">Sisa Tempat Tidur</th>
                                    <th data-sortable="true">Tanggal</th>
                                    <th data-field="button" data-sortable="true">Operasi</th>
                                </tr>
                                </thead>
                                <tbody id="listdata">
                                @foreach($kamar as $item )
                                    <tr>
                                        <td>{{$item->nama_kamar}}</td>
                                        <td>{{$item->jenisLayanan->jenis_pelayanan}}</td>
                                        <td>{{$item->jumlah}}</td>
                                        <td>{{$item->sisa_pakai}}</td>
                                        <td>{{$item->updated_at}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success btn-ubah"
                                                    data_id="{{$item->id}}">
                                                Ubah
                                            </button>
                                            <button class="btn btn-sm btn-danger btn-hapus"
                                                    data_id="{{$item->id}}">
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
                        <label>Apakah Anda Yakin Akan Menghapus Kamar</label><br>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Kamar</label>
                            <div class="col-sm-7">
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
@endsection

@push('scripts')
<script>
    $(function () {
        $('#jumlah').bind('keyup paste', function(){
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $("#jumlah").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && (e.keyCode < 96 || e.keyCode > 105)) {
                //display error message
                return false;
            }
        });

    });
    function resetForm() {
        $('#id_kamar').val('');
        $('#nama').val('');
        $('#jumlah').val('');
        $.ajax({
            url: "/getLayanan",
            type: "GET",
            success: function (response) {
                $('#layanan').html('');
                $.each(response.data.dataLayanan, function (index, obj) {
                    $('#layanan').append('' +
                            '<option value="' + obj.id + '">' + obj.jenis_pelayanan + '</option>');
                });
            }
        });
    }

    function bukaCollapse() {
        $('#collapse1').collapse('show');
    }

    function tutupCollapse() {
        resetForm();
        $('#collapse1').collapse('hide');
    }

    function tutupModal() {
        $('#del_id').val('');
        $('#del_nama').val('');
        $('#delete_modal').modal('hide');
    }

    function refreshTable(response) {
        $('#listdata').html('');
        $.each(response.data.dataKamar, function (index, obj) {
            $('#listdata').append('' +
                    '<tr>' +
                    '<td>' + obj.nama_kamar + '</td>' +
                    '<td>' + obj.jenis_layanan.jenis_pelayanan + '</td>' +
                    '<td>' + obj.jumlah + '</td>' +
                    '<td>' + obj.sisa_pakai + '</td>' +
                    '<td>' + obj.updated_at + '</td>' +
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
                url: "/kamar/" + $(this).attr('data_id'),
                type: "GET",
                success: function (response) {
                    var obj = response.data.dataKamar;
                    $('#id_kamar').val(obj.id);
                    $('#nama').val(obj.nama_kamar);
                    $('#layanan').val(obj.id_pelayanan);
                    $('#jumlah').val(obj.jumlah);
                    bukaCollapse();
                }
            });
        });
    }

    function hapus() {
        $(".btn-hapus").click(function () {
            $.ajax({
                url: "/kamar/" + $(this).attr('data_id'),
                type: "GET",
                success: function (response) {
                    var obj = response.data.dataKamar;
                    $('#del_id').val(obj.id);
                    $('#del_nama').val(obj.nama_kamar);
                    $('#delete_modal').modal('show');
                }
            });
        })
    }

    $('#batal_hapus').click(function () {
        tutupModal();
    });

    $('#tbh_data').click(function () {
        bukaCollapse();
    });

    $('#batal').click(function () {
        tutupCollapse();
    });

    $(function () {
        $('#yakin_hapus').click(function () {
            $.ajax({
                url: "/kamar/" + $('#del_id').val(),
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
            if ($('#id_kamar').val() == "") {
                var value = {
                    nama_kamar: $('#nama').val(), layanan: $('#layanan').val(), jumlah: $('#jumlah').val()
                };
                $.ajax({
                    url: "/kamar",
                    type: "POST",
                    data: value,
                    success: function (response) {
                        refreshTable(response);
                        tutupCollapse();
                    }
                });
            } else {
                var value = {
                    nama_kamar: $('#nama').val(), layanan: $('#layanan').val(), jumlah: $('#jumlah').val()
                };
                $.ajax({
                    url: "/kamar/" + $('#id_kamar').val(),
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
