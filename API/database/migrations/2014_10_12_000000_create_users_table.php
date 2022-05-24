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
        Schema::create('g5e1D_users', function (Blueprint $table) {
            $table->id();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('email')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phoneNumber');
            $table->string('address');
            $table->string('zipCode');
            $table->string('city');
            $table->boolean('archived');
            $table->rememberToken();
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('g5e1D_users');
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
        Schema::dropIfExists('g5eD_users');
    }
};
