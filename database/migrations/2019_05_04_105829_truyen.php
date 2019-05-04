<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Truyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('truyen', function($table){
            $table->string('maTruyen');
            $table->string('tenTruyen');
            $table->string('tacGia');
            $table->date('ngayDang');
            $table->integer('luotXem')->unsigned();
            $table->float('diemDG');
            $table->primary('maTruyen');
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
        Schema::dropIfExists('truyen');
    }
}
