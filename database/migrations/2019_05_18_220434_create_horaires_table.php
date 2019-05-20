<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patient_id')->nullable()->index();
            $table->bigInteger('service_id')->nullable()->index();
            $table->bigInteger('rendez_vouse_id')->nullable()->index();
            $table->bigInteger('doctor_id')->nullable()->index();
            $table->string('title');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
             /* $table->foreign('rendez_vouse_id')
                ->references('id')
                ->on('rendez_vouses')
                ->onDelete('cascade'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horaires');
    }
}
