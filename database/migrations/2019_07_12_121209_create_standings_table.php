<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('battle_id')->unsigned();
            $table->foreign('battle_id')
                    ->references('id')
                    ->on('battles')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('team_id')->unsigned();
            $table->foreign('team_id')
                    ->references('id')
                    ->on('teams')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('placing');
            $table->integer('points');
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
        Schema::dropIfExists('standings');
    }
}
