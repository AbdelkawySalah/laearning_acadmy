@extends('admin.layouts.master')

@section('title')
  update_Categories / {{$cat->name}}
@endsection


@section('content')
<div class="d-flex justify-content-between mb-3">
  <h6>Categories / Update </h6>
  <a href="{{route('admin.cat.index')}}" class="btn btn-sm btn-success">Back</a>
 </div>
 @include('admin.layouts.errors')
 <form method="post" action="{{route('admin.cat.update')}}">
   @csrf
     <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{$cat->name}}" />
        <input type="hidden" name="cat_id" class="form-control" value="{{$cat->id}}" />

     </div>
     <button type="submit" class="btn btn-primary mt-3">Submit</button>
 </form>
@endsection


@section('scripts')
@endsection