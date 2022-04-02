<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('tests')->delete();
        $datas=[
            ['name'=>'Abdelkawy Salah','spec'=>'Web developer','desc'=>'Can Do Alot Of Programming Langauage with alt lang of this ','img'=>'1.png'],
            ['name'=>'Nadin Salah','spec'=>'Front developer','desc'=>'Nadin Do Alot Of Programming Langauage with alt lang of this ','img'=>'2.png'],
            ['name'=>'Youmna Salah','spec'=>'Oracle developer','desc'=>'Ypumna Do Alot Of Programming Langauage with alt lang of this ','img'=>'3.png'],
        ];
        foreach($datas as $data)
        {
           Test::create($data);
        }

    }
}
