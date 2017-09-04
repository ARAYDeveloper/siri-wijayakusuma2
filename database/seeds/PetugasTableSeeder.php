<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PetugasTableSeeder extends Seeder
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
                'nip'=>'19890201897789',
                'nik' => '35099198902010004',
                'nama' => 'Adi Sucahyo',
                'tgl_lahir' => '1982-02-01',
                'alamat' => 'Jalan Pattimura 9',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'kewarganegaraan' => 'WNI',
                'status' => 'Kawin',
                'id_spesialis' => 1,
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id'=>2,
                'nip'=>'19890301897789',
                'nik' => '35099198903010004',
                'nama' => 'Linda Suteja',
                'tgl_lahir' => '1982-02-01',
                'alamat' => 'Jalan Teuku Umar 55',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'kewarganegaraan' => 'WNI',
                'status' => 'Kawin',
                'id_spesialis' => 2,
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ]
        ];
        DB::table('petugas')->insert($datas);
    }
}
