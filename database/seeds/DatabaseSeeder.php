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

       $faker = Faker\Factory::create();
    	for ($i =0; $i<3; $i++){
    		App\taikhoan::insert([
    			'maTK'=> strval($i+6),
    			'tenTK'=>  $faker->firstName($gender='male'),
    			'matKhau'=> bcrypt($faker->firstName($gender='male')),
    			'maTV'=> 'dfdf'
    		]);
    	}

        //$this->call(tkSeeder::class);
<<<<<<< HEAD
        $this->call(AdSeeder::class);
        
=======
        //$this->call(AdSeeder::class);

>>>>>>> 345702677909421d086dc84d640e3cffc7ef677d
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
