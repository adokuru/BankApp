<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanktransectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banktransections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('term_id'); //currency id
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bank_id');
            $table->unsignedBigInteger('transaction_id');
            
            $table->double('amount')->default(0.00);
            $table->double('currency_rate')->default(0.00);
            $table->text('info')->nullable();
            $table->integer('status')->default(2);

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            $table->foreign('bank_id')
            ->references('id')->on('banks')
            ->onDelete('cascade');

            $table->foreign('transaction_id')
            ->references('id')->on('transactions')
            ->onDelete('cascade');

            $table->foreign('term_id')
            ->references('id')->on('terms')
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
        Schema::dropIfExists('banktransections');
    }
}
