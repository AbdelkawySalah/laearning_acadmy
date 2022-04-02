@extends('admin.layouts.master')

@section('title')
  Courses
@endsection

@section('css')
  <style>
     img{
         width: 50px;
         height: 50px;
     }
  </style>
@endsection

@section('content')
 <div class="d-flex justify-content-between mb-3">
  <h6>Courses</h6>
  <a href="{{route('admin.course.create')}}" class="btn btn-sm btn-success">Add</a>
 </div>
 
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Category</th>
      <th scope="col">Trainer</th>
      <th scope="col">small_desc</th>
      <th scope="col">price</th>
      <th scope="col">Photo</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
   @foreach($courses as $course)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$course->name}}</td>
      <td>
        {{$course->cat->name}}  
      </td>
      <td>{{$course->trainer->name}}</td>
      <td>{{$course->small_desc}}</td>
      <td>{{$course->price}}</td>
      <td><img src="{{asset('uploads/courses/'.$course->img)}}"  alt="{{$course->img}}" title="{{$course->img}}" /></td>

      <td>
         <a href="{{route('admin.course.edit',$course->id)}}" type="button" class="btn btn-sm btn-primary">Edit</button> 
         <a href="{{route('admin.course.delete',$course->id)}}" type="button" class="btn btn-sm btn-danger">Delete</button>
      </td>
    </tr>
   @endforeach
   {{$courses->links()}}

  </tbody>

</table>
@endsection


@section('scripts')
@endsection