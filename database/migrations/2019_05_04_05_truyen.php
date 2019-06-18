r<?php

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
            $table->bigIncrements('maTruyen');
            $table->string('tenTruyen');
            $table->string('tacGia');
            $table->timestamp('ngayDang');
            $table->text('gioiThieu')->nullable();
            $table->string('linkAnh')->default('cover/x.png');
            $table->integer('luotXem')->unsigned()->default(0);
            $table->float('diemDG')->default(0.);
            $table->integer('maNhom');
            $table->integer('manguoiDang');
            $table->integer('trangThai')->default(0);
            $table->boolean('duyet')->default(false);
            $table->integer('soDG')->default('0');

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
