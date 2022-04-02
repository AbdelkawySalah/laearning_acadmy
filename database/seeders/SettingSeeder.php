<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();
        Setting::create([
            'name'=>'Learning_Acadamy',
            'logo'=>'logo.png',
            'favicon'=>'favicon.png',
            'city'=>'Menoufiy',
            'address'=>'23-NahdaStreet_Mnouf',
            'phone'=>'048-3631373',
            'work_hours'=>'Sun To Thur 9am To 7pm',
            'email'=>'abdousalahgad@yahoo.com',
            'map'=>'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13747.243347467558!2d30.931944930224606!3d30.52638760000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14587f8c43c2e1bb%3A0x3435236d554725c4!2z2YXZhti02KPYqSDYs9mE2LfYp9mG2Iwg2YXYsdmD2LIg2YXZhtmI2YHYjCDYp9mE2YXZhtmI2YHZitip!5e0!3m2!1sar!2seg!4v1648410943243!5m2!1sar!2seg" width="1000" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'fb'=>'https://www.facebook.com/abdelkawy.salah',
            'twitter'=>'https://business.twitter.com/en/basics.html',
            'insta'=>'https://www.instagram.com/sdlearn/'
        ]);
    }
}
