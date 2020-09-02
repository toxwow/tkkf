<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('photo')->nullable();
            $table->enum('status', ['zweryfikowany', 'niezweryfikowany' , 'odrzucony'])->default('niezweryfikowany');
            $table->date('birth')->nullable();;
            $table->unsignedBigInteger('team_id')->index();
            $table->foreign('team_id')->references('id')->on('teams');
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('players');
    }
}
