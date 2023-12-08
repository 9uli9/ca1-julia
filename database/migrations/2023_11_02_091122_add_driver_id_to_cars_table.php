<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // When migrating up, this code will be executed.

        Schema::table('cars', function (Blueprint $table) {
            // Add a new column 'driver_id' to the 'cars' table.
            $table->unsignedBigInteger('driver_id')->nullable();

            // Define a foreign key constraint. This means 'driver_id' references 'id' in the 'drivers' table,
            // and if a driver is deleted, the associated car will also be deleted.
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // When rolling back the migration, this code will be executed.

        Schema::table('cars', function (Blueprint $table) {
            // Drop the foreign key constraint associated with 'driver_id'.
            $table->dropForeign(['driver_id']);

            // Drop the 'driver_id' column from the 'cars' table.
            $table->dropColumn('driver_id');
        });
    }
};
