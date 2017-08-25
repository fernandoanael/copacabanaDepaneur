<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'employee_id'   =>  1,
                'totalPrice'    =>  20
            ],[
                'employee_id'   =>  1,
                'totalPrice'    =>  10
            ]

        ]);
    }
}
