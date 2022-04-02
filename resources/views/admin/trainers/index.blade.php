@extends('admin.layouts.master')

@section('title')
  Trainers
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
  <h6>Trainers</h6>
  <a href="{{route('admin.trainer.create')}}" class="btn btn-sm btn-success">Add</a>
 </div>
 <hr>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">phone</th>
      <th scope="col">Specilshion</th>
      <th scope="col">Photo</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
   @foreach($trainers as $trainer)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$trainer->name}}</td>
      <td>
        {{$trainer->phone}}  
      </td>
      <td>{{$trainer->spec}}</td>
      <td><img src="{{asset('uploads/trainers/'.$trainer->img)}}"  alt="{{$trainer->img}}" title="{{$trainer->img}}" /></td>

      <td>
         <a href="{{route('admin.trainer.edit',$trainer->id)}}" type="button" class="btn btn-sm btn-primary">Edit</button> 
         <a href="{{route('admin.trainer.delete',$trainer->id)}}" type="button" class="btn btn-sm btn-danger">Delete</button>
      </td>
    </tr>
   @endforeach
   
  </tbody>
</table>
@endsection


@section('scripts')
@endsection