<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
class MessageController extends Controller
{
    public function newsletter(Request $request)
    {
        $data=$request->validate([
        'email'=>'required|email|unique:newsletters',
        ]);

        Newsletter::create($data);
        return back();

    }

    public function contactus(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string|max:191',
            'email'=>'required|email|max:191|unique:messages',
            'subject'=>'nullable|string|max:191',
            'message'=>'required|string|min:5|max:50',
        ]);

      Message::create($data);
      return back();
    }

    //الاشتراكات بالكورسات
    public function enroll(Request $request)
    {
        $data=$request->validate([
           'name'=>'nullable|string|max:191',
           'email'=>'email|required|max:191',
           'spec'=>'nullable|string|max:191',
           'course_id'=>'required|exists:courses,id',
        ]);
    
        $stu=Student::where('email',$request->email)->first();
        if($stu==null)
        {
            Student::create([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'spec'=>$data['spec'],
            ]);
            DB::table('course_student')->insert([
                'course_id'=>$data['course_id'],
                'student_id'=>Student::latest()->first()->id,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }

        else
        {
            DB::table('course_student')->insert([
                'course_id'=>$data['course_id'],
                'student_id'=>$stu->id,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
        
        
        return back();
    }

}
