<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // 都道府県コードと名前のデータ
        $prefectures = [
            ['pref_id' => '01', 'pref_name' => '北海道', 'r_id' => 1],
            ['pref_id' => '02', 'pref_name' => '青森県', 'r_id' => 2],
            ['pref_id' => '03', 'pref_name' => '岩手県', 'r_id' => 2],
            ['pref_id' => '04', 'pref_name' => '宮城県', 'r_id' => 2],
            ['pref_id' => '05', 'pref_name' => '秋田県', 'r_id' => 2],
            ['pref_id' => '06', 'pref_name' => '山形県', 'r_id' => 2],
            ['pref_id' => '07', 'pref_name' => '福島県', 'r_id' => 2],
            ['pref_id' => '08', 'pref_name' => '茨城県', 'r_id' => 3],
            ['pref_id' => '09', 'pref_name' => '栃木県', 'r_id' => 3],
            ['pref_id' => '10', 'pref_name' => '群馬県', 'r_id' => 3],
            ['pref_id' => '11', 'pref_name' => '埼玉県', 'r_id' => 3],
            ['pref_id' => '12', 'pref_name' => '千葉県', 'r_id' => 3],
            ['pref_id' => '13', 'pref_name' => '東京都', 'r_id' => 3],
            ['pref_id' => '14', 'pref_name' => '神奈川県', 'r_id' => 3],
            ['pref_id' => '15', 'pref_name' => '新潟県', 'r_id' => 4],
            ['pref_id' => '16', 'pref_name' => '富山県', 'r_id' => 4],
            ['pref_id' => '17', 'pref_name' => '石川県', 'r_id' => 4],
            ['pref_id' => '18', 'pref_name' => '福井県', 'r_id' => 4],
            ['pref_id' => '19', 'pref_name' => '山梨県', 'r_id' => 4],
            ['pref_id' => '20', 'pref_name' => '長野県', 'r_id' => 4],
            ['pref_id' => '21', 'pref_name' => '岐阜県', 'r_id' => 4],
            ['pref_id' => '22', 'pref_name' => '静岡県', 'r_id' => 4],
            ['pref_id' => '23', 'pref_name' => '愛知県', 'r_id' => 4],
            ['pref_id' => '24', 'pref_name' => '三重県', 'r_id' => 4],
            ['pref_id' => '25', 'pref_name' => '滋賀県', 'r_id' => 5],
            ['pref_id' => '26', 'pref_name' => '京都府', 'r_id' => 5],
            ['pref_id' => '27', 'pref_name' => '大阪府', 'r_id' => 5],
            ['pref_id' => '28', 'pref_name' => '兵庫県', 'r_id' => 5],
            ['pref_id' => '29', 'pref_name' => '奈良県', 'r_id' => 5],
            ['pref_id' => '30', 'pref_name' => '和歌山県', 'r_id' => 5],
            ['pref_id' => '31', 'pref_name' => '鳥取県', 'r_id' => 6],
            ['pref_id' => '32', 'pref_name' => '島根県', 'r_id' => 6],
            ['pref_id' => '33', 'pref_name' => '岡山県', 'r_id' => 6],
            ['pref_id' => '34', 'pref_name' => '広島県', 'r_id' => 6],
            ['pref_id' => '35', 'pref_name' => '山口県', 'r_id' => 6],
            ['pref_id' => '36', 'pref_name' => '徳島県', 'r_id' => 7],
            ['pref_id' => '37', 'pref_name' => '香川県', 'r_id' => 7],
            ['pref_id' => '38', 'pref_name' => '愛媛県', 'r_id' => 7],
            ['pref_id' => '39', 'pref_name' => '高知県', 'r_id' => 7],
            ['pref_id' => '40', 'pref_name' => '福岡県', 'r_id' => 8],
            ['pref_id' => '41', 'pref_name' => '佐賀県', 'r_id' => 8],
            ['pref_id' => '42', 'pref_name' => '長崎県', 'r_id' => 8],
            ['pref_id' => '43', 'pref_name' => '熊本県', 'r_id' => 8],
            ['pref_id' => '44', 'pref_name' => '大分県', 'r_id' => 8],
            ['pref_id' => '45', 'pref_name' => '宮崎県', 'r_id' => 8],
            ['pref_id' => '46', 'pref_name' => '鹿児島県', 'r_id' => 8],
            ['pref_id' => '47', 'pref_name' => '沖縄県', 'r_id' => 8],
        ];

        // 各都道府県データを一括挿入
        foreach ($prefectures as $pref) {
            DB::table('prefectures')->insert([
                'pref_id' => $pref['pref_id'],
                'pref_name' => $pref['pref_name'],
                'r_id' => $pref['r_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
