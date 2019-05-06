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
            $table->string('gioiTinh')->nullable()->default('Nam');
            $table->string('email')->unique();
            $table->integer('sdt')->nullable();
            $table->string('maTK');
            $table->string('maNhom')->nullable();
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
