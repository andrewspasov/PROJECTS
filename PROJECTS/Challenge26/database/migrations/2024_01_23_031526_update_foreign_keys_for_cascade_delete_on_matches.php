<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeignKeysForCascadeDeleteOnMatches extends Migration
{
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropForeign(['team_1_id']);
            $table->dropForeign(['team_2_id']);

            $table->foreign('team_1_id')
                ->references('id')->on('teams')
                ->onDelete('cascade');

            $table->foreign('team_2_id')
                ->references('id')->on('teams')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropForeign(['team_1_id']);
            $table->dropForeign(['team_2_id']);

            $table->foreign('team_1_id')->references('id')->on('teams');
            $table->foreign('team_2_id')->references('id')->on('teams');
        });
    }
}
