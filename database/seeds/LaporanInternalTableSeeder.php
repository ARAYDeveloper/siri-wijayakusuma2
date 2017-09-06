<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LaporanInternalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $datas = [
            [
                'id' => 1,
                'tahun' => '2017',
                'bulan' => '1',
                'nama_kamar' => 'VIP Atas',
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id' => 2,
                'tahun' => '2017',
                'bulan' => '2',
                'nama_kamar' => 'VIP Atas',
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id' => 3,
                'tahun' => '2017',
                'bulan' => '3',
                'nama_kamar' => 'VIP Atas',
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id' => 4,
                'tahun' => '2017',
                'bulan' => '4',
                'nama_kamar' => 'VIP Atas',
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id' => 5,
                'tahun' => '2017',
                'bulan' => '5',
                'nama_kamar' => 'VIP Atas',
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id' => 6,
                'tahun' => '2017',
                'bulan' => '6',
                'nama_kamar' => 'VIP Atas',
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id' => 7,
                'tahun' => '2017',
                'bulan' => '7',
                'nama_kamar' => 'VIP Atas',
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id' => 8,
                'tahun' => '2017',
                'bulan' => '9',
                'nama_kamar' => 'VIP Atas',
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id' => 9,
                'tahun' => '2017',
                'bulan' => '9',
                'nama_kamar' => 'VIP Atas',
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id' => 10,
                'tahun' => '2017',
                'bulan' => '10',
                'nama_kamar' => 'VIP Atas',
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id' => 11,
                'tahun' => '2017',
                'bulan' => '11',
                'nama_kamar' => 'VIP Atas',
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id' => 12,
                'tahun' => '2017',
                'bulan' => '12',
                'nama_kamar' => 'VIP Atas',
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ]
        ];
        DB::table('laporan_internals')->insert($datas);
    }
}
