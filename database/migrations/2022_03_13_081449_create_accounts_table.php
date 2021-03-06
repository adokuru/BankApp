<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('balance', 18, 2)->default(0);
            $table->string('currency')->default('USD');
            $table->string('account_type')->default('checking');
            $table->string('account_number')->unique();
            $table->string('bank_identifier')->default('00962');
            $table->string('IBAN_Check_digits')->default('88');
            $table->string('iso')->default('CH');
            $table->string('IBAN')->nullable();
            $table->string('otp1')->nullable();
            $table->string('otp2')->nullable();
            $table->string('otp3')->nullable();
            $table->string('emailotp')->nullable();
            $table->tinyInteger('disableTransfer')->default(0);
            $table->tinyInteger('enableCodes')->default(0);
            $table->timestamps();
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
        Schema::dropIfExists('accounts');
    }
};
