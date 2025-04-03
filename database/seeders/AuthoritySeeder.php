<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthoritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $data = [
            ['a_id'=>'00','a_name'=>'閲覧','a_explain'=>'店舗情報閲覧権限', 'created_at'=>$now, 'updated_at'=>$now],
            ['a_id'=>'01','a_name'=>'店舗情報編集','a_explain'=>'店舗を支店を作成・編集・削除する権限', 'created_at'=>$now, 'updated_at'=>$now],
            ['a_id'=>'02','a_name'=>'商品情報編集','a_explain'=>'商品を出品・編集・削除する権限', 'created_at'=>$now, 'updated_at'=>$now],
            ['a_id'=>'03','a_name'=>'従業員編集','a_explain'=>'従業員を追加・編集・削除する権限', 'created_at'=>$now, 'updated_at'=>$now],
        ];

        foreach($data as $item){
            DB::table('authorities')->insert($item);
        }
    }
}
