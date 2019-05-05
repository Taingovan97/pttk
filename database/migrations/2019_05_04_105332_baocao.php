<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Baocao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('baocao', function($table){
            $table->string('maBC');
            $table->string('tieuDe');
            $table->text('noiDung');
            $table->date('ngayGui');
            $table->boolean('trangThai');
            $table->string('maTK1');
            $table->string('maTK2')->nullable();
            $table->string('maTruyen')->nullable();
            $table->primary('maBC');
            $table->foreign('maTK1')->reference('maTK')->on('taikhoan');
            $table->foreign('maTK2')->reference('maTK')->on('taikhoan');
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
        Schema::dropIfExists('baocao');
    }
}
