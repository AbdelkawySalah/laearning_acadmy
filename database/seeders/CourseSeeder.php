<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->delete();

        for($i=1;$i<=3;$i++)
        {
           for($j=1;$j<=6;$j++)
           {
               Course::create([
                   'cat_id'=>$i,
                   'trainer_id'=>rand(1,5),
                   'name'=>"course num $j cat num $i",
                   'small_desc'=>'Lorm Pere jdj adafkafk afa;afllaf dgdggd aflafafl aflafl',
                   'desc'=>'Lorm Pere jdj adafkafk afa;afllaf dgdggd aflafafl aflafl ffsssffrwwrt wtwwwt sffsfsf vxv,,xvxvxv',
                   'img'=>"$i$j.png",
                   'price'=>rand(1000,5000),
               ]);
           }
        }
    }
}
