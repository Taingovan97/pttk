<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Chuongtruyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('chuongtruyen', function($table){
            $table->bigIncrements('maChuong');
            $table->string('tenChuong');
            $table->timestamp('ngayDang');
            $table->integer('maTruyen');
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
        Schema::dropIfExists('chuongtruyen');
    }
}
