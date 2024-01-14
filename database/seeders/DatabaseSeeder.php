<?php

namespace Database\Seeders;

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
        $this->call(UserTableSeeder::class);
        User::factory(10)->create();
        UserDetails::factory(10)->create();
        // User::factory(10)->create()->each(function ($user) {
        //     $detail = UserDetails ::factory()->make();
        //     $user->detail()->save($detail);
        // });

    }
}
