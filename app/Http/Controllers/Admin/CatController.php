<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat;
class CatController extends Controller
{
    public function index()
    {
        $data['cats']=Cat::orderby('id','desc')->get();
        return view('admin.cats.index')->with($data);
    }

    public function create()
    {
        return view('admin.cats.create');

    }

    public function store(Request $request)
    {
        $data=$request->validate([
          'name'=>'required|string|max:191|unique:cats',
        ]);

        Cat::create($data);
        return redirect(route('admin.cat.index'));
    }

    public function edit($id)
    {
        $data['cat']=Cat::findorfail($id);
        return view('admin.cats.edit')->with($data);
    }

    public function update(Request $request)
    {
       $data=$request->validate([
           'name'=>'required|max:20|unique:cats,name,'.$request->cat_id,
       ]);
      Cat::findorfail($request->cat_id)->update($data);
      return redirect(route('admin.cat.index'));
    }

    public function destroy($id)
    {
        Cat::findorfail($id)->delete();
        return redirect(route('admin.cat.index'));
    }
}
