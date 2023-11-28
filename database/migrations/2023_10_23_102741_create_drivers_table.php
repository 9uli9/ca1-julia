<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('age');
            $table->enum('league_type', [
                'f1', 'f2', 'f3', 'rally', 'drag', 'street',
                'stock_car', 'go_karting', 'hill_climb', 'time_attack', 'autocross', 'drift', 'sprint',
                'hovercraft_racing', 'rocket_league', 'podracing', 'mario_kart', 'wacky_racers', 'cyberpunk_speedway', 'fantasy_grand_prix'
            ]);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
}
