<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\Course;
class CourseController extends Controller
{
    public function showcourses($id)
    {
        $data['cat']=Cat::findorfail($id);
        $data['courses']=Course::where('cat_id',$id)->paginate(3);
        return view('front.courses.cat',$data);
    }

    public function showcourse($c_id,$cours_id)
    {
       $data['course']=Course::where('id',$cours_id)->where('cat_id',$c_id)->first();
    //  return $data['course'];
    return view('front.courses.showcourse',$data);
}
}
