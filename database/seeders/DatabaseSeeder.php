<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('permissions')->insert([
            'name' => 'Test User',
            'permissions' => '["HomeChart","ReadMessage"]',
            // 'password' => Hash::make('password'),
        ]);


        DB::table('admins')->insert([
            'phone' => '0926503011',
            'first_name' => 'Abdulsmaia',
            'last_name' => 'Alashiq',
            'role_id' => 1,
            'password' => Hash::make('123123'),
            'state' => 1,
        ]);
    }
}
