<?php

use Illuminate\Database\Seeder;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('users')->get()->count() == 0){

            DB::table('users')->insert([

                [
                    'username' => 'ylik',
                    'password' => bcrypt('qwerty'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'role_id' => '2',
                ],
                [
                    'username' => 'sveta',
                    'password' => bcrypt('qwerty'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'role_id' => '2',
                ],
                [
                    'username' => 'admin',
                    'password' => bcrypt('admin'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'role_id' => '1',
                ]

            ]);

        } else { echo "\eTable is not empty\n"; }
    }
}
