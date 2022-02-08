<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->string('trx');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('getway_id');
            $table->string('type')->nullable();
            $table->double('amount');
            // $table->double('usd_amount');
            $table->double('charge');
            $table->integer('status')->default(0);
            $table->timestamps();
            
            $table->foreign('getway_id')
            ->references('id')->on('getways'); 

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
        Schema::dropIfExists('deposits');
    }
}
