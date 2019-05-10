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

        // DB::table('chuongtruyen')->insert([
        //     'tenChuong'=>'chuong 4 cua truyen 1',
        //     'noiDung'=>'nd',
        //     'ngayDang'=>'1-4-2019',
        //     'maTruyen'=>'T0'
        // ]);
        //$this->call(tkSeeder::class);
<<<<<<< HEAD
        $this->call(AdSeeder::class);
        
=======
        //$this->call(AdSeeder::class);

>>>>>>> 345702677909421d086dc84d640e3cffc7ef677d
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
