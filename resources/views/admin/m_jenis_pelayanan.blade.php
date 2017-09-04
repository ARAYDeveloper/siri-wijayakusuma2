@extends('admin.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Jenis Pelayanan
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
                                                <h3 class="box-title">Data Jenis Pelayanan</h3>
                                            </div><!-- /.box-header -->
                                            <!-- form start -->
                                            <div class="form-horizontal">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Jenis Layanan</label>
                                                        <div class="col-sm-5">
                                                            <input id="id_layanan" type="hidden" value="">
                                                            <input id="jenis_layanan" name="jenis_layanan" type="text"
                                                                   class="form-control"
                                                                   placeholder="Masukkan Nama Layanan">
                                                        </div>
                                                    </div><!-- /.box-body -->
                                                    <div class="box-footer">
                                                        <div class="col-md-4"></div>
                                                        <button id="simpan" class="btn btn-primary">Simpan</button>
                                                        <button type="reset" id="batal" class="btn btn-warning">Batal
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
                            <table id="example2" data-toggle="table"
                                   data-pagination="true" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">Jenis Layanan</th>
                                    <th data-field="text">Tanggal</th>
                                    <th>Operasi</th>
                                </tr>
                                </thead>
                                <tbody id="listdata">
                                @foreach($jenisLayanan as $layanan)
                                    <tr>
                                        <td>{{$layanan->jenis_pelayanan}}</td>
                                        <td>{{$layanan->updated_at}}</td>
                                        <td>
                                            <button class="btn btn-success btn-sm btn-ubah"
                                                    data_id="{{$layanan->id}}"
                                                    data_jenis="{{$layanan->jenis_pelayanan}}">Ubah
                                            </button>
                                            <button class="btn btn-danger btn-sm btn-hapus"
                                                    data_id="{{$layanan->id}}"
                                                    data_jenis="{{$layanan->jenis_pelayanan}}">Hapus
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
                    <form>
                        <input type="hidden" id="del_id" value="">
                        <div class="form-group">
                            <label>Apakah Anda Yakin Akan Menghapus Layanan</label><br>
                            <input id="nama_layanan" type="text" readonly value="" class="form-control">
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
    <!-- </div> -->
@endsection

@push('scripts')
<script>

    $('#tbh_data').click(function () {
        $('#id_layanan').val('');
        $('#jenis_layanan').val('');

        $('#collapse1').collapse('show');
    });

    $('#batal').click(function () {
        $('#id_layanan').val('');
        $('#jenis_layanan').val('');

        $('#collapse1').collapse('hide');
    });

    function ubah() {
        $(".btn-ubah").click(function () {
            var idLyn = $(this).attr('data_id');
            var namaLyn = $(this).attr('data_jenis');

            $('#id_layanan').val(idLyn);
            $('#jenis_layanan').val(namaLyn);

            $('#collapse1').collapse('show');
        });
    }

    $('#batal_hapus').click(function () {
        $('#del_id').val('');
        $('#nama_layanan').val('');

        $('#delete_modal').modal('hide');
    });

    function hapus() {
        $(".btn-hapus").click(function () {
            var idLyn = $(this).attr('data_id');
            var namaLyn = $(this).attr('data_jenis');

            $('#del_id').val(idLyn);
            $('#nama_layanan').val(namaLyn);

            $('#delete_modal').modal('show');
        });
    }

    function refreshTable (response) {
        $('#listdata').html('');
        $.each(response.data.datalayanan, function (index, obj) {

            $('#listdata').append('' +
                    '<tr>' +
                    '<td>' + obj.jenis_pelayanan + '</td>' +
                    '<td>' + obj.updated_at + '</td>' +
                    '<td>' +
                    '<button class="btn btn-success btn-sm btn-detail btn-ubah" data_id="' + obj.id + '" data_jenis="' + obj.jenis_pelayanan + '">Ubah</button>' +
                    ' <button class="btn btn-danger btn-sm btn-detail btn-hapus" data_id="' + obj.id + '" data_jenis="' + obj.jenis_pelayanan + '">Hapus</button>' +
                    '</td>' +
                    '</tr>')
        });

        ubah();
        hapus();
    }

    $(function () {
        $('#yakin_hapus').click(function () {

            var url = "/layanan/" + $('#del_id').val();

            $.ajax({
                url: url,
                type: "DELETE",
                success: function (response) {

                    refreshTable(response);

                    $('#delete_modal').modal('hide');
                    $('#del_id').val('');
                    $('#nama_layanan').val('');

                    alert('Data Berhasil Di Hapus');


                    ubah();
                    hapus();
                }
            });
        })
    });

    $(function () {
        $('#simpan').click(function () {
            if ($('#id_layanan').val() != "") {

                var value = {
                    jenis_layanan: $('#jenis_layanan').val()
                };

                var id = $('#id_layanan').val();

                var url = "/layanan/" + $('#id_layanan').val();
                {{--var url = "{{ route('layanan.update', ["layanan" => ":layanan"]) }}";--}}
                {{--url.replace(":layanan", id);--}}
                {{----}}
                console.log(url);

                console.log('masuk');
                $.ajax({
                    url: url,
                    type: "PATCH",
                    data: value,
                    success: function (response) {

                        refreshTable(response);

                        $('#id_layanan').val('');
                        $('#jenis_layanan').val('');
                        $('#collapse1').collapse('hide');

                        alert("Data berhasil Di Ubah !");

                    }
                })

            } else {
                var value = {
                    jenis_layanan: $('#jenis_layanan').val()
                };

                $.ajax({
                    url: "{{ route('layanan.store') }}",
                    type: "POST",
                    data: value,
                    success: function (response) {

                        refreshTable(response);

                        $('#id_layanan').val('');
                        $('#jenis_layanan').val('');
                        $('#collapse1').collapse('hide');

                        alert("Data berhasil Di Simpan !");

                    }
                });
            }
        });

        ubah();
        hapus();
    });

</script>
@endpush