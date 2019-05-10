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
            $table->bigIncrements('maDX');
            $table->string('tieuDe');
            $table->text('noiDung');
            $table->timestamp('ngayGui');
            $table->boolean('trangThai')->default(false);
            $table->integer('maTK');
            $table->integer('maNhom');
        
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
