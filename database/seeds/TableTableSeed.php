<?php

use Illuminate\Database\Seeder;

class TableTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('tables')->get()->count() == 0) {

            $counter = 1;
            for ($i = 1; $i <= 3; $i++) {

                for ($j = 1; $j <= 10; $j++) {

                    DB::table('tables')->insert([

                        [
                            'id' => $counter++,
                            'floor_id' => $i,
                            'created_at' => date('Y-m-d H:i:s'),
                        ],

                    ]);
                }
            }

        } else {
            echo "\eTable is not empty \n";
        }
    }
}
