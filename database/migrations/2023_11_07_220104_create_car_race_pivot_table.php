<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// A pivot table is made when there is a Many-To-Many relationships between two tables/models
class CreateCarRacePivotTable extends Migration
{
    public function up()
    {
        // When migrating up, this code will be executed.

        Schema::create('car_race', function (Blueprint $table) {
            // Create the 'car_race' table with the following columns:

            $table->id(); // Auto-incrementing ID for the pivot table.
            $table->string('start_time'); // Column to store the start time.
            $table->string('finish_time'); // Column to store the finish time.
            $table->integer('position')->nullable(); // Column to store the position, which can be nullable.
            $table->unsignedBigInteger('car_id'); // Foreign key referencing 'id' in the 'cars' table.
            $table->unsignedBigInteger('race_id'); // Foreign key referencing 'id' in the 'races' table.

            // Define foreign key constraints.
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('race_id')->references('id')->on('races')->onDelete('cascade');

            $table->timestamps(); // Automatically manage 'created_at' and 'updated_at' timestamps.
        });
    }

    public function down()
    {
        // When rolling back the migration, this code will be executed.

        Schema::dropIfExists('car_race'); // Drop the 'car_race' table.
    }
}
