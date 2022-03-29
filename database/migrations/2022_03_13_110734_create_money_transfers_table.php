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
        Schema::create('money_transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id');
            $table->foreignId('user_id');
            $table->string('recepient_name');
            $table->string('recepient_account_number');
            $table->string('transaction_reference');
            $table->string('recepient_account_bank');
            $table->string('recepient_swift');
            $table->string('recepient_country');
            $table->decimal('amount', 10, 2);
            $table->string('currency');
            $table->string('status');
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
        Schema::dropIfExists('money_transfers');
    }
};
