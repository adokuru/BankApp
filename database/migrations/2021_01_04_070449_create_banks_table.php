<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->integer('period');
            $table->double('min_amount');
            $table->double('max_amount');
            $table->double('fix_charge');
            $table->double('percent_charge');
            $table->string('charge_type');
            $table->unsignedBigInteger('term_id');
            $table->integer('status')->default(1);  //0 = inactive , 1= active
            $table->timestamps();

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
        Schema::dropIfExists('banks');
    }
}
