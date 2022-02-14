<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loanplans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('min_amount');
            $table->double('max_amount');
            $table->integer('duration');
            $table->double('fixed_charged');
            $table->double('percent_charged');
            $table->string('charge_type');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loanplans');
    }
}
