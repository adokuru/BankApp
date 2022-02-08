<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('getways', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->double('rate')->nullable();
            $table->double('deposit_min')->nullable();
            $table->double('deposit_max')->nullable();
            $table->string('charge_type')->nullable(); //fixed,percentage
            $table->double('fix_charge')->nullable();
            $table->double('percent_charge')->nullable();
            $table->integer('type')->default(1);
            $table->integer('status')->default(0);
            $table->text('data')->nullable();
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
        Schema::dropIfExists('getways');
    }
}
