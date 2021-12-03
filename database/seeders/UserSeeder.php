<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 1,
            'password' => '$2y$10$VeoEoOdEfeulqcyDOqnm/esM678riBjnjenhgOfA12wY0VpjMHS5S', // 'password' without quote, change ASAP.
        ]);
    }
}
