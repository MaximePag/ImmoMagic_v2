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
            $table->string('name');
            $table->string('firstname');
            $table->string('mail')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phoneNumber');
            $table->string('address');
            $table->string('zipCode');
            $table->string('city');
            $table->boolean('archived');
            $table->rememberToken();
            $table->foreignId('g5e1D_roles_id')
                ->unsigned();
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
        Schema::dropIfExists('g5e1D_users');
    }
};
