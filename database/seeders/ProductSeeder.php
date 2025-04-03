<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Employers;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $employers = Employers::all();
        $categories = Category::all();
        // var_dump($categories);
        $p_id = 0;
        $now = Carbon::now();
        foreach($employers as $employer){
            foreach($categories as $category){
                DB::table('products')->insert([
                    'p_id'=>'P'.sprintf('%09d', $p_id),
                    's_id'=>$employer->s_id,
                    'e_id'=>$employer->e_id,
                    'c_id'=>$category->c_id,
                    'p_name'=>$category->c_name,
                    'price'=>mt_rand(1, 5)*100,
                    'dis_price'=>mt_rand(6, 10)*100,
                    'ex_dt'=>date('Y-m-d', mt_rand(strtotime('2025-07-01'), strtotime('2025-12-31'))),
                    'created_at'=>$now,
                    'updated_at'=>$now,
                ]);
                $p_id++;
            }

        }
    }
}
