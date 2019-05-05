<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Thanhvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('thanhvien', function($table){
            $table->string('maTV');
            $table->string('hoTen');
            $table->integer('gioiTinh');
            $table->string('email')->unique();
            $table->integer('sdt');
            $table->string('maTK');
            $table->string('maNhom');
            $table->primary('maTV');
            $table->foreign('maTK')->references('maTK')->on('taikhoan');
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
        Schema::dropIfExists('thanhvien');
    }
}
