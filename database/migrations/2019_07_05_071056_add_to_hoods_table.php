<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToHoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hoods', function (Blueprint $table) {
            $table->unsignedBigInteger('region_id')->unsigned();
            $table->foreign('region_id')
                    ->references('id')
                    ->on('regions')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hoods', function (Blueprint $table) {
            $table->dropColumnIfExists('region_id');
        });
    }
}
