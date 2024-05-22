<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_1_id')->constrained('teams');
            $table->foreignId('team_2_id')->constrained('teams');
            $table->datetime('match_time');
            $table->integer('score_team_1')->nullable();
            $table->integer('score_team_2')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
