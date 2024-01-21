<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'Politics',
            'slug'=>'politics',
            'status'=>'1',
        ]);
        Category::create([
            'name'=>'Latest',
            'slug'=>'latest',
            'status'=>'1',
        ]);
        Category::create([
            'name'=>'Literature',
            'slug'=>'literature',
            'status'=>'1',
        ]);
        Category::create([
            'name'=>'Entertainment',
            'slug'=>'entertainment',
            'status'=>'1',
        ]);
        Category::create([
            'name'=>'International',
            'slug'=>'international',
            'status'=>'1',
        ]);
        Category::create([
            'name'=>'Business',
            'slug'=>'business',
            'status'=>'1',
        ]);
        Category::create([
            'name'=>'Health/Science',
            'slug'=>'health-science',
            'status'=>'1',
        ]);
    }
}
