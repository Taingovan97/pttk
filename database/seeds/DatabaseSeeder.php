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
<<<<<<< HEAD
       $faker = Faker\Factory::create();
    	for ($i =0; $i<3; $i++){
    		App\taikhoan::insert([
    			'maTK'=> strval($i+6),
    			'tenTK'=>  $faker->firstName($gender='male'),
    			'matKhau'=> bcrypt($faker->firstName($gender='male')),
    			'maTV'=> 'dfdf'
    		]);
    	}

=======
        //$this->call(tkSeeder::class);
        //$this->call(AdSeeder::class);
        
>>>>>>> 41eae6a11f787c8595d0429f672dcbb7a79fd0a9
    }
}

class tkSeeder extends Seeder
{
	public function run()
	{
		DB::table('taikhoan')->insert([
			['maTK'=>'a01', 'tenTK'=>str_random(5), 'matKhau'=>bcrypt(str_random(10)), 'maTV'=>str_random(5)],
			['maTK'=>'m01', 'tenTK'=>str_random(5), 'matKhau'=>bcrypt(str_random(10)), 'maTV'=>str_random(5)],
			['maTK'=>'m02', 'tenTK'=>str_random(5), 'matKhau'=>bcrypt(str_random(10)), 'maTV'=>str_random(5)],
			['maTK'=>'a02', 'tenTK'=>str_random(5), 'matKhau'=>bcrypt(str_random(10)), 'maTV'=>str_random(5)],
			['maTK'=>'m03', 'tenTK'=>str_random(5), 'matKhau'=>bcrypt(str_random(10)), 'maTV'=>str_random(5)]
		]);
	}
}
