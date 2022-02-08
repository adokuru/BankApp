<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawmethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawmethods', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->double('min_amount');
            $table->double('max_amount');
            $table->string('charge_type');
            $table->double('fix_charge');
            $table->double('percent_charge');
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
        Schema::dropIfExists('withdrawmethods');
    }
}
