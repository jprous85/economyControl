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
        Schema::create('economies', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_month');
            $table->dateTime('end_month');
            $table->string('account_uuid');
            $table->text('economic_management');
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('account_uuid')
                ->references('uuid')
                ->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('economies');
    }
};
