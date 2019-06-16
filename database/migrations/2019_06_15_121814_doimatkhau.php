<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Doimatkhau extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doimatkhau', function (Blueprint $table) {
            $table->integer('maTK');
            $table->string('token');
            $table->string('matKhauMoi');
            $table->timestamp('ngay_doi');
            $table->primary('token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doimatkhau');
    }
}
