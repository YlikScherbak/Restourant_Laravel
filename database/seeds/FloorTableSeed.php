<?php

use Illuminate\Database\Seeder;

class FloorTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('floors')->get()->count() == 0){

            DB::table('floors')->insert([

                [
                    'floor_name' => 'First floor',
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'floor_name' => 'Second floor',
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'floor_name' => 'Third floor',
                    'created_at' => date('Y-m-d H:i:s'),
                ],

            ]);

        } else { echo "\eTable is not empty \n"; }
    }
}
