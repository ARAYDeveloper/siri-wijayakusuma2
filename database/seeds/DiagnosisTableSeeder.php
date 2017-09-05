<?php

use Illuminate\Database\Seeder;

class DiagnosisTableSeeder extends Seeder
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
                'kode_dtd' => '876',
                'kode_icd' => '877',
                'nama_penyakit' => 'Liver',
                'deskripsi' => 'Salah satu penyakit berbahaya yang tumbuh dan menyerang manusia',
                'created_at' => '2017-02-08 00:00:00',
                'updated_at' => '2017-02-08 00:00:00'
            ],
            [
                'id' => 2,
                'kode_dtd' => '878',
                'kode_icd' => '879',
                'nama_penyakit' => 'Jantung',
                'deskripsi' => 'Salah satu penyakit berbahaya yang tumbuh di jantung',
                'created_at' => '2017-02-08 00:00:00',
                'updated_at' => '2017-02-08 00:00:00'
            ],
        ];
        DB::table('diagnoses')->insert($datas);
    }
}
