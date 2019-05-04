<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Chuongtruyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('chuongtruyen', function($table){
            $table->string('maChuong');
            $table->string('tenChuong');
            $table->string('noiDung');
            $table->date('ngayDang');
            $table->string('maTruyen');
            $table->primary('maChuong');
            $table->foreign('maTruyen')->reference('maTruyen')->on('truyen');
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
        Schema::dropIfExists('chuongtruyen');
    }
}
