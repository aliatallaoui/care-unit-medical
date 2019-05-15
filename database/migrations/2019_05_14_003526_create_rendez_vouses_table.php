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
            $table->integer('service_id')->unsigned()->nullable()->index();
            $table->integer('patient_id')->unsigned()->nullable()->index();
            $table->dateTime('date_rdv')->nullable();
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
