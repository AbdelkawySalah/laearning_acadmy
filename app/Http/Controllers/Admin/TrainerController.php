<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class TrainerController extends Controller
{
    public function index()
    {
        $data['trainers']=Trainer::orderBy('id','desc')->get();
        return view('admin.trainers.index')->with($data);
    }

    public function create()
    {
      return view('admin.trainers.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string|max:40|unique:trainers',
            'phone'=>'nullable|numeric|max:12|min:6',
            'spec'=>'required|string|max:40',
            'img'=>'required|image|mimes:png',
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);

        if($request->hasfile('img')) 
        {
            $newimage=$data['img']->hashName();
            $file=$request->file('img'); 
            $file->move('uploads/trainers',$newimage);
            $data['img']=$newimage;
		}

        Trainer::create($data);
		 return redirect(route('admin.trainer.index'));

    }

    public function edit($id)
    {
      $data['trainer']=Trainer::findorfail($id);
      return view('admin.trainers.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data=$request->validate([
             'name'=>'required|string|unique:trainers,name,'.$request->triner_id,
             'phone'=>'nullable|numeric|unique:trainers,phone,'.$request->triner_id,
             'spec'=>'required|string|max:40',
             'img'=>'image|mimes:png'
         ]);

         $old_image=Trainer::findorfail($request->triner_id)->img;
         if($request->hasfile('img')) 
         {
             //هشيل الصورة الديمة
			  $path='uploads/trainers/'.$old_image;
              if(File::exists($path))
              {
                  File::delete($path);
              }  
            
              $file=$request->file('img'); 
              $newimage=$data['img']->hashName(); 
              $file->move('uploads/trainers',$newimage);

              $data['img']=$newimage;
         }
         else{
            $data['img']=$old_image;
         }

         Trainer::findorfail($request->triner_id)->update($data);

         return redirect(route('admin.trainer.index'));
 
    }

    public function destroy($id)
    {
        
        $trainer=Trainer::findorfail($id);
        $path='uploads/trainers/'.$trainer->img;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $trainer->delete();
        return back();

    }
}
