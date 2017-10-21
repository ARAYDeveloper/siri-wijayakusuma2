<?php

use Illuminate\Database\Seeder;

class RiwayatsTableSeeder extends Seeder
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
                'id_pasien' => 1,
                'id_kamar' => 1,
                'id_pembayaran' => 1,
                'id_diagnosis' => 1,
                'tgl_masuk' => '2016-02-24 00:00:00',
                'tgl_keluar' => '2016-02-27 00:00:00',
                'pindah' => "tidak",
                'pulang_paksa' => 'Tidak',
                'jumlah_hari_perawatan' => 4,
                'jumlah_lama_perawatan' => 3,
                'status_keluar' => 'Hidup',
                'id_rumah_sakit_rujuks' => 1,
                'created_at' => '2016-02-29 00:00:00',
                'updated_at' => '2016-02-29 00:00:00'
            ],
            [
                'id' => 2,
                'id_pasien' => 2,
                'id_kamar' => 2,
                'id_pembayaran' => 2,
                'id_diagnosis' => 2,
                'tgl_masuk' => '2016-02-27 00:00:00',
                'tgl_keluar' => null,
                'pindah' => "tidak",
                'pulang_paksa' => 'Tidak',
                'jumlah_hari_perawatan' => 3,
                'jumlah_lama_perawatan' => 2,
                'status_keluar' => 'Hidup',
                'id_rumah_sakit_rujuks' => 1,
                'created_at' => '2016-02-29 00:00:00',
                'updated_at' => '2016-02-29 00:00:00'
            ]
        ];
        DB::table('riwayats')->insert($datas);
    }
}
