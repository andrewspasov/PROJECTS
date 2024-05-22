<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnDeleteCascadeToPlayers extends Migration
{
    public function up()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->dropForeign(['team_id']);
            $table->foreign('team_id')
                ->references('id')->on('teams')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->dropForeign(['team_id']);
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }
}
