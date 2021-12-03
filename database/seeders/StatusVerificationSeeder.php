<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusVerificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_verifications')->insert([
            'id' => 0,
            'title' => "Belum mengisi form"
        ]);

        DB::table('status_verifications')->insert([
            'id' => 1,
            'title' => "Menunggu verifikasi admin"
        ]);

        DB::table('status_verifications')->insert([
            'id' => 2,
            'title' => "Telah terverifikasi"
        ]);

        DB::table('status_verifications')->insert([
            'id' => 3,
            'title' => "Ada kesalahan pada berkas anda"
        ]);
    }
}
