<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dexuat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('dexuat', function($table){
            $table->string('maDX');
            $table->string('tieuDe');
            $table->text('noiDung');
            $table->date('ngayGui');
            $table->boolean('trangThai');
            $table->string('maTK');
            $table->string('maNhom');
            $table->primary('maDX');
            $table->foreign('maTK')->references('maTK')->on('taikhoan');
            $table->foreign('maNhom')->references('maNhom')->on('nhom');
        
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
        Schema::dropIfExists('dexuat');
    }
}
