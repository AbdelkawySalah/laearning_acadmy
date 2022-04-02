<?php

namespace Database\Seeders;

use App\Models\Trainer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('trainers')->delete();
        $trainers = [
            ['name'=>'ahmed ali','spec'=>'web development','img'=>'1.png'],
            ['name'=>'ayman ali','spec'=>'web development','img'=>'2.png'],
            ['name'=>'waleed ali','spec'=>'web development','img'=>'3.png'],
            ['name'=>'fouad ali','spec'=>'web development','img'=>'4.png'],
            ['name'=>'samir ali','spec'=>'web development','img'=>'5.png'],
        ];
    foreach($trainers as $trainer)
    {
         Trainer::create($trainer);
    }
   
    //     Trainer::create([
    //        'name'=>'ahmed ali',
    //        'spec'=>'web development',
    //        'img'=>'1.jpg'
    //    ]);

    //    Trainer::create([
    //     'name'=>'waleed yaser',
    //     'spec'=>'web development',
    //     'img'=>'2.jpg'
    // ]);

    // Trainer::create([
    //     'name'=>'Yousef omr',
    //     'spec'=>'web development',
    //     'img'=>'3.jpg'
    // ]);

    // Trainer::create([
    //     'name'=>'ayman yaser',
    //     'spec'=>'web development',
    //     'img'=>'4.jpg'
    // ]);

    // Trainer::create([
    //     'name'=>'adel ali',
    //     'spec'=>'web development',
    //     'img'=>'5.jpg'
    // ]);

    }
}
