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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('user_id')->nullable();
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('transaction_number');
            $table->string('transaction_amount');
            $table->string('package_id');
            $table->string('makeup_artist_id');
            $table->string('status'); 
            $table->string('date');
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
        Schema::dropIfExists('payments');
    }
};