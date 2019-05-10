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
            $table->bigIncrements('maBL');
            $table->text('noiDung');
            $table->timestamp('ngayGui');
            $table->integer('maChuong');
            $table->integer('maTK');
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
