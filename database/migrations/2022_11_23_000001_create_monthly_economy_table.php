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
            $table->unsignedBigInteger('account_id');
            $table->json('economic_management');
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('account_id')
                ->on('accounts')
                ->references('id')
                ->cascadeOnDelete();
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
