<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailAuditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail_auditions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('waiter_name');
            $table->integer('order_id', false, true);
            $table->string('product_name');
            $table->smallInteger('count', false, true);
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail_auditions');
    }
}
