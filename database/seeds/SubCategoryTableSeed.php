<?php

use Illuminate\Database\Seeder;

class SubCategoryTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('sub_categories')->get()->count() == 0){

            DB::table('sub_categories')->insert([

                [
                    'sub_category' => 'First-course',
                    'category_id' => 1,
                ],
                [
                    'sub_category' => 'Steak',
                    'category_id' => 1,
                ],
                [
                    'sub_category' => 'Pasta',
                    'category_id' => 1,
                ],
                [
                    'sub_category' => 'Burger',
                    'category_id' => 1,
                ],
                [
                    'sub_category' => 'Salad',
                    'category_id' => 1,
                ],
                [
                    'sub_category' => 'Cheesecake',
                    'category_id' => 2,
                ],
                [
                    'sub_category' => 'Cake',
                    'category_id' => 2,
                ],
                [
                    'sub_category' => 'Brownie',
                    'category_id' => 2,
                ],
                [
                    'sub_category' => 'Ice-cream',
                    'category_id' => 2,
                ],
                [
                    'sub_category' => 'Vodka',
                    'category_id' => 3,
                ],
                [
                    'sub_category' => 'Whiskey',
                    'category_id' => 3,
                ],
                [
                    'sub_category' => 'Wine',
                    'category_id' => 3,
                ],
                [
                    'sub_category' => 'Vermouth',
                    'category_id' => 3,
                ],
                [
                    'sub_category' => 'Beer',
                    'category_id' => 3,
                ],
                [
                    'sub_category' => 'Tea',
                    'category_id' => 4,
                ],
                [
                    'sub_category' => 'Coffee',
                    'category_id' => 4,
                ],
                [
                    'sub_category' => 'Juice',
                    'category_id' => 4,
                ],

            ]);

        } else { echo "\eTable is not empty \n"; }
    }
}
