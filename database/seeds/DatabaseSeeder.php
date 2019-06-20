<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\nhom;
use App\admin;
use App\thanhvien;
use App\theloai;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        //$this->call(tkSeeder::class);

        //$this->call(nhom1::class);
        $this->call(Admin1::class);
        //$this->call(Admin2::class);
        //$this->call(theloai1::class);
=======

        $this->call(tkSeeder::class);

        // $this->call(UsersTableSeeder::class);






        // DB::table('chuongtruyen')->insert([
        //     'tenChuong'=>'chuong 4 cua truyen 1',
        //     'noiDung'=>'nd',
        //     'ngayDang'=>'1-4-2019',
        //     'maTruyen'=>'T0'
        // ]);
        // $this->call(tkSeeder::class);
        //$this->call(nhomSeeder::class);
        // $this->call(Admin1::class);
        $this->call(Admin2::class);
>>>>>>> 3dcf1019e85ad575671ee2afbf114a33e1b46cd0

    }
}

class tkSeeder extends Seeder
{
 	public function run()
	{
 		for ($i=0; $i < 5; $i++) { 
            $data = new thanhvien;
            $data->name = str_random(3);
            $data->password = bcrypt('12345');
            $data->email = str_random(5).'@gmail.com';
            $data->maNhom = random_int(1,6);
            $data->create_at = Carbon::now('Asia/Ho_Chi_Minh');
            $data->save();
        }
 	}
}

class nhom1 extends Seeder
{
    public function run()
    {
        for ($i=0; $i < 6; $i++) { 
            # code...
        
        $data = new nhom;
        $data->tenNhom = str_random(6);
        $data->maTruongNhom = random_int(1, 5);
        $data->ngayLap = Carbon::now('Asia/Ho_Chi_Minh');
        $data->save(); 
        }  
    }
}

class Admin1 extends Seeder
{
    public function run()
    {
        $ad1 = new admin;
        $ad1->name ='ngo kinh';
        $ad1->password = bcrypt('12345');
        $ad1->email = '3noname@gmail.com';
        $ad1->create_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ad1->quyen = 'noidung';
        $ad1->save();
    }
}

class Admin2 extends Seeder
{
    public function run()
    {
        $ad1 = new admin;
        $ad1->name ='thanh duc';
        $ad1->password = bcrypt('12345');
        $ad1->email = '2noname@gmail.com';
        $ad1->create_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ad1->quyen = 'taikhoan';
        $ad1->save();
    }
}
class theloai1 extends Seeder
{
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            # code...
            $data = new theloai;
            $data->tenTL = str_random(5);
            $data->moTa = 'Day la 1 the loai hap dan';
            $data->save();
        }
    }
}

