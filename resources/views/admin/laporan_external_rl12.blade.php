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
                                        <select id="tahunlapor" class="form-control select2" style="width: 100%;">
                                            <option value="" selected="selected">Tahun</option>
                                            @foreach($datatahun as $tahun)
                                                <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li>
                                        <select id="kamarlapor" class="form-control select2">
                                            <option value="" selected="selected">Kamar</option>
                                            @foreach($datakamar as $kamar)
                                                <option value="{{ $kamar->id }}">{{ $kamar->nama_kamar }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li>
                                        <button id="tampilkan" type="button" class="btn btn-primary">Tampil</button>
                                    </li>
                                    <li><a href="/adm_ctk_lap_ex_rl12" target="_blank" class="btn btn-default">Print</a>
                                    </li>
                                </ol>
                            </div>
                        </div><!-- /.box-header -->
                    </div>
                </div>
                <h3>
                    Formulir RL 1.2 Indikator Pelayanan Rumah Sakit
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
                                    <td>@if($tahunnya == null) - @else {{$tahunnya}} @endif</td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <h3>
                    RL 1.2 Indikator Pelayanan Rumah Sakit
                    <!-- <small>advanced tables</small> -->
                </h3>
                <div class="box-body">
                    @if($tahunnya == null)
                        <h3><center>Silahkan Pilih Tahun Dulu</center></h3>
                    @else
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th data-field="text" >Tahun</th>
                            <th data-field="text" >BOR</th>
                            <th data-field="text" >LOS</th>
                            <th data-field="text" >TOI</th>
                            <th data-field="text" >BTO</th>
                            <th data-field="text" >NDR</th>
                            <th data-field="text" >GDR</th>
                            <th data-field="text" >Rata-Rata Kunjungan Per Hari</th>
                        </tr>
                        <tr>
                            <th data-field="text" >1</th>
                            <th data-field="text" >2</th>
                            <th data-field="text" >3</th>
                            <th data-field="text" >4</th>
                            <th data-field="text" >5</th>
                            <th data-field="text" >6</th>
                            <th data-field="text" >7</th>
                            <th data-field="text" >8</th>
                        </tr>
                        </thead>
                        <tbody>
                        <td>{{ $tahunnya }}</td>
                        <td>{{ $datanya['bor'] }}</td>
                        <td>{{ $datanya['los'] }}</td>
                        <td>{{ $datanya['toi'] }}</td>
                        <td>{{ $datanya['bto'] }}</td>
                        <td>{{ $datanya['ndr'] }}</td>
                        <td>{{ $datanya['gdr'] }}</td>
                        <td>{{ $datanya['kunjungan'] }}</td>
                        </tbody>
                    </table>
                    @endif
                </div><!-- /.box-body -->
            </div>
        </section>
    </div>
    <!-- </div> -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {

            $('#tampilkan').click(function () {
                if ($('#tahunlapor').val() != '' && $('#kamarlapor').val() != ''){
                    console.log('halo');
                    window.location.href = '/adm_lap_ex_rl12/' + $('#tahunlapor').val() + '/' + $('#kamarlapor').val();
                }else{
                    alert('Tahun atau kamar belum dipilij');
                }
            })
        })
    </script>
@endpush
