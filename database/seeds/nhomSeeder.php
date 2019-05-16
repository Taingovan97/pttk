<?php

use Illuminate\Database\Seeder;
use App\nhom;
class nhomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 4; $i++) { 
        	# code...
        	DB::table('nhom')->insert(['tenNhom' => str_random(10),
        	'maTruongNhom' => random_int(6, 11),
        	'soLuongTV' => random_int(5,10),
        	'soLuongTruyen' => random_int(5,10)]);
        	
        }
    }
}
