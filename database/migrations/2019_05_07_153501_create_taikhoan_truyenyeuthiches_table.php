<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaikhoanTruyenyeuthichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhvien_truyenyeuthich', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('maTK');
            $table->integer('maTruyen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thanhvien_truyenyeuthich');
    }
}
