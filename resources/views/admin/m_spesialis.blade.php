@extends('admin.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Spesialis
                <!-- <small>tambah spesialis</small> -->
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
                                                <h3 class="box-title">Data Spesialis</h3>
                                            </div><!-- /.box-header -->
                                            <!-- form start -->
                                            <div class="form-horizontal">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Data Spesialis</label>
                                                        <div class="col-sm-5">
                                                            <input type="hidden" id="id_spesialis" name="id_spesialis"
                                                                   value="">
                                                            <input id="spesialis" name="spesialis"
                                                                   type="text"
                                                                   class="form-control"
                                                                   placeholder="Masukkan Jenis Spesialis">
                                                        </div>
                                                    </div><!-- /.box-body -->

                                                    <div class="box-footer">
                                                        <div class="col-md-4"></div>
                                                        <button id="simpan" class="btn btn-primary">Simpan</button>
                                                        <button id="batal" type="reset" class="btn btn-warning">Batal
                                                        </button>
                                                    </div><!-- /.box-footer -->
                                                </div>
                                            </div>
                                        </div><!-- /.box -->
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" data-toggle="table" data-search="true" data-select-item-name="toolbar1"
                                   data-pagination="true" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">Spesialis</th>
                                    <th data-field="text">Tanggal</th>
                                    <th data-field="button">Operasi</th>
                                </tr>
                                </thead>
                                <tbody id="listdata">
                                @foreach($spesialis as $item)
                                    <tr>
                                        <td>{{$item->spesialis}}</td>
                                        <td>{{$item->updated_at}}</td>
                                        <td>
                                            <button class="btn btn-success btn-sm btn-ubah"
                                                    data_id="{{$item->id}}"
                                                    data_jenis="{{$item->spesialis}}">Ubah
                                            </button>
                                            <button class="btn btn-danger btn-sm btn-hapus"
                                                    data_id="{{$item->id}}"
                                                    data_jenis="{{$item->spesialis}}">Hapus
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
        <div class="modal-dialog" style=" color: #5e5e5e">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" id="del_id" value="">
                        <div class="form-group">
                            <label>Apakah Anda Yakin Akan Menghapus Spesialis</label><br>
                            <input id="nama_spesialis" type="text" readonly value="" class="form-control">
                        </div>
                    </form>
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

    function ubah() {
        $(".btn-ubah").click(function () {
            var idSpesialis = $(this).attr('data_id');
            var spesialis = $(this).attr('data_jenis');

            $('#id_spesialis').val(idSpesialis);
            $('#spesialis').val(spesialis);

            $('#collapse1').collapse('show');
        });
    }

    function tutupCollapse() {
        $('#id_spesialis').val('');
        $('#spesialis').val('');

        $('#collapse1').collapse('hide');
    }

    function bukaCollapse() {
        $('#id_spesialis').val('');
        $('#spesialis').val('');

        $('#collapse1').collapse('show');
    }

    function hapus() {
        $(".btn-hapus").click(function () {
            $('#del_id').val($(this).attr('data_id'));
            $('#nama_spesialis').val($(this).attr('data_jenis'));
            $('#delete_modal').modal('show');
        });
    }

    function tutupModal() {
        $('#del_id').val('');
        $('#nama_spesialis').val('');
        $('#delete_modal').modal('hide');
    }

    function refreshTable(response) {
        $('#listdata').html('');
        $.each(response.data.dataspesialis, function (index, obj) {
            $('#listdata').append('' +
                    '<tr>' +
                    '<td>' + obj.spesialis + '</td>' +
                    '<td>' + obj.updated_at + '</td>' +
                    '<td>' +
                    '<button class="btn btn-success btn-sm btn-detail btn-ubah" data_id="' + obj.id + '" data_jenis="' + obj.spesialis + '">Ubah</button>' +
                    ' <button class="btn btn-danger btn-sm btn-detail btn-hapus" data_id="' + obj.id + '" data_jenis="' + obj.spesialis + '">Hapus</button>' +
                    '</td>' +
                    '</tr>')
        });
        ubah();
        hapus();
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

            var url = "/spesialis/" + $('#del_id').val();

            $.ajax({
                url: url,
                type: "DELETE",
                success: function (response) {
                    refreshTable(response);
                    tutupModal();

                    alert("Data Berhasil Di Hapus !");
                }
            });
        });
    });

    $(function () {
        $('#simpan').click(function () {
            if ($('#id_spesialis').val() != "") {
                var value = {
                    spesialis: $('#spesialis').val()
                };

                var url = "/spesialis/" + $('#id_spesialis').val();

                $.ajax({
                    url: url,
                    type: "PATCH",
                    data: value,
                    success: function (response) {
                        refreshTable(response);
                        tutupCollapse();

                        alert("Data Berhasil Di Ubah !");
                    }
                });
            } else {
                var value = {
                    spesialis: $('#spesialis').val()
                };

                $.ajax({
                    url: "{{route('spesialis.store')}}",
                    type: "POST",
                    data: value,
                    success: function (response) {
                        refreshTable(response);
                        tutupCollapse();

                        alert("Data Berhasil Di Simpan !")
                    }
                });
            }
        });
        ubah();
        hapus();
    });
</script>
@endpush