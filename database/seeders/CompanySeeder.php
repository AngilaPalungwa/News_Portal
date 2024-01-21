<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data=[
            'name'=>'ABC',
            'email'=>'abccompany@gmail.com',
            'contact'=>'9819031881',
            'address'=>'9819031881',
            'logo'=>'logo.png',
            'aboutus'=>'ABC News Pvt Ltd is Nepal’s oldest online news portal and was relaunched in Nepali in 2018. Our team strives to cover news in Nepal and around the world for our site visitors to keep themselves updated at all times. We would be more than delighted to receive your comments, views and ideas.',
            'facebook'=>'www.facebook.com',
            'twitter'=>'www.twitter.com',
            'linkedin'=>'www.linkedin.com',
            'youtube'=>'www.youtube.com',

        ];
        DB::table('companies')->insert($data);
    }
}
