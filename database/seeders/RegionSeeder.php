<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('regions')->insert([
            ['r_name'=>'北海道地方'],
            ['r_name'=>'東北地方'],
            ['r_name'=>'関東地方'],
            ['r_name'=>'中部地方'],
            ['r_name'=>'近畿地方'],
            ['r_name'=>'中国地方'],
            ['r_name'=>'四国地方'],
            ['r_name'=>'九州地方'],
        ]);
    }
}
