<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cat;
class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cats')->delete();
        $categories=[
            ['name'=>'programming'],
            ['name'=>'medical'],
            ['name'=>'english']
        ];
        foreach($categories as $category)
        {
            Cat::create($category);
        }

    }
}
