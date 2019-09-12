<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImageEventTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('image_events')->insert([
                'name' => Str::random(10),
                'image' => 'https://9mobi.vn/cf/images/2015/03/nkk/anh-dep-1.jpg',
                'promotion_price' => rand(10000, 1000000),
                'end_promotion' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
