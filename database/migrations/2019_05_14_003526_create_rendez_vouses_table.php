<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRendezVousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendez_vouses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patient_id')->nullable()->index();
            $table->bigInteger('service_id')->nullable()->index();
            $table->bigInteger('doctor_id')->nullable()->index();
            $table->string('date_rdv')->nullable();
            $table->string('Heure', 100)->nullable();
            $table->string('Duree', 100)->nullable();
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
        Schema::dropIfExists('rendez_vouses');
    }
}
