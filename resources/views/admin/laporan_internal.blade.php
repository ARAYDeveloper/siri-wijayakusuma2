@extends('admin.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Laporan Internal
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
                                            @foreach($datatahun as $th)
                                                <option value="{{ $th->tahun }}">{{ $th->tahun }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li>
                                        <button id="tampilkan" type="button" class="btn btn-primary">Tampil</button>
                                    </li>
                                    <li>
                                        @if($tahunnya != null)
                                            <a href="/adm_ctk_lap_in/{{$tahunnya}}" target="_blank"
                                                class="btn btn-default">Print</a>
                                        @else
                                            <a onclick="alert('Pilih Tahun dan Klik Tampil Dulu')" target="_blank"
                                               class="btn btn-default">Print</a>
                                        @endif
                                    </li>
                                </ol>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            @if($tahunnya == null)
                                <h3><center>Silahkan Pilih Tahun Dulu</center></h3>
                            @else
                                <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">Bulan</th>
                                    <th data-field="text">Pasien Awal</th>
                                    <th data-field="text" data-sortable="true">Ps. Masuk</th>
                                    <th data-field="text" data-sortable="true">Ps. Keluar</th>
                                    <th data-field="text" data-sortable="true">Sisa Pasien</th>
                                    <th data-field="text" data-sortable="true">Jml Hr Perawatan</th>
                                    <th data-field="text" data-sortable="true">Jml Lm Dirawat</th>
                                    <th data-field="text" data-sortable="true">TT</th>
                                    <th data-field="text" data-sortable="true">Periode</th>
                                    <th data-field="text" data-sortable="true">BOR (%)</th>
                                    <th data-field="text" data-sortable="true">ALOS (HR)</th>
                                    <th data-field="text" data-sortable="true">BTO</th>
                                    <th data-field="text" data-sortable="true">Mati 48 jam</th>
                                    <th data-field="text" data-sortable="true">Mati 48 jam</th>
                                    <th data-field="text" data-sortable="true">NDR</th>
                                    <th data-field="text" data-sortable="true">GDR</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($i=0; $i<count($datanya); $i++)
                                    <tr>
                                        <td>{{ $datanya[$i]["bulan"] }}</td>
                                        <td>{{ $datanya[$i]["pasienawal"] }}</td>
                                        <td>{{ $datanya[$i]["pasienmasuk"] }}</td>
                                        <td>{{ $datanya[$i]["pasienkeluar"] }}</td>
                                        <td>{{ $datanya[$i]["sisapasien"] }}</td>
                                        <td>{{ $datanya[$i]["jml_hari_perawatan"] }}</td>
                                        <td>{{ $datanya[$i]["jml_lama_dirawat"] }}</td>
                                        <td>{{ $datanya[$i]["tt"] }}</td>
                                        <td>{{ $datanya[$i]["periode"] }}</td>
                                        <td>{{ round($datanya[$i]["jml_hari_perawatan"]/($datanya[$i]["tt"] * $datanya[$i]["periode"]) * 100, 2) }}</td>
                                        @if($datanya[$i]["pasienkeluar"] != 0)
                                            <td>{{ round($datanya[$i]["jml_lama_dirawat"]/$datanya[$i]["pasienkeluar"],2) }}</td>
                                        @else
                                            <td>0</td>
                                        @endif
                                        @if($datanya[$i]["tt"] != 0)
                                            <td>{{ round($datanya[$i]["pasienkeluar"]/$datanya[$i]["tt"],2) }}</td>
                                        @else
                                            <td>0</td>
                                        @endif
                                        <td>{{ $datanya[$i]["mati_kurang_48"] }}</td>
                                        <td>{{ $datanya[$i]["mati_lebih_48"] }}</td>
                                        @if($datanya[$i]["pasienkeluar"] != 0)
                                            <td>{{ round($datanya[$i]["mati_lebih_48"]/$datanya[$i]["pasienkeluar"] * 1000,2) }}</td>
                                            <td>{{ round($datanya[$i]["mati_kurang_48"]+$datanya[$i]["mati_lebih_48"]/$datanya[$i]["pasienkeluar"] * 1000,2) }}</td>
                                        @else
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                            @endif
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
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
                    window.location.href = '/adm_lap_in/' + $('#tahunlapor').val();
                }else{
                    alert('Pilih Tahun');
                }
            })
        })
    </script>
@endpush
