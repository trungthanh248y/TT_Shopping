<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(BillsTaleSeeder::class);
        $this->call(BillDetailTaleSeeder::class);
        $this->call(ImageEventTableSeed::class);
    }
}
