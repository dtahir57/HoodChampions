<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('residential_neighbourhood')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('password')->nullable();
            $table->boolean('is_admin')->default(0);
            $table->text('api_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
