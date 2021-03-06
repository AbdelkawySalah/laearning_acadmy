<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\SiteContent;
class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  DB::table('site_contents')->delete();
      //   SiteContent::create([
      //       'name'=>'banner',
      //       'content'=>json_encode([
      //         'title'=>'Every child yearns to learn',
      //         'subtitle'=>'Making Your Childs World Better',
      //         'desc'=>"Replenish seasons may male hath fruit beast were seas saw you arrie said man beast whales his void unto last session for bite. Set have great you'll male grass yielding yielding man'",
      //       ]),
      //   ]);

        SiteContent::create([
            'name'=>'courses',
            'content'=>json_encode([
              'title'=>'Our Courses',
              'subtitle'=>'diffrent Categories a',
            ]),
        ]);
    }
}
