<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('admin', function($table){
            $table->string('maAdmin');
            $table->string('hoTen');
            $table->integer('gioiTinh');
            $table->string('email');
            $table->integer('sdt');
            $table->string('maTK');
            $table->primary('maAdmin');
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
        Schema::dropIfExists('admin');
    }
}
