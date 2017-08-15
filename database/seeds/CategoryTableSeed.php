<?php

use Illuminate\Database\Seeder;

class CategoryTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('menu_categories')->get()->count() == 0){

            DB::table('menu_categories')->insert([

                [
                    'category' => 'Entree',
                ],
                [
                    'category' => 'Dessert',
                ],
                [
                    'category' => 'Alcohol',
                ],
                [
                    'category' => 'Non-alcohol',
                ],

            ]);

        } else { echo "\eTable is not empty \n"; }
    }
}
