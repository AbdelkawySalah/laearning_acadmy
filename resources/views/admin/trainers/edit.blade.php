@extends('admin.layouts.master')

@section('title')
  Edit_Trainers / {{$trainer->name}}
@endsection


@section('content')
<div class="d-flex justify-content-between mb-3">
  <h6>Trainers / Edit </h6>
  <a href="{{route('admin.trainer.index')}}" class="btn btn-sm btn-success">Back</a>
 </div>
 @include('admin.layouts.errors')
 <form method="post" action="{{route('admin.trainer.update')}}" enctype="multipart/form-data">
   @csrf
     <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="{{$trainer->name}}" class="form-control"/>
        <input type="hidden" name="triner_id" value="{{$trainer->id}}" class="form-control"/>

     </div>
     <div class="form-group">
        <label>phone</label>
        <input type="text" name="phone" value="{{ $trainer->phone }}" class="form-control"/>
     </div>
     <div class="form-group">
        <label>spec</label>
        <input type="text" name="spec" value="{{ $trainer->spec}}" class="form-control"/>
     </div>
     <div class="form-group">
        <img name="oldimage"  src="{{asset('uploads/trainers/'.$trainer->img)}}" width="50px" height="50px"  alt="{{$trainer->img}}"/>
        <br/>
        </div>
        <div class="form-group">

        <label>upload-image</label>
        <input type="file" name="img"  class="form-control" accept = 'image/png'/>

     </div>
     <button type="submit" class="btn btn-primary mt-3">Submit</button>
 </form>
@endsection


@section('scripts')
@endsection