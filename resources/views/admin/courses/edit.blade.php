@extends('admin.layouts.master')

@section('title')
  edit_Course > {{$course->name}}
@endsection


@section('content')
<div class="d-flex justify-content-between mb-3">
  <h6>Courses / Edit </h6>
  <a href="{{route('admin.course.index')}}" class="btn btn-sm btn-success">Back</a>
 </div>
 <hr/>
 @include('admin.layouts.errors')
 <form method="post" action="{{route('admin.course.update')}}" enctype="multipart/form-data">
   @csrf
     <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="{{$course->name}}" class="form-control"/>
        <input type="hidden" name="course_id" value="{{$course->id}}" class="form-control"/>
     </div>
     <div class="form-group">
     <label>Category</label>
     <select class="form-select" name="cat_id" >
       <option selected disabled>Choose Category</option>
        @foreach($cats as $cat)
         <option value="{{$cat->id}}" {{$cat->id==$course->cat_id?'selected':''}}>{{$cat->name}}</option>
        @endforeach
      </select>
     </div>
     <div>
     <label>Trainer</label>
     <select class="form-select" name="trainer_id" >
       <option selected disabled>Choose Trainer</option>
        @foreach($trainers as $trainer)
         <option value="{{$trainer->id}}" {{$trainer->id==$course->trainer_id?'selected':''}}>{{$trainer->name}}</option>
        @endforeach
      </select>
     </div>
     <div class="form-group">
        <label>small_desc</label>
        <input type="text" name="small_desc" value="{{$course->small_desc}}" class="form-control"/>
     </div>
     <div class="form-group">
        <label>desc</label>
        <textarea name="desc" rows="4" cols="2" class="form-control">{{$course->desc}}</textarea>
     </div>
     <div class="form-group">
        <label>Course_price</label>
        <input type="text" name="price" value="{{$course->price}}" class="form-control"/>
     </div>
     <div class="form-group pt-3 pb-3">
        <img src="{{asset('uploads/courses/'.$course->img)}}" alt="{{$course->img}}"  title="{{$course->img}}" width="70px" max_height="70px" />
        <br/>
        <label>Triner-image</label>
        <input type="file" name="img"  class="form-control" accept = 'image/*'/>
     </div>
     <button type="submit" class="btn btn-primary mt-3">Submit</button>
 </form>
@endsection


@section('scripts')
@endsection