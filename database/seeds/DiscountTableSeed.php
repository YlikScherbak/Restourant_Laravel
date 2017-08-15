<?php

use Illuminate\Database\Seeder;

class DiscountTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('discounts')->get()->count() == 0){

            DB::table('discounts')->insert([

                [
                    'discount_name' => 'Discount card',
                    'percentage' => 10,
                ],
                [
                    'discount_name' => 'VIP client',
                    'percentage' => 30,
                ],
                [
                    'discount_name' => 'Ordinary staff',
                    'percentage' => 40,
                ],
                [
                    'discount_name' => 'Managing staff',
                    'percentage' => 60,
                ],

            ]);

        } else { echo "\eTable is not empty \n"; }
    }
}
