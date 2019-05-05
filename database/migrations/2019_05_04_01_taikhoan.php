<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Taikhoan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('taikhoan', function($table){
            $table->string('maTK');
            $table->string('tenTK');
            $table->string('matKhau');
            $table->string('maTV');
            $table->primary('maTK');

            
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
        Schema::dropIfExists('taikhoan');
    }
}
