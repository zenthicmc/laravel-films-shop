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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('merchant_ref');
            $table->foreignId('user_id')->constrained();
            $table->string('film_id');
            $table->string('film_title');
            $table->integer('total_price');
            $table->enum('status', ['PAID', 'UNPAID', 'FAILED', 'EXPIRED', 'REFUND']);

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
        Schema::dropIfExists('transactions');
    }
};
