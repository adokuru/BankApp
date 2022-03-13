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
            $table->foreignId('user_id');
            $table->string('to_account_number');
            $table->string('from_account_number');
            $table->string('transaction_code');
            $table->string('transaction_reference');
            $table->string('transaction_type');
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
