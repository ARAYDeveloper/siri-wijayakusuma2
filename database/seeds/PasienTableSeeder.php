<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PasienTableSeeder extends Seeder
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
                'nama' => 'Angga Dwi Hariadi',
                'tgl_lahir' => '1992-02-01',
                'alamat' => 'Jalan Pattimura 9',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'kewarganegaraan' => 'WNI',
                'status' => 'Kawin',
                'no_rm' => '787',
                'status_rawat' => 'tidak',
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id'=>2,
                'nama' => 'Muhamat Abdul Rohim',
                'tgl_lahir' => '1993-02-01',
                'alamat' => 'Jalan Pattimura 9',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'kewarganegaraan' => 'WNI',
                'status' => 'Kawin',
                'no_rm' => '788',
                'status_rawat' => 'tidak',
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ]
        ];
        DB::table('pasiens')->insert($datas);
    }
}
