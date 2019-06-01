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
            $table->string('name')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('avatar')->default('avatar/no-avatar208.png');
            $table->string('gioiTinh')->default('Nam');
            $table->integer('sdt')->nullable();
            $table->timestamp('create_at');
            $table->boolean('active')->default(false);
            $table->string('quyen');
            $table->rememberToken()->nullable();

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
