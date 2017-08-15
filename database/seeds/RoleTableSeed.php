<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('roles')->get()->count() == 0){

            DB::table('roles')->insert([

                [
                    'role' => 'admin',
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'role' => 'waiter',
                    'created_at' => date('Y-m-d H:i:s'),
                ],

            ]);

        } else { echo "\eTable is not empty \n"; }
    }
}
