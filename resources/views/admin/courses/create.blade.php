@extends('admin.layouts.master')

@section('title')
  Add_Course
@endsection


@section('content')
<div class="d-flex justify-content-between mb-3">
  <h6>Courses / Add New</h6>
  <a href="{{route('admin.course.index')}}" class="btn btn-sm btn-success">Back</a>
 </div>
 <hr/>
 @include('admin.layouts.errors')
 <form method="post" action="{{route('admin.course.store')}}" enctype="multipart/form-data">
   @csrf
     <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control"/>
     </div>
     <div class="form-group">
     <label>Category</label>
     <select class="form-select" name="cat_id" >
       <option selected disabled>Choose Category</option>
        @foreach($cats as $cat)
         <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
      </select>
     </div>
     <div>
     <label>Trainer</label>
     <select class="form-select" name="trainer_id" >
       <option selected disabled>Choose Trainer</option>
        @foreach($trainers as $trainer)
         <option value="{{$trainer->id}}">{{$trainer->name}}</option>
        @endforeach
      </select>
     </div>
     <div class="form-group">
        <label>small_desc</label>
        <input type="text" name="small_desc" value="{{old('small_desc')}}" class="form-control"/>
     </div>
     <div class="form-group">
        <label>desc</label>
        <textarea name="desc" rows="4" cols="2" class="form-control"></textarea>
     </div>
     <div class="form-group">
        <label>Course_price</label>
        <input type="text" name="price" value="{{old('price')}}" class="form-control"/>
     </div>
     <div class="form-group">
        <label>Triner-image</label>
        <input type="file" name="img"  class="form-control" accept = 'image/*'/>
     </div>
     <button type="submit" class="btn btn-primary mt-3">Submit</button>
 </form>
@endsection


@section('scripts')
@endsection