<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ratetv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_tv', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('maTruyen');
            $table->integer('maTK');
            $table->integer('diem');
            $table->timestamp('rateTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate_tv');
    }
}
