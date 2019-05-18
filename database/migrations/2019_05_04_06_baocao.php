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
			$table->bigIncrements('maBC');
			$table->string('tieuDe')->default('không tiêu đề');
			$table->text('noiDung');
			$table->timestamp('ngayGui');
			$table->boolean('trangThai')->default(false);
			$table->integer('maTK1');
			$table->integer('maTK2')->nullable();
			$table->integer('maTruyen')->nullable();
			$table->integer('loaiBC')->default(0);
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
