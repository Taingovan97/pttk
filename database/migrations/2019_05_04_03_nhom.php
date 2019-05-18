<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nhom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('nhom', function($table){
            $table->bigIncrements('maNhom');
            $table->string('tenNhom');
            $table->timestamp('ngayLap');
            $table->string('gioiThieu')->nullable();
            $table->integer('maTruongNhom');
            $table->integer('soLuongTV')->unsigned();
            $table->integer('soLuongTruyen')->unsigned();

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
        Schema::dropIfExists('nhom');
    }
}
