<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Danhgia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('danhgia', function($table){
            $table->string('maDG');
            $table->string('tieuDe');
            $table->float('diem');
            $table->string('maTK');
            $table->string('maTruyen');
            $table->primary('maDG');
            $table->foreign('maTK')->reference('maTK')->on('taikhoan');
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
        Schema::dropIfExists('danhgia');
    }
}
