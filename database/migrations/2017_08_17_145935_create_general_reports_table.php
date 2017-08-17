<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('total_amount');
            $table->decimal('discount_amount');
            $table->integer('work_shift_id', false, true);
            $table->foreign('work_shift_id')->references('id')->on('work_shifts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_reports');
    }
}
