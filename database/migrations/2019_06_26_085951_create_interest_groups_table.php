<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interest_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('group_category_id')->unsigned();
            $table->foreign('group_category_id')
                    ->references('id')
                    ->on('group_categories')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('about_us');
            $table->string('email');
            $table->string('contact_no');
            $table->string('meetup_place');
            $table->string('photo');
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
        Schema::dropIfExists('interest_groups');
    }
}
