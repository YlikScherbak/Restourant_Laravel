<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeed::class);
        $this->call(UserTableSeed::class);
        $this->call(FloorTableSeed::class);
        $this->call(TableTableSeed::class);
        $this->call(CategoryTableSeed::class);
        $this->call(SubCategoryTableSeed::class);
        $this->call(ProductsTableSeed::class);
        $this->call(DiscountTableSeed::class);
    }
}
