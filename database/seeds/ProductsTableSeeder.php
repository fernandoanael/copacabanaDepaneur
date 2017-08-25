<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'  =>  'Rice 1kg',
                'price' =>  3.5,
            ],[
                'name'  =>  'Lettuce 1lb',
                'price' =>  4
            ],[
                'name'  =>  'Budweiser 6cans',
                'price' =>  8.9
            ]
        ]);
    }
}
