<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
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
                'id' => 1,
                'id_level' => 1,
                'id_petugas' => 2,
                'name' => 'Linda Suteja',
                'username' => 'direktur',
                'password' => bcrypt('direktur'),
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ],
            [
                'id' => 2,
                'id_level' => 2,
                'id_petugas' => 1,
                'name' => 'Adi Sucahyo',
                'username' => 'petugas',
                'password' => bcrypt('petugas'),
                'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
                'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
            ]
        ];

        DB::table('users')->insert($datas);
    }
}
