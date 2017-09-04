<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KamarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas =[
            [
                'id'=>1,
                'nama_kamar' => 'VIP Atas',
                'jumlah' => 10,
                'sisa_pakai' => 10,
                'id_pelayanan' => 2,
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id'=>2,
                'nama_kamar' => 'VIP bawah',
                'jumlah' => 8,
                'sisa_pakai' => 8,
                'id_pelayanan' => 2,
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id'=>3,
                'nama_kamar' => 'Mawar',
                'jumlah' => 12,
                'sisa_pakai' => 12,
                'id_pelayanan' => 3,
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id'=>4,
                'nama_kamar' => 'Melati',
                'jumlah' => 6,
                'sisa_pakai' => 16,
                'id_pelayanan' => 3,
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id'=>5,
                'nama_kamar' => 'Dahlia',
                'jumlah' => 10,
                'sisa_pakai' => 10,
                'id_pelayanan' => 3,
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id'=>6,
                'nama_kamar' => 'Seruni',
                'jumlah' => 7,
                'sisa_pakai' => 7,
                'id_pelayanan' => 3,
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id'=>7,
                'nama_kamar' => 'HCU',
                'jumlah' => 13,
                'sisa_pakai' => 13,
                'id_pelayanan' => 3,
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ]
        ];

        DB::table('kamars')->insert($datas);
    }
}
