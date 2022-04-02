<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call(CatSeeder::class);
        $this->call(TrainerSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(course_student::class);
        $this->call(TestSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(SiteContentSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
