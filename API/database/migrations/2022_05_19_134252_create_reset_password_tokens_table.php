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
        Schema::create('g5e1D_password_reset_token', function (Blueprint $table) {
            $table->id();
            $table->dateTime('created_at');
            $table->dateTime('endDate');
            $table->string('uniqId');
            $table->string('token');
            $table->string('salt');
            $table->string('algo');
            $table->foreignId('g5e1D_users_id')
                ->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('g5e1D_password_reset_token');
    }
};
