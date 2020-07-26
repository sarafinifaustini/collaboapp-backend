<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_teams', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('user_id');
            $table-> unsignedBigInteger('team_id');
            $table ->string('desc'); 
            $table ->string('joinTeam');
            $table ->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('join_teams');
    }
}
