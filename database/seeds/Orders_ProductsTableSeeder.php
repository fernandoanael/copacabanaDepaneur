<?php

use Illuminate\Database\Seeder;

class Orders_ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders_products')->insert([
            [
                'order_id'  =>  1,
                'product_id'=>  1,
                'quantity'  =>  3
            ],[
                'order_id'  =>  1,
                'product_id'=>  2,
                'quantity'  =>  1
            ],[
                'order_id'  =>  2,
                'product_id'=>  3,
                'quantity'  =>  1
            ],[
                'order_id'  =>  3,
                'product_id'=>  1,
                'quantity'  =>  10
            ]
        ]);
    }
}
