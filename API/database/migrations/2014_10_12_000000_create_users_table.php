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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phoneNumber');
            $table->string('address');
            $table->string('postCode');
            $table->string('city');
            $table->boolean('archived')->default(0);
            $table->rememberToken();
            //$table->unsignedBigInteger('g5e1D_roles_id')->default(1);
            $table->foreignId('g5e1D_roles_id')->references('id')->on('g5e1D_users');
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
