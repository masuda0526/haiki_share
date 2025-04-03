<?php

namespace Database\Seeders;

use App\Models\Prefecture;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RegionSeeder::class,
            PrefectureSeeder::class,
            AuthoritySeeder::class,
            CategorySeeder::class,
            GroupSeeder::class,
            ShopSeeder::class,
            EmployersSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
