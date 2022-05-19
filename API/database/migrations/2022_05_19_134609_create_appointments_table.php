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
    public function up(): void
    {
        Schema::create('g5e1D_appointments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('dateHour');
            $table->text('notes');
            $table->text('comments');
            $table->foreignId('g5e1D_users_id')
                ->unsigned();

            $table->foreignId('g5e1D_realEstate_id')
                ->unsigned();

            $table->foreignId('g5e1D_appointmentsSubject_id')
                ->unsigned();
            /*$table->foreignId('agentsCanHaveAppointments')
                ->constrained()
                ->onUpdate('restrict')
                ->onDelete('restrict');*/
            //timestamp => crée 2 colonnes , created_at et updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('g5e1D_appointments');
    }
};
