<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class subImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub')->insert([
            'name' => 'test1',
            'email' => 'test1@test.com',
            'password' => bcrypt('test1')
        ]);
    }
}
