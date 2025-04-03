<?php

namespace Database\Seeders;

use App\Models\Prefecture;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $mei = ['太郎', '二郎', '三郎', '花子', '智子', '早紀', '富太郎', '龍馬', '真希', '恵里香'];
        $now = Carbon::now();
        for($i = 0; $i < 10; $i++){
            $prefName = Prefecture::select('pref_name')->where('pref_id', sprintf('%02d', $i+1))->first()->pref_name;
            $u_id = 'U'.sprintf('%04d', $i);
            DB::table('users')->insert([
                'u_id'=>$u_id,
                'u_sei'=>'テスト',
                'u_mei'=>$mei[$i],
                'email'=>$u_id.'@test.com',
                'password'=>hash('sha256', $u_id),
                'u_pref' => sprintf('%02d', $i),
                'u_adrs' => $prefName.'ooo市ooo町oo-oo',
                'created_at'=>$now,
                'updated_at'=>$now,
            ]);
        }
    }
}
