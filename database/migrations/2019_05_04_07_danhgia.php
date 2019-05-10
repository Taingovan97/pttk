<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Danhgia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('danhgia', function($table){
            $table->bigIncrements('maDG');
            $table->float('diem');
            $table->integer('maTK');
            $table->integer('maTruyen');
            $table->timestamp('thoigian');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('danhgia');
    }
}
