<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarRacePivotTable extends Migration
{
    public function up()
    {
        Schema::create('car_race', function (Blueprint $table) {
            $table->id();
            $table->string('start_time');
            $table->string('finish_time');
            $table->integer('position')->nullable(); 
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('race_id');


            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('race_id')->references('id')->on('races')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_race');
    }
}

