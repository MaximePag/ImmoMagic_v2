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
        Schema::create('g5e1D_real_estate', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->integer('price');
            $table->float('expenses');
            $table->string('description');
            $table->integer('numberOfViews');
            $table->integer('livingArea');
            $table->integer('landArea');
            $table->integer('roomNumber');
            $table->integer('bedRoomNumber');
            $table->integer('bathRoomNumber');
            $table->integer('toiletNumber');
            $table->integer('floorNumber');
            $table->string('constructionYear');
            $table->integer('GES');
            $table->integer('DPE');
            $table->boolean('archived');
            $table->string('reference');
            $table->foreignId('g5e1D_type_of_real_estates_id')
                ->references('id')
                ->on('g5e1D_real_estate');
            $table->foreignId('g5e1D_type_of_heatings_id')
                ->references('id')
                ->on('g5e1D_real_estate');
            $table->foreignId('g5e1D_type_of_water_evacuations_id')
                ->references('id')
                ->on('g5e1D_real_estate');
            $table->foreignId('g5e1D_type_of_contracts_id')
                ->references('id')
                ->on('g5e1D_real_estate');
            $table->foreignId('g5e1D_cities_id')
                ->references('id')
                ->on('g5e1D_real_estate');

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
        Schema::dropIfExists('g5e1D_real_estate');
    }
};
