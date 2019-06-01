<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Thanhvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('thanhvien', function($table){
            $table->bigIncrements('maTK');
            $table->string('name')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('avatar')->default('avatar/no-avatar208.png');
            $table->boolean('active')->default(false);
            $table->string('gioiTinh')->default('Nam');
            $table->integer('sdt')->nullable();
            $table->integer('maNhom')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamp('create_at');
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
        Schema::dropIfExists('thanhvien');
    }
}
