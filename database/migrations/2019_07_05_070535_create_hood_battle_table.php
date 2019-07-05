<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoodBattleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hood_battle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hood_id');
            $table->foreign('hood_id')
                    ->references('id')
                    ->on('hoods')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->unsignedBigInteger('battle_id');
            $table->foreign('battle_id')
                    ->references('id')
                    ->on('battles')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('hood_battle');
    }
}
