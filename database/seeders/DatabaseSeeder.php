<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'nastyashremenok@mail.ru',
            'is_admin' => 1,
            'password' => Hash::make('762373maks'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
