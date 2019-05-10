<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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

        DB::table('taikhoan')->insert(
            [ 
            'name'=>'tentk', 
            'password'=>bcrypt(12345),
             'email'=>'famousthanhduc@gmail.com',
             'maNhom'=>'N0',
             'quyen' => '0',
             'create_at' =>Carbon::now('Asia/Ho_Chi_Minh')
         ]
            
        );


    }
}

// class tkSeeder extends Seeder
// {
// 	public function run()
// 	{
// 		DB::table('taikhoan')->insert([
// 			['maTK'=>'a01', 'tenTK'=>str_random(5), 'matKhau'=>bcrypt(str_random(10)), 'maTV'=>str_random(5)],
// 			['maTK'=>'m01', 'tenTK'=>str_random(5), 'matKhau'=>bcrypt(str_random(10)), 'maTV'=>str_random(5)],
// 			['maTK'=>'m02', 'tenTK'=>str_random(5), 'matKhau'=>bcrypt(str_random(10)), 'maTV'=>str_random(5)],
// 			['maTK'=>'a02', 'tenTK'=>str_random(5), 'matKhau'=>bcrypt(str_random(10)), 'maTV'=>str_random(5)],
// 			['maTK'=>'m03', 'tenTK'=>str_random(5), 'matKhau'=>bcrypt(str_random(10)), 'maTV'=>str_random(5)]
// 		]);
// 	}
// }
