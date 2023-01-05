<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->unsignedBigInteger('role_id');
            $table->string('name');
            $table->string('first_surname')->nullable();
            $table->string('second_surname')->nullable();
            $table->string('email')->unique();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('password');
            $table->string('lang', 3);
            $table->string('api_key');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamp('last_login')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('verified')->default(0);
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
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
};
