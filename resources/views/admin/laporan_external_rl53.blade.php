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
                                        <button id="tampilkan" type="button" class="btn btn-primary">Tampil</button>
                                    </li>
                                    <li>
                                        @if($tahunnya != null)
                                            <a href="/adm_ctk_lap_ex_rl53/{{$tahunnya}}" target="_blank" class="btn btn-default">Print</a>
                                        @else
                                            <a onclick="alert('Pilih Tahun dulu dan Tampil')" target="_blank" class="btn btn-default">Print</a>
                                        @endif
                                    </li>
                                </ol>
                            </div>
                        </div><!-- /.box-header -->
                    </div>
                </div>
                <h3>
                    Formulir RL 5.3 Daftar 10 Besar Penyakit Rawat Inap
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
                    RL 5.3 Daftar 10 Besar Penyakit Rawat Inap
                    <!-- <small>advanced tables</small> -->
                </h3>
                <div class="box-body">
                    @if($tahunnya == null)
                        <h3><center>Silahkan Pilih Tahun Dulu</center></h3>
                    @else
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th rowspan="2" data-field="text" data-sortable="true">No Urut</th>
                            <th rowspan="2" data-field="text" data-sortable="true">Kode ICD X</th>
                            <th rowspan="2" data-field="text" data-sortable="true">Deskripsi</th>
                            <th colspan="2" data-field="text" data-sortable="true">Pasien Keluar Hidup Menurut Jenis
                                Kelamin
                            </th>
                            <th colspan="2" data-field="text" data-sortable="true">Pasien Keluar Mati Menurut Jenis
                                Kelamin
                            </th>
                            <th rowspan="2" data-field="text" data-sortable="true">Total (Hidup dan Mati)</th>
                        </tr>
                        <tr>
                            <th data-field="text" data-sortable="true">LK</th>
                            <th data-field="text" data-sortable="true">PR</th>
                            <th data-field="text" data-sortable="true">LK</th>
                            <th data-field="text" data-sortable="true">PR</th>
                        </tr>
                        <tr>
                            <th data-field="text" data-sortable="true">1</th>
                            <th data-field="text" data-sortable="true">2</th>
                            <th data-field="text" data-sortable="true">3</th>
                            <th data-field="text" data-sortable="true">4</th>
                            <th data-field="text" data-sortable="true">5</th>
                            <th data-field="text" data-sortable="true">6</th>
                            <th data-field="text" data-sortable="true">7</th>
                            <th data-field="text" data-sortable="true">8</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=0)
                        @foreach($datadiagnosis as $diagnosis)
                            @php($i++)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $diagnosis->kode_icd }}</td>
                                <td>{{ $diagnosis->deskripsi }}</td>
                                <td>{{ $datakeluarhiduplaki = \App\riwayat::join('pasiens as p','riwayats.id_pasien','=','p.id')->whereNotNull('tgl_keluar')->whereYear('tgl_keluar',$tahunnya)->where('id_diagnosis',$diagnosis->id)->where('status_keluar','Hidup')->where('p.jenis_kelamin','Laki-Laki')->count() }}</td>
                                <td>{{ $datakeluarhidupperempuan = \App\riwayat::join('pasiens as p','riwayats.id_pasien','=','p.id')->whereNotNull('tgl_keluar')->whereYear('tgl_keluar',$tahunnya)->where('id_diagnosis',$diagnosis->id)->where('status_keluar','Hidup')->where('p.jenis_kelamin','Perempuan')->count() }}</td>
                                <td>{{ $datakeluarmatilaki = \App\riwayat::join('pasiens as p','riwayats.id_pasien','=','p.id')->whereNotNull('tgl_keluar')->whereYear('tgl_keluar',$tahunnya)->where('id_diagnosis',$diagnosis->id)->where('status_keluar','Meninggal')->where('p.jenis_kelamin','Laki-Laki')->count() }}</td>
                                <td>{{ $datakeluarmatiperempuan = \App\riwayat::join('pasiens as p','riwayats.id_pasien','=','p.id')->whereNotNull('tgl_keluar')->whereYear('tgl_keluar',$tahunnya)->where('id_diagnosis',$diagnosis->id)->where('status_keluar','Meninggal')->where('p.jenis_kelamin','Perempuan')->count() }}</td>
                                <td>{{ $datakeluarhiduplaki + $datakeluarhidupperempuan + $datakeluarmatilaki + $datakeluarmatiperempuan }}</td>
                            </tr>
                        @endforeach
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
                if ($('#tahunlapor').val() != ''){
                    window.location.href = '/adm_lap_ex_rl53/' + $('#tahunlapor').val();
                }else{
                    alert('Pilih Tahun');
                }
            })
        })
    </script>
@endpush
