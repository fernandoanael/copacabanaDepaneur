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
                'name'  =>  'Coke 1L',
                'price' =>  2,
            ],[
                'name'  =>  'Orange Juice 2L',
                'price' =>  4
            ],[
                'name'  =>  'Monster Energy Drink',
                'price' =>  4.5
            ]
        ]);
    }
}
