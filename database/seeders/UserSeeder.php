<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            ['name'=> Str::random(10),'email'=>'admin@gmail.com', 'password' => Hash::make('123'), 'role' => '0'],
            ['name'=> Str::random(10),'email'=>'user@gmail.com', 'password' => Hash::make('123'), 'role' => '1'],
        ];

        DB::table('users')->insert($user);
    }
}
