<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFdrplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fdrplans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->double('min_amount');
            $table->double('max_amount');
            $table->integer('duration');
            $table->double('percent_return');
            $table->integer('status')->default(1);  //0 = inactive , 1= active
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
        Schema::dropIfExists('fdrplans');
    }
}
