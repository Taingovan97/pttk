<?php

use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
		DB::table('admin')->insert([
			['maAdmin'=>str_random(3), 'hoTen'=>'tuan', 'gioiTinh'=>1, 'email'=>str_random(5)."@gmail.com", 'sdt'=>'0346377012', 'maTK'=>'a02'],
			['maAdmin'=>str_random(3), 'hoTen'=>'hue', 'gioiTinh'=>0, 'email'=>str_random(5)."@gmail.com", 'sdt'=>'0383513099', 'maTK'=>'a01']

		]);
    }
}
