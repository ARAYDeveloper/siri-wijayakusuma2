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
                                                <option value="{{ $tahun->$tahun }}">{{ $tahun->$tahun }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-primary">Tampil</button>
                                    </li>
                                    <li><a href="/adm_ctk_lap_ex_rl4a" target="_blank" class="btn btn-default">Print</a>
                                    </li>
                                </ol>
                            </div>
                        </div><!-- /.box-header -->
                    </div>
                </div>
                <h3>
                    Formulir RL 4a Indikator Data Keadaan Pasien Rawat Inap Rumah Sakit
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
                                    <td>2017</td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <h3>
                    RL 4a Indikator Data Keadaan Pasien Rawat Inap Rumah Sakit
                    <!-- <small>advanced tables</small> -->
                </h3>
                <div class="box-body">
                    @if($tahunnya == null)
                        <h3><center>Silahkan Pilih Tahun Dulu</center></h3>
                    @else
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th rowspan="3" data-field="text" data-sortable="true">No. Urut</th>
                            <th rowspan="3" data-field="text" data-sortable="true">No. DTD</th>
                            <th rowspan="3" data-field="text" data-sortable="true">No. Daftar Terperinci</th>
                            <th rowspan="3" data-field="text" data-sortable="true">Golongan Sebab Penyakit</th>
                            <th colspan="18" data-field="text" data-sortable="true">Jumlah Pasien Hidup dan Mati menurut
                                Golongan Umur & Jenis Kelamin
                            </th>
                            <th colspan="2" data-field="text" data-sortable="true">Pasien Keluar (Hidup & Mati) Menurut
                                Jenis Kelamin
                            </th>
                            <th rowspan="2" data-field="text" data-sortable="true">Jumlah Pasien Keluar Hidup (23+24)
                            </th>
                            <th rowspan="2" data-field="text" data-sortable="true">Jumlah Pasien Keluar Mati</th>
                        </tr>
                        <tr>
                            <th colspan="2" data-field="text" data-sortable="true">0-6 hr</th>
                            <th colspan="2" data-field="text" data-sortable="true">7-28hr</th>
                            <th colspan="2" data-field="text" data-sortable="true">28hr-&lt 1th</th>
                            <th colspan="2" data-field="text" data-sortable="true">1-4th</th>
                            <th colspan="2" data-field="text" data-sortable="true">5-14th</th>
                            <th colspan="2" data-field="text" data-sortable="true">15-24th</th>
                            <th colspan="2" data-field="text" data-sortable="true">25-44th</th>
                            <th colspan="2" data-field="text" data-sortable="true">45-64th</th>
                            <th colspan="2" data-field="text" data-sortable="true">&gt 65</th>
                            <th rowspan="2" data-field="text" data-sortable="true">LK</th>
                            <th rowspan="2" data-field="text" data-sortable="true">PR</th>

                        </tr>
                        <tr>
                            <th data-field="text" data-sortable="true">L</th>
                            <th data-field="text" data-sortable="true">P</th>
                            <th data-field="text" data-sortable="true">L</th>
                            <th data-field="text" data-sortable="true">P</th>
                            <th data-field="text" data-sortable="true">L</th>
                            <th data-field="text" data-sortable="true">P</th>
                            <th data-field="text" data-sortable="true">L</th>
                            <th data-field="text" data-sortable="true">P</th>
                            <th data-field="text" data-sortable="true">L</th>
                            <th data-field="text" data-sortable="true">P</th>
                            <th data-field="text" data-sortable="true">L</th>
                            <th data-field="text" data-sortable="true">P</th>
                            <th data-field="text" data-sortable="true">L</th>
                            <th data-field="text" data-sortable="true">P</th>
                            <th data-field="text" data-sortable="true">L</th>
                            <th data-field="text" data-sortable="true">P</th>
                            <th data-field="text" data-sortable="true">L</th>
                            <th data-field="text" data-sortable="true">P</th>
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
                            <th data-field="text" data-sortable="true">9</th>
                            <th data-field="text" data-sortable="true">10</th>
                            <th data-field="text" data-sortable="true">11</th>
                            <th data-field="text" data-sortable="true">12</th>
                            <th data-field="text" data-sortable="true">13</th>
                            <th data-field="text" data-sortable="true">14</th>
                            <th data-field="text" data-sortable="true">15</th>
                            <th data-field="text" data-sortable="true">16</th>
                            <th data-field="text" data-sortable="true">17</th>
                            <th data-field="text" data-sortable="true">18</th>
                            <th data-field="text" data-sortable="true">19</th>
                            <th data-field="text" data-sortable="true">20</th>
                            <th data-field="text" data-sortable="true">21</th>
                            <th data-field="text" data-sortable="true">22</th>
                            <th data-field="text" data-sortable="true">23</th>
                            <th data-field="text" data-sortable="true">24</th>
                            <th data-field="text" data-sortable="true">25</th>
                            <th data-field="text" data-sortable="true">26</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php($i++)
                        @foreach($datadiagnosis as $diagnosis)
                            @php($i++)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $diagnosis->kode_dtd }}</td>
                                <td>{{ $diagnosis->kode_icd }}</td>
                                <td>{{ $diagnosis->nama_penyakit }}</td>
                                <td></td>
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
                    window.location.href = '/adm_lap_ex_rl4a/' + $('#tahunlapor').val();
                }else{
                    alert('Pilih Tahun');
                }
            })
        })
    </script>
@endpush