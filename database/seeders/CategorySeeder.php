<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $Categories = [
            1 => ['おにぎり', '弁当', 'サンドイッチ','カップ麺','その他'],  // 食品
            2 => ['トイレットペーパー', '洗剤', '消臭剤','その他'],  // 日用品
            3 => ['缶コーヒー', 'お茶', 'ジュース', 'エナジードリンク','その他'],  // 飲料
            4 => ['冷凍ピザ', '冷凍弁当', '冷凍おかず','その他'],  // 冷凍食品
            5 => ['ポテトチップス', 'ガム', 'チョコレート','その他'],  // お菓子・スナック
            6 => ['プロテインバー', 'ダイエット食品','その他'],  // ヘルスケア・ダイエット
            7 => ['バーベキューセット', 'キャンプ用具','その他'],  // アウトドア・レジャー
            8 => ['カイロ', '手袋','熱中症対策グッズ', 'その他'],  // 季節商品
            9 => ['ペン', 'ノート', '消しゴム','その他'],  // 雑貨・ギフト
        ];
        $now = Carbon::now();

        foreach ($Categories as $categoryId => $categoryNames) {
            foreach ($categoryNames as $categoryName) {
                DB::table('categories')->insert([
                    'g_id' => $categoryId,
                    'c_name' => $categoryName,
                    'created_at'=>$now,
                    'updated_at'=>$now
                ]);
            }
        }
    }
}
