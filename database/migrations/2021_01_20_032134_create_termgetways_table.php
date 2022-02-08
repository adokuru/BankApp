<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermgetwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termgetways', function (Blueprint $table) {
             $table->unsignedBigInteger('term_id');
             $table->unsignedBigInteger('getway_id');

             $table->foreign('getway_id')
             ->references('id')->on('getways')
             ->onDelete('cascade');

             $table->foreign('term_id')
             ->references('id')->on('terms')
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
        Schema::dropIfExists('termgetways');
    }
}
