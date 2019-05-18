<?php

use Illuminate\Database\Seeder;

class tvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('thanhvien')->insert([
    		['name'=>'duc', 'password'=>bcrypt(str_random(3)), 'email'=>str_random(5)."@gmail.com"],
    		['name'=>'dung', 'password'=>bcrypt(str_random(3)), 'email'=>str_random(5)."@gmail.com"],
    		['name'=>'hieu', 'password'=>bcrypt(str_random(3)), 'email'=>str_random(5)."@gmail.com"],
    		['name'=>'khangml', 'password'=>bcrypt(str_random(3)), 'email'=>str_random(5)."@gmail.com"],
    		['name'=>'tai', 'password'=>bcrypt(str_random(3)), 'email'=>str_random(5)."@gmail.com"]
    	]);
    }
}
