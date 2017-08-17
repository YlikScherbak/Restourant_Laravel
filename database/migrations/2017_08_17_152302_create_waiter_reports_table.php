<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaiterReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waiter_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('waiter');
            $table->decimal('total_amount');
            $table->decimal('discount_amount');
            $table->integer('general_report_id', false, true);
            $table->foreign('general_report_id')->references('id')->on('general_reports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waiter_reports');
    }
}
