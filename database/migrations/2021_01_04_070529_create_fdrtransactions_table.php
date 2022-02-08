<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFdrtransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fdrtransactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('fdrplan_id');
            $table->double('amount');
            $table->double('return_percent');
            $table->double('return_total');
            $table->date('return_date');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('fdrplan_id')
            ->references('id')->on('fdrplans')
            ->onDelete('cascade'); 

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fdrtransactions');
    }
}
