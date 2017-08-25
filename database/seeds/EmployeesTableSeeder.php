<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name'  =>  'Silvio Santos',
            'tel'   =>  '(438) 390-7528',
            'address'=> 'Av Pierre de Coubertin',
            'salary'=>  11.5,
            'position'=>'cashier'
        ]);
    }
}
