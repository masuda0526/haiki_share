<?php

namespace Database\Seeders;

use App\Models\Prefecture;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $s_pcd = ['000', '001', '002', '003', '004'];
        $s_ccd = ['000', '001', '002', '003', '004', '005'];
        $s_name = ['テストコンビニ', 'テストマート', 'テスト商店', 'テストストア', 'テストショップ'];
        $s_stn = ['本店', 'A支店', 'B支店', 'C支店', 'D支店', 'E支店'];
        $now = Carbon::now();
        $pref_num = 0;
        for($pc = 0;$pc < 5; $pc++){
            for($cc = 0; $cc < 6; $cc++){
                $pref_num++;
                $pref = Prefecture::where('pref_id', sprintf('%02d', $pref_num))->value('pref_name');
                DB::table('shops')->insert(
                    [
                        's_id'=>'S'.$s_pcd[$pc].$s_ccd[$cc],
                        's_pcd'=>$s_pcd[$pc],
                        's_ccd'=>$s_ccd[$cc],
                        's_name'=>$s_name[$pc],
                        's_stn'=>$s_stn[$cc],
                        's_pref'=>sprintf('%02d', $pref_num),
                        's_adrs'=>$pref.'XXX市XXX町NN-NN-NN',
                        's_status'=>0,
                        'created_at'=>$now,
                        'updated_at'=>$now,
                    ]
                );
            }
        };
    }
}
