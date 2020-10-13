<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('address')->nullable();
            $table->string('time')->nullable();
            $table->tinyInteger('shifts')->default(3);
            $table->string('information')->nullable();
            $table->unsignedBigInteger('capitan')->index()->nullable();
            $table->foreign('capitan')->references('id')->on('users');
            $table->unsignedBigInteger('league_id')->index()->nullable();
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');
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
        Schema::dropIfExists('teams');
    }
}
