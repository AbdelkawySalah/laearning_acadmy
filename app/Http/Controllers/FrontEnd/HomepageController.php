<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Cat;
use App\Models\SiteContent;

class HomepageController extends Controller
{
    public function index()
    {
       $data['banner']=SiteContent::select('content')->where('name','banner')->first();
       $data['courses_content']=SiteContent::select('content')->where('name','courses')->first();
       $data['courses']=Course::select('id','name','small_desc','cat_id','trainer_id','img','price')
        ->orderby('id','desc')
        ->take(3)
        ->get();

        //get testimonial_part
        $data['tests']=Test::select('id','name','spec','desc','img')->get();

                //get Category courses
    //    $data['cats']=Cat::get();
        return view('front.index',$data);
    }
}

