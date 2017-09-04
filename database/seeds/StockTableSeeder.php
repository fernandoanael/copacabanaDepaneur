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
                'quantity'  =>  10,
                'product_id'=>  4
            ],[
                'quantity'  =>  5,
                'product_id'=>  5,
            ],[
                'quantity'  =>  10,
                'product_id'=>  6
            ]

        ]);
    }
}
