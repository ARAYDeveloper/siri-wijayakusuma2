<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LevelTableSeeder::class);
        $this->call(SpesialisTableSeeder::class);
        $this->call(PetugasTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(JenisPelayananTableSeeder::class);
        $this->call(JenisPembayaranTableSeeder::class);
        $this->call(RumahSakitRujukTableSeeder::class);
        $this->call(KamarTableSeeder::class);
        $this->call(DiagnosisTableSeeder::class);
        $this->call(PasienTableSeeder::class);
//        $this->call(RiwayatsTableSeeder::class);
    }
}
