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
            $table->string('email');
            $table->integer('sdt');
            $table->string('maTK');
            $table->string('maNhom');
            $table->primary('maTV');
            $talbe->foreign('maTK')->reference('maTk')->on('taikhoan');
            $table->foreign('maNhom')->reference('maNhom')->on('nhom');
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
