<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $groups = [
            '食品',
            '日用品',
            '飲料',
            '冷凍食品',
            'お菓子・スナック',
            'ヘルスケア・ダイエット',
            'アウトドア・レジャー',
            '季節商品',
            '雑貨・ギフト',
        ];
        $now = Carbon::now();

        foreach ($groups as $group) {
            DB::table('groups')->insert([
                'sort'=>100,
                'g_name' => $group,
                'created_at'=>$now,
                'updated_at'=>$now
            ]);
        }
    }
}
