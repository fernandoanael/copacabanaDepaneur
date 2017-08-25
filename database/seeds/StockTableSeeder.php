<?php

use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->insert([
            [
                'quantity'  =>  20,
                'product_id'=>  1
            ],[
                'quantity'  =>  10,
                'product_id'=>  2,
            ],[
                'quantity'  =>  5,
                'product_id'=>  3
            ]

        ]);
    }
}
