<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\nhom;
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

        // DB::table('chuongtruyen')->insert([
        //     'tenChuong'=>'chuong 4 cua truyen 1',
        //     'noiDung'=>'nd',
        //     'ngayDang'=>'1-4-2019',
        //     'maTruyen'=>'T0'
        // ]);
        //$this->call(tkSeeder::class);
        //$this->call(tvSeeder::class);
        //$this->call(nhomSeeder::class);
        $this->call(nhom1::class);
        
=======
        DB::table('thanhvien')->insert(
            [ 
            'name'=>'tentkxx',
            'password'=>bcrypt(12345),
             'email'=>'famousthanhducxx@gmail.com',
             'maNhom'=>'N0',
             'create_at' =>Carbon::now('Asia/Ho_Chi_Minh')
         ]
            
        );


>>>>>>> a762d398a1992ceca1b858f29592f1465191882d
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

class nhom1 extends Seeder
{
    public function run()
    {
        for ($i=0; $i < 4; $i++) { 
            # code...
        
        $data = new nhom;
        $data->tenNhom = str_random(10);
        $data->maTruongNhom = random_int(6, 11);
        $data->soLuongTV = random_int(5,10);
        $data->soLuongTruyen = random_int(5,10);
        $data->ngayLap = Carbon::now('Asia/Ho_Chi_Minh');
        $data->save(); 
        }  
    }
}