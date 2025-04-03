<?php

namespace Database\Seeders;

use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $shops = Shop::all();
        $staff = ['店長','副店長', '従業員A', '従業員B', 'アルバイトA', 'アルバイトB'];
        $auths = ['00,01,02,03','00,01,02,03','00,01,02','00,01','00','00'];
        $now = Carbon::now();
        foreach($shops as $shop){
            for($i = 0;$i<6;$i++){
                $e_cd = sprintf('%03d', $i);
                $e_id = $shop->s_id.$e_cd;
                DB::table('employers')->insert([
                    'e_id'=>$e_id,
                    's_id'=>$shop->value('s_id'),
                    'e_cd'=>$e_cd,
                    'email'=>$e_id.'@test.com',
                    'password'=>hash('sha256', $e_cd),
                    'auth'=>$auths[$i],
                    'e_sei'=>'テスト',
                    'e_mei'=>$staff[$i],
                    'created_at'=>$now,
                    'updated_at'=>$now
                ]);
            }

        }
    }
}
