<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(tkSeeder::class);
        //$this->call(AdSeeder::class);
        
    }
}

class tkSeeder extends Seeder
{
	public function run()
	{
		DB::table('taikhoan')->insert([
			['maTK'=>'a01', 'tenTK'=>str_random(5), 'matKhau'=>bcrypt(str_random(10))],
			['maTK'=>'m01', 'tenTK'=>str_random(5), 'matKhau'=>bcrypt(str_random(10))],
			['maTK'=>'m02', 'tenTK'=>str_random(5), 'matKhau'=>bcrypt(str_random(10))],
			['maTK'=>'a02', 'tenTK'=>str_random(5), 'matKhau'=>bcrypt(str_random(10))],
			['maTK'=>'m03', 'tenTK'=>str_random(5), 'matKhau'=>bcrypt(str_random(10))]
		]);
	}
}
