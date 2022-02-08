<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('withdrawmethod_id')->nullable();
            $table->unsignedBigInteger('term_id')->nullable();
            $table->unsignedBigInteger('user_id');
            // $table->integer('type')->default(1);
            $table->double('amount_withdraw')->default(0.00);
            $table->double('amount_usd')->default(0.00);
            $table->double('fee')->default(0.00);
            $table->text('account')->nullable();
            $table->integer('status')->default(2);

            $table->foreign('withdrawmethod_id')
            ->references('id')->on('withdrawmethods')
            ->onDelete('cascade'); 

            $table->foreign('term_id')
            ->references('id')->on('terms')
            ->onDelete('cascade'); 
            
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade'); 
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
        Schema::dropIfExists('withdraws');
    }
}
