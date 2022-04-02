<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\Trainer;

use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    public function index()
    {
       $data['courses']=Course::orderby('id','desc')->paginate(6);
      return view('admin.courses.index')->with($data);
    }

    public function create()
    {
      $data['cats']=Cat::select('id','name')->get();
      $data['trainers']=Trainer::select('id','name')->get();
      return view('admin.courses.create')->with($data);
    }

    public function store(Request $request)
    {
        $data=$request->validate([
          'name'=>'required|string|max:40|unique:courses',
            //عشان لو حد حب يعدل من خلال inspect element ويض اي قيمة
          'cat_id'=>'required|exists:cats,id',
          'trainer_id'=>'required|exists:trainers,id',
          'small_desc'=>'required|max:40|min:4',
          'desc'=>'required',
          'price'=>'required|integer',
          'img'=>'required|image|mimes:jpg,png,jpeg,gif'
        ]);

       
        if($request->hasfile('img'))
        {
          $data['img']=$request->img->hashName();
          $file=$request->file('img'); 
          $file->move('uploads/courses',$data['img']);
        }

        Course::create($data);
        return redirect(route('admin.course.index'));

    }

    public function edit($id)
    {
      $data['course']=Course::findorfail($id);
      $data['cats']=Cat::select('id','name')->get();
      $data['trainers']=Trainer::select('id','name')->get();
      return view('admin.courses.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data=$request->validate([
          'name'=>'required|string|max:40|unique:courses,name,'.$request->course_id,
          //عشان لو حد حب يعدل من خلال inspect element ويض اي قيمة
          'cat_id'=>'required|exists:cats,id',
          'trainer_id'=>'required|exists:trainers,id',
          'small_desc'=>'required|max:40|min:4',
          'desc'=>'required',
          'price'=>'required|numeric',
          'img'=>'image|mimes:jpg,png,jpeg,gif'
        ]);
     
        $old_img=Course::findorfail($request->course_id)->img;
        
        if($request->hasfile('img'))
        {
           //هشيل الصورة الديمة
           $path="uploads/courses/".$old_img;
           if(File::exists($path))
           {
             File::delete($path);
           }
           $file=$request->file('img');
           $data['img']=$data['img']->hashName();
           $file->move('uploads/courses',$data['img']);
        }

        else{
          $data['img']=$old_img;
        }

        Course::findorfail($request->course_id)->update($data);
        return redirect(route('admin.course.index'));

    }

    public function delete($id)
    {
     
      $course=Course::findorfail($id);
      $path="uploads/courses/".$course->img;
      if(File::exists($path))
      {
          File::delete($path);
      }
      $course->delete();
      return back();
    }
}
