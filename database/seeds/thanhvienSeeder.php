<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('thanhvien')->insert([
    		['name'=>'duc', 'matKhau'=>bcrypt(str_random(5)), 'email'=>str_random(5)."@gmail.com"],
    		['name'=>'dung', 'matKhau'=>bcrypt(str_random(5)), 'email'=>str_random(5)."@gmail.com"],
    		['name'=>'hieu', 'matKhau'=>bcrypt(str_random(5)), 'email'=>str_random(5)."@gmail.com"],
    		['name'=>'khangml', 'matKhau'=>bcrypt(str_random(5)), 'email'=>str_random(5)."@gmail.com"],
    		['name'=>'tai', 'matKhau'=>bcrypt(str_random(5)), 'email'=>str_random(5)."@gmail.com"]
    	]);
    }
}
