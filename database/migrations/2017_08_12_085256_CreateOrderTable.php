<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(true);
            $table->decimal('total_amount');
            $table->decimal('discount_amount');
            $table->date('creation_date');
            $table->date('closed_date')->nullable();
            $table->integer('discount_id', false, true)->nullable();
            $table->integer('user_id', false, true);
            $table->integer('work_shift_id', false, true)->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
