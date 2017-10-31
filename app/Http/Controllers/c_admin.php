<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\kamar;
use App\jenisPelayanan;
use App\riwayat;
use App\RumahSakitRujuk;
use App\diagnosis;

class c_admin extends Controller
{

    // Dashboard
    public function index()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login.index'));
    }


    // Laporan
    public function laporan_internal($tahunnya = null)
    {
        $datatahun = riwayat::select(DB::raw('YEAR(created_at) as tahun'))->distinct('tahun')->get();
        $datanya[] = '';
        if ($tahunnya != null) {
            for ($i = 0; $i < 12; $i++) {
                $pasienawal = '';
                $pasienmasuk = '';
                $pasienkeluar = '';
                $sisapasien = '';
                $jml_hari_perawatan = '';
                $jml_lama_dirawat = '';
                $tt = '';
                $periode = 1;
                $mati_kurang_48 = '';
                $mati_lebih_48 = '';

                //hitung pasien awal
                if ($i == 0) {
                    $cekpasienawal = riwayat::whereYear('tgl_masuk', $tahunnya - 1)->whereMonth('tgl_masuk', '12')->whereNull('tgl_keluar')->get();
                    if ($cekpasienawal != null) {
                        $pasienawal = riwayat::whereYear('tgl_masuk', $tahunnya - 1)->whereMonth('tgl_masuk', '12')->whereNull('tgl_keluar')->count('tgl_masuk');
                    } else {
                        $pasienawal = 0;
                    }
                } else {
                    $cekpasienawal = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i)->whereNull('tgl_keluar')->get();
                    if ($cekpasienawal != null) {
                        $pasienawal = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i)->whereNull('tgl_keluar')->count('tgl_masuk');
                    } else {
                        $pasienawal = 0;
                    }
                }

                //hitung pasien masuk
                $cekpasienmasuk = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->get();
                if ($cekpasienmasuk != null) {
                    $pasienmasuk = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->count('tgl_masuk');
                } else {
                    $pasienmasuk = 0;
                }

                //hitung pasien keluar
                $cekpasienkeluar = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->get();
                if ($cekpasienkeluar != null) {
                    $pasienkeluar = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->count('tgl_keluar');
                } else {
                    $pasienkeluar = 0;
                }

                //hitung sisa pasien
                $ceksisapasien = riwayat::whereNull('tgl_keluar')->whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->get();
                if ($ceksisapasien != null) {
                    $sisapasien = riwayat::whereNull('tgl_keluar')->whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->count('tgl_masuk');
                } else {
                    $sisapasien = 0;
                }

                //hitung jumlah hari perawatan
                $cekjml_hari_perawatan = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->get();
                if ($cekjml_hari_perawatan != null) {
                    $jml_hari_perawatan = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->sum('jumlah_hari_perawatan');
                } else {
                    $jml_hari_perawatan = 0;
                }

                //jumlah lama dirawat
                $cekjml_lama_dirawat = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->get();
                if ($cekjml_lama_dirawat != null) {
                    $jml_lama_dirawat = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->sum('jumlah_lama_perawatan');
                } else {
                    $jml_lama_dirawat = 0;
                }

                //jumlah tt
                $tt = kamar::sum('jumlah');

                //hitung periode
                $periode = cal_days_in_month(CAL_GREGORIAN, $i + 1, $tahunnya);

                //hitung mati <= 48 jam
                $cekmati_kurang_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('kurang_48', '=', '1')->get();
                if ($cekmati_kurang_48 != null) {
                    $mati_kurang_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('kurang_48', '=', '1')->count('kurang_48');
                } else {
                    $mati_kurang_48 = 0;
                }

                //hitung mati > 48 jam
                $cekmati_lebih_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('lebih_48', '=', '1')->get();
                if ($cekmati_lebih_48 != null) {
                    $mati_lebih_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('lebih_48', '=', '1')->sum('lebih_48');
                } else {
                    $mati_lebih_48 = 0;
                }

                $datanya[$i]['bulan'] = date("F", mktime(0, 0, 0, $i + 1, 1));
                $datanya[$i]['pasienawal'] = $pasienawal;
                $datanya[$i]['pasienmasuk'] = $pasienmasuk;
                $datanya[$i]['pasienkeluar'] = $pasienkeluar;
                $datanya[$i]['sisapasien'] = $sisapasien;
                $datanya[$i]['jml_hari_perawatan'] = $jml_hari_perawatan;
                $datanya[$i]['jml_lama_dirawat'] = $jml_lama_dirawat;
                $datanya[$i]['tt'] = $tt;
                $datanya[$i]['periode'] = $periode;
                $datanya[$i]['mati_kurang_48'] = $mati_kurang_48;
                $datanya[$i]['mati_lebih_48'] = $mati_lebih_48;
            }
        }
        return view('admin.laporan_internal', compact('datatahun', 'tahunnya', 'datanya'));
    }

    public function laporan_external_rl12($tahunnya = null, $kamarid = null)
    {
        $datatahun = riwayat::select(DB::raw('YEAR(created_at) as tahun'))->distinct('tahun')->get();
        $datakamar = kamar::all();
        $datanya = '';
        $pasienawal = 0;
        $pasienmasuk = 0;
        $pasienkeluar = 0;
        $jml_hari_perawatan = 0;
        $jml_lama_dirawat = 0;
        $tt = 0;
        $periode = 0;
        $mati_kurang_48 = 0;
        $mati_lebih_48 = 0;

        if ($tahunnya != null && $kamarid != null) {
            for ($i = 0; $i < 12; $i++) {


                //hitung pasien awal
                if ($i == 0) {
                    $cekpasienawal = riwayat::whereYear('tgl_masuk', $tahunnya - 1)->whereMonth('tgl_masuk', '12')->whereNull('tgl_keluar')->where('id_kamar',$kamarid)->get();
                    if ($cekpasienawal != null) {
                        $pasienawal += riwayat::whereYear('tgl_masuk', $tahunnya - 1)->whereMonth('tgl_masuk', '12')->whereNull('tgl_keluar')->where('id_kamar',$kamarid)->count('tgl_masuk');
                    } else {
                        $pasienawal += 0;
                    }
                } else {
                    $cekpasienawal = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i)->whereNull('tgl_keluar')->where('id_kamar',$kamarid)->get();
                    if ($cekpasienawal != null) {
                        $pasienawal += riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i)->whereNull('tgl_keluar')->where('id_kamar',$kamarid)->count('tgl_masuk');
                    } else {
                        $pasienawal += 0;
                    }
                }

                //hitung pasien masuk
                $cekpasienmasuk = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->where('id_kamar',$kamarid)->get();
                if ($cekpasienmasuk != null) {
                    $pasienmasuk += riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->where('id_kamar',$kamarid)->count('tgl_masuk');
                } else {
                    $pasienmasuk += 0;
                }

                //hitung pasien keluar
                $cekpasienkeluar = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('id_kamar',$kamarid)->get();
                if ($cekpasienkeluar != null) {
                    $pasienkeluar += riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('id_kamar',$kamarid)->count('tgl_keluar');
                } else {
                    $pasienkeluar += 0;
                }

                //hitung jumlah hari perawatan
                $cekjml_hari_perawatan = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('id_kamar',$kamarid)->get();
                if ($cekjml_hari_perawatan != null) {
                    $jml_hari_perawatan += riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('id_kamar',$kamarid)->sum('jumlah_hari_perawatan');
                } else {
                    $jml_hari_perawatan += 0;
                }

                //jumlah lama dirawat
                $cekjml_lama_dirawat = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('id_kamar',$kamarid)->get();
                if ($cekjml_lama_dirawat != null) {
                    $jml_lama_dirawat += riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('id_kamar',$kamarid)->sum('jumlah_lama_perawatan');
                } else {
                    $jml_lama_dirawat += 0;
                }

                //jumlah tt
                $tt = kamar::where('id',$kamarid)->sum('jumlah');

                //hitung periode
                $periode += cal_days_in_month(CAL_GREGORIAN, $i + 1, $tahunnya);

                //hitung mati <= 48 jam
                $cekmati_kurang_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('kurang_48', '=', '1')->where('id_kamar',$kamarid)->get();
                if ($cekmati_kurang_48 != null) {
                    $mati_kurang_48 += riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('kurang_48', '=', '1')->where('id_kamar',$kamarid)->count('kurang_48');
                } else {
                    $mati_kurang_48 += 0;
                }

                //hitung mati > 48 jam
                $cekmati_lebih_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('lebih_48', '=', '1')->where('id_kamar',$kamarid)->get();
                if ($cekmati_lebih_48 != null) {
                    $mati_lebih_48 += riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('lebih_48', '=', '1')->where('id_kamar',$kamarid)->sum('lebih_48');
                } else {
                    $mati_lebih_48 += 0;
                }
            }
        }

        if ($pasienkeluar != 0 && $jml_hari_perawatan !=0 && $tt != 0) {
            $datanya['bor'] = round($jml_hari_perawatan/($tt*$periode) * 100,2);
            $datanya['los'] = round($jml_lama_dirawat/$pasienkeluar,2);
            $datanya['toi'] = round(($tt * $periode)-$jml_hari_perawatan/$pasienkeluar,2);
            $datanya['bto'] = round($pasienkeluar/$tt,2);
            $datanya['ndr'] = round($mati_lebih_48/$pasienkeluar * 1000,2);
            $datanya['gdr'] = round(($mati_lebih_48+$mati_kurang_48)/$pasienkeluar * 1000,2);
            $datanya['kunjungan'] = ceil($pasienmasuk/$periode);
        }else{
            $datanya['bor'] = 0;
            $datanya['los'] = 0;
            $datanya['toi'] = 0;
            $datanya['bto'] = 0;
            $datanya['ndr'] = 0;
            $datanya['gdr'] = 0;
            $datanya['kunjungan'] = 0;
        }

        return view('admin.laporan_external_rl12', compact('datatahun', 'datakamar', 'tahunnya','datanya','kamarid'));
    }

    public function laporan_external_rl13($tahunnya = null)
    {
        $datatahun = kamar::select(DB::raw('YEAR(created_at) as tahun'))->distinct('tahun')->get();
        if ($tahunnya != null) {
            $kamarnya = kamar::all();
            $datapelayanan = jenisPelayanan::all();
            return view('admin.laporan_external_rl13', compact('datatahun', 'tahunnya', 'kamarnya', 'datapelayanan'));
        }

        return view('admin.laporan_external_rl13', compact('datatahun', 'tahunnya'));
    }

    public function laporan_external_rl31($tahunnya = null)
    {
        $datatahun = riwayat::select(DB::raw('YEAR(created_at) as tahun'))->distinct('tahun')->get();
        if ($tahunnya != null) {
            $pelayanan = jenisPelayanan::all();
            $kamar = kamar::all();
            return view('admin.laporan_external_rl31', compact('datatahun', 'pelayanan', 'tahunnya', 'kamar'));
        }
        return view('admin.laporan_external_rl31', compact('datatahun', 'tahunnya'));
    }

    public function laporan_external_rl4a($tahunnya = null)
    {
        $datatahun = riwayat::select(DB::raw('YEAR(created_at) as tahun'))->distinct('tahun')->get();
        $datadiagnosis = '';
        if ($tahunnya != null) {
            $cekdiagnosis = riwayat::join('diagnoses as d', 'riwayats.id_diagnosis', '=', 'd.id')->select('id_diagnosis',DB::raw('COUNT(riwayats.id_diagnosis) as jml'))->whereYear('tgl_keluar', $tahunnya)->groupBy('riwayats.id_diagnosis')->orderBy('jml', 'DESC')->get();
            for ($i=0; $i<count($cekdiagnosis); $i++){
                $datadiagnosis[$i] = diagnosis::where('id',$cekdiagnosis[$i]->id_diagnosis)->first();
            }
        }
        return view('admin.laporan_external_rl4a', compact('datatahun','datadiagnosis','tahunnya'));
    }

    public function laporan_external_rl53($tahunnya = null)
    {
        $datatahun = riwayat::select(DB::raw('YEAR(created_at) as tahun'))->distinct('tahun')->get();
        $datadiagnosis = '';
        if ($tahunnya != null) {
            $cekdiagnosis = riwayat::join('diagnoses as d', 'riwayats.id_diagnosis', '=', 'd.id')->select('id_diagnosis',DB::raw('COUNT(riwayats.id_diagnosis) as jml'))->whereYear('tgl_keluar', $tahunnya)->groupBy('riwayats.id_diagnosis')->orderBy('jml', 'DESC')->limit(10)->get();
            for ($i=0; $i<count($cekdiagnosis); $i++){
                $datadiagnosis[$i] = diagnosis::where('id',$cekdiagnosis[$i]->id_diagnosis)->first();
            }
        }
        return view('admin.laporan_external_rl53', compact('datatahun','datadiagnosis','tahunnya'));
    }

    // Cetak
    public function cetak_internal($tahunnya = null)
    {
        $datatahun = riwayat::select(DB::raw('YEAR(created_at) as tahun'))->distinct('tahun')->get();
        $datanya[] = '';
        if ($tahunnya != null) {
            for ($i = 0; $i < 12; $i++) {
                $pasienawal = '';
                $pasienmasuk = '';
                $pasienkeluar = '';
                $sisapasien = '';
                $jml_hari_perawatan = '';
                $jml_lama_dirawat = '';
                $tt = '';
                $periode = 1;
                $mati_kurang_48 = '';
                $mati_lebih_48 = '';

                //hitung pasien awal
                if ($i == 0) {
                    $cekpasienawal = riwayat::whereYear('tgl_masuk', $tahunnya - 1)->whereMonth('tgl_masuk', '12')->whereNull('tgl_keluar')->get();
                    if ($cekpasienawal != null) {
                        $pasienawal = riwayat::whereYear('tgl_masuk', $tahunnya - 1)->whereMonth('tgl_masuk', '12')->whereNull('tgl_keluar')->count('tgl_masuk');
                    } else {
                        $pasienawal = 0;
                    }
                } else {
                    $cekpasienawal = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i)->whereNull('tgl_keluar')->get();
                    if ($cekpasienawal != null) {
                        $pasienawal = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i)->whereNull('tgl_keluar')->count('tgl_masuk');
                    } else {
                        $pasienawal = 0;
                    }
                }

                //hitung pasien masuk
                $cekpasienmasuk = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->get();
                if ($cekpasienmasuk != null) {
                    $pasienmasuk = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->count('tgl_masuk');
                } else {
                    $pasienmasuk = 0;
                }

                //hitung pasien keluar
                $cekpasienkeluar = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->get();
                if ($cekpasienkeluar != null) {
                    $pasienkeluar = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->count('tgl_keluar');
                } else {
                    $pasienkeluar = 0;
                }

                //hitung sisa pasien
                $ceksisapasien = riwayat::whereNull('tgl_keluar')->whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->get();
                if ($ceksisapasien != null) {
                    $sisapasien = riwayat::whereNull('tgl_keluar')->whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->count('tgl_masuk');
                } else {
                    $sisapasien = 0;
                }

                //hitung jumlah hari perawatan
                $cekjml_hari_perawatan = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->get();
                if ($cekjml_hari_perawatan != null) {
                    $jml_hari_perawatan = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->sum('jumlah_hari_perawatan');
                } else {
                    $jml_hari_perawatan = 0;
                }

                //jumlah lama dirawat
                $cekjml_lama_dirawat = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->get();
                if ($cekjml_lama_dirawat != null) {
                    $jml_lama_dirawat = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->sum('jumlah_lama_perawatan');
                } else {
                    $jml_lama_dirawat = 0;
                }

                //jumlah tt
                $tt = kamar::sum('jumlah');

                //hitung periode
                $periode = cal_days_in_month(CAL_GREGORIAN, $i + 1, $tahunnya);

                //hitung mati <= 48 jam
                $cekmati_kurang_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('kurang_48', '=', '1')->get();
                if ($cekmati_kurang_48 != null) {
                    $mati_kurang_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('kurang_48', '=', '1')->count('kurang_48');
                } else {
                    $mati_kurang_48 = 0;
                }

                //hitung mati > 48 jam
                $cekmati_lebih_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('lebih_48', '=', '1')->get();
                if ($cekmati_lebih_48 != null) {
                    $mati_lebih_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('lebih_48', '=', '1')->sum('lebih_48');
                } else {
                    $mati_lebih_48 = 0;
                }

                $datanya[$i]['bulan'] = date("F", mktime(0, 0, 0, $i + 1, 1));
                $datanya[$i]['pasienawal'] = $pasienawal;
                $datanya[$i]['pasienmasuk'] = $pasienmasuk;
                $datanya[$i]['pasienkeluar'] = $pasienkeluar;
                $datanya[$i]['sisapasien'] = $sisapasien;
                $datanya[$i]['jml_hari_perawatan'] = $jml_hari_perawatan;
                $datanya[$i]['jml_lama_dirawat'] = $jml_lama_dirawat;
                $datanya[$i]['tt'] = $tt;
                $datanya[$i]['periode'] = $periode;
                $datanya[$i]['mati_kurang_48'] = $mati_kurang_48;
                $datanya[$i]['mati_lebih_48'] = $mati_lebih_48;
            }
        }
        return view('admin.laporan_internal_print', compact('datatahun', 'tahunnya', 'datanya'));
    }

    public function cetak_laporan_external_rl12($tahunnya = null, $kamarid = null)
    {
        $datatahun = riwayat::select(DB::raw('YEAR(created_at) as tahun'))->distinct('tahun')->get();
        $datakamar = kamar::all();
        $datanya = '';
        $pasienawal = 0;
        $pasienmasuk = 0;
        $pasienkeluar = 0;
        $jml_hari_perawatan = 0;
        $jml_lama_dirawat = 0;
        $tt = 0;
        $periode = 0;
        $mati_kurang_48 = 0;
        $mati_lebih_48 = 0;

        if ($tahunnya != null && $kamarid != null) {
            for ($i = 0; $i < 12; $i++) {


                //hitung pasien awal
                if ($i == 0) {
                    $cekpasienawal = riwayat::whereYear('tgl_masuk', $tahunnya - 1)->whereMonth('tgl_masuk', '12')->whereNull('tgl_keluar')->where('id_kamar',$kamarid)->get();
                    if ($cekpasienawal != null) {
                        $pasienawal += riwayat::whereYear('tgl_masuk', $tahunnya - 1)->whereMonth('tgl_masuk', '12')->whereNull('tgl_keluar')->where('id_kamar',$kamarid)->count('tgl_masuk');
                    } else {
                        $pasienawal += 0;
                    }
                } else {
                    $cekpasienawal = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i)->whereNull('tgl_keluar')->where('id_kamar',$kamarid)->get();
                    if ($cekpasienawal != null) {
                        $pasienawal += riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i)->whereNull('tgl_keluar')->where('id_kamar',$kamarid)->count('tgl_masuk');
                    } else {
                        $pasienawal += 0;
                    }
                }

                //hitung pasien masuk
                $cekpasienmasuk = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->where('id_kamar',$kamarid)->get();
                if ($cekpasienmasuk != null) {
                    $pasienmasuk += riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->where('id_kamar',$kamarid)->count('tgl_masuk');
                } else {
                    $pasienmasuk += 0;
                }

                //hitung pasien keluar
                $cekpasienkeluar = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('id_kamar',$kamarid)->get();
                if ($cekpasienkeluar != null) {
                    $pasienkeluar += riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('id_kamar',$kamarid)->count('tgl_keluar');
                } else {
                    $pasienkeluar += 0;
                }

                //hitung jumlah hari perawatan
                $cekjml_hari_perawatan = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('id_kamar',$kamarid)->get();
                if ($cekjml_hari_perawatan != null) {
                    $jml_hari_perawatan += riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('id_kamar',$kamarid)->sum('jumlah_hari_perawatan');
                } else {
                    $jml_hari_perawatan += 0;
                }

                //jumlah lama dirawat
                $cekjml_lama_dirawat = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('id_kamar',$kamarid)->get();
                if ($cekjml_lama_dirawat != null) {
                    $jml_lama_dirawat += riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('id_kamar',$kamarid)->sum('jumlah_lama_perawatan');
                } else {
                    $jml_lama_dirawat += 0;
                }

                //jumlah tt
                $tt = kamar::where('id',$kamarid)->sum('jumlah');

                //hitung periode
                $periode += cal_days_in_month(CAL_GREGORIAN, $i + 1, $tahunnya);

                //hitung mati <= 48 jam
                $cekmati_kurang_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('kurang_48', '=', '1')->where('id_kamar',$kamarid)->get();
                if ($cekmati_kurang_48 != null) {
                    $mati_kurang_48 += riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('kurang_48', '=', '1')->where('id_kamar',$kamarid)->count('kurang_48');
                } else {
                    $mati_kurang_48 += 0;
                }

                //hitung mati > 48 jam
                $cekmati_lebih_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('lebih_48', '=', '1')->where('id_kamar',$kamarid)->get();
                if ($cekmati_lebih_48 != null) {
                    $mati_lebih_48 += riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('lebih_48', '=', '1')->where('id_kamar',$kamarid)->sum('lebih_48');
                } else {
                    $mati_lebih_48 += 0;
                }
            }
        }

        if ($pasienkeluar != 0 && $jml_hari_perawatan !=0 && $tt != 0) {
            $datanya['bor'] = round($jml_hari_perawatan/($tt*$periode) * 100,2);
            $datanya['los'] = round($jml_lama_dirawat/$pasienkeluar,2);
            $datanya['toi'] = round(($tt * $periode)-$jml_hari_perawatan/$pasienkeluar,2);
            $datanya['bto'] = round($pasienkeluar/$tt,2);
            $datanya['ndr'] = round($mati_lebih_48/$pasienkeluar * 1000,2);
            $datanya['gdr'] = round(($mati_lebih_48+$mati_kurang_48)/$pasienkeluar * 1000,2);
            $datanya['kunjungan'] = ceil($pasienmasuk/$periode);
        }else{
            $datanya['bor'] = 0;
            $datanya['los'] = 0;
            $datanya['toi'] = 0;
            $datanya['bto'] = 0;
            $datanya['ndr'] = 0;
            $datanya['gdr'] = 0;
            $datanya['kunjungan'] = 0;
        }

        return view('admin.cetak_laporan_external_rl12', compact('datatahun', 'datakamar', 'tahunnya','datanya','kamarid'));
    }

    public function cetak_laporan_external_rl13($tahunnya = null)
    {
        $datatahun = kamar::select(DB::raw('YEAR(created_at) as tahun'))->distinct('tahun')->get();
        if ($tahunnya != null) {
            $kamarnya = kamar::all();
            $datapelayanan = jenisPelayanan::all();
            return view('admin.cetak_laporan_external_rl13', compact('datatahun', 'tahunnya', 'kamarnya', 'datapelayanan'));
        }
        return view('admin.cetak_laporan_external_rl13', compact('datatahun', 'tahunnya'));
    }

    public function cetak_laporan_external_rl31($tahunnya = null)
    {
        $pelayanan = jenisPelayanan::all();
        $kamar = kamar::all();
        return view('admin.cetak_laporan_external_rl31', compact('pelayanan', 'tahunnya', 'kamar'));
    }

    public function cetak_laporan_external_rl4a($tahunnya = null)
    {
        $datatahun = riwayat::select(DB::raw('YEAR(created_at) as tahun'))->distinct('tahun')->get();
        $datadiagnosis = '';
        if ($tahunnya != null) {
            $cekdiagnosis = riwayat::join('diagnoses as d', 'riwayats.id_diagnosis', '=', 'd.id')->select('id_diagnosis',DB::raw('COUNT(riwayats.id_diagnosis) as jml'))->whereYear('tgl_keluar', $tahunnya)->groupBy('riwayats.id_diagnosis')->orderBy('jml', 'DESC')->get();
            for ($i=0; $i<count($cekdiagnosis); $i++){
                $datadiagnosis[$i] = diagnosis::where('id',$cekdiagnosis[$i]->id_diagnosis)->first();
            }
        }

        return view('admin.cetak_laporan_external_rl4a', compact('datatahun','datadiagnosis','tahunnya'));
    }

    public function cetak_laporan_external_rl53($tahunnya = null)
    {
        $datadiagnosis = '';
        if ($tahunnya != null) {
            $cekdiagnosis = riwayat::join('diagnoses as d', 'riwayats.id_diagnosis', '=', 'd.id')->select('id_diagnosis',DB::raw('COUNT(riwayats.id_diagnosis) as jml'))->whereYear('tgl_keluar', $tahunnya)->groupBy('riwayats.id_diagnosis')->orderBy('jml', 'DESC')->limit(10)->get();
            for ($i=0; $i<count($cekdiagnosis); $i++){
                $datadiagnosis[$i] = diagnosis::where('id',$cekdiagnosis[$i]->id_diagnosis)->first();
            }
        }
        return view('admin.cetak_laporan_external_rl53', compact('datadiagnosis','tahunnya'));
    }

    // Transaksi
    public function t_pasien_masuk()
    {
        $data = riwayat::all();
        return view('admin.t_pasien_masuk', compact('data'));
    }

    public function t_pasien_keluar()
    {
        $data = riwayat::where('tgl_keluar', '<>', null)->get();
        $rawat = riwayat::where('tgl_keluar', null)->get();
        $datars = RumahSakitRujuk::all();
        return view('admin.t_pasien_keluar', compact('data', 'rawat', 'datars'));
    }

}

