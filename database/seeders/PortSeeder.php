<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $port = [
                ['nama'=> Str::random(10)],
                ['nama'=> Str::random(10)],
                ['nama'=> Str::random(10)],
            ];

            DB::table('port')->insert($port);
    }
}
