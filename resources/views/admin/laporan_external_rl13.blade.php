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
                                    <li><a href="/adm_ctk_lap_ex_rl13" target="_blank" class="btn btn-default">Print</a>
                                    </li>
                                </ol>
                            </div>
                        </div><!-- /.box-header -->
                    </div>
                </div>
                <h3>
                    Formulir RL 1.3 Fasilitas Tempat Tidur Rawat Inap
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
                    RL 1.3 Fasilitas Tempat Tidur Rawat Inap
                    <!-- <small>advanced tables</small> -->
                </h3>
                <div class="box-body">
                    @if($tahunnya == null)
                        <h3><center>Silahkan Pilih Tahun Dulu</center></h3>
                    @else
                    <table id="example2"class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th rowspan="2" data-field="text" data-sortable="true">No</th>
                            <th rowspan="2" data-field="text" data-sortable="true">Jenis Pelayanan</th>
                            <th rowspan="2" data-field="text" data-sortable="true">Jumlah TT</th>
                            <th colspan="7" data-field="text" data-sortable="true" ><center>Perincian Tempat Tidur Kelas</center></th>
                        </tr>
                        <tr>
                            @foreach($kamarnya as $kamarlapor)
                                <th data-field="text" data-sortable="true">{{ $kamarlapor->nama_kamar }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                            @php($i=0)
                            @foreach($datapelayanan as $pelayanan)
                                @php($i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $pelayanan->jenis_pelayanan }}</td>
                                    @php($okejumlahtt = \App\kamar::where('id_pelayanan', $pelayanan->id)->whereYear('created_at',$tahunnya)->sum('jumlah'))
                                        <td>{{ $okejumlahtt }}</td>
                                    @foreach($kamarnya as $kamarlapor2)
                                        @php($cekkamar = \App\kamar::where('id_pelayanan', $pelayanan->id)->whereYear('created_at', $tahunnya)->where('id', $kamarlapor2->id)->first())
                                        @if($cekkamar != null)
                                            @php($okejumlahkamar = \App\kamar::where('id_pelayanan', $pelayanan->id)->whereYear('created_at', $tahunnya)->where('id', $kamarlapor2->id)->sum('jumlah'))
                                            <td>{{ $okejumlahkamar }}</td>
                                        @else
                                            <td>0</td>
                                        @endif
                                    @endforeach
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
                    window.location.href = '/adm_lap_ex_rl13/' + $('#tahunlapor').val();
                }else{
                    alert('Pilih Tahun');
                }
            })
        })
    </script>
@endpush
