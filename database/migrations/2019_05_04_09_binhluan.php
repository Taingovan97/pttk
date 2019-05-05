<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Binhluan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('binhluan', function($table){
            $table->string('maBL');
            $table->text('noiDung');
            $table->date('ngayGui');
            $table->string('maChuong');
            $table->string('maTK');
            $table->primary('maBL');
            $table->foreign('maChuong')->references('maChuong')->on('chuongtruyen');
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
        Schema::dropIfExists('binhluan');
    }
}
