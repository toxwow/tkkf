<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('league_id')->index()->nullable();
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');
            $table->unsignedBigInteger('home_team_id')->index()->nullable();
            $table->foreign('home_team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->unsignedBigInteger('enemy_team_id')->index()->nullable();
            $table->foreign('enemy_team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->enum('status', ['zaakceptowany','niezaakceptowany' , 'nieodbyty'])->default('nieodbyty');
            $table->date('date');
            $table->tinyInteger('home_team_score')->nullable();
            $table->tinyInteger('enemy_team_score')->nullable();
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
        Schema::dropIfExists('matches');
    }
}
