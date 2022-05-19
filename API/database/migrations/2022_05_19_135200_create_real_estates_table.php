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
            $table->foreignId('g5e1D_typeOfRealEstate_id')
                ->unsigned();
            $table->foreignId('g5e1D_typeOfHeating_id')
                ->unsigned();
            $table->foreignId('g5e1D_typeOfWaterEvacuation_id')
                ->unsigned();
            $table->foreignId('g5e1D_typeOfContract_id')
                ->unsigned();
            $table->foreignId('g5e1D_cities_id')
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
        Schema::dropIfExists('g5e1D_real_estate');
    }
};
