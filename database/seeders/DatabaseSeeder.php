<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        // $this->call(CompanySeeder::class);
        // User::factory(10)->create();
        // UserDetails::factory(10)->create();
        Category::factory(10)->create();


    }
}
