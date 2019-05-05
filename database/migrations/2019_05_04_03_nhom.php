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
            $table->string('maNhom');
            $table->string('tenNhom');
            $table->date('ngayLap');
            $table->string('gioiThieu')->nullable();
            $table->string('maTruongNhom');
            $table->primary('maNhom');
            $table->foreign('maTruongNhom')->references('maTK')->on('taikhoan');

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
