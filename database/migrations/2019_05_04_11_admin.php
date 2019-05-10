<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('admin', function($table){
            $table->bigIncrements('maTK');
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->boolean('active')->default(false);
            $table->string('gioiTinh')->default('Nam');
            $table->integer('sdt')->nullable();
            $table->rememberToken()->nullable();
            $table->string('quyen');
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
        Schema::dropIfExists('admin');
    }
}
