@extends('admin.layouts.master')

@section('title')
  Add_Categories
@endsection


@section('content')
<div class="d-flex justify-content-between mb-3">
  <h6>Categories / Add New</h6>
  <a href="{{route('admin.cat.index')}}" class="btn btn-sm btn-success">Back</a>
 </div>
 @include('admin.layouts.errors')
 <form method="post" action="{{route('admin.cat.store')}}">
   @csrf
     <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control"/>
     </div>
     
     <button type="submit" class="btn btn-primary mt-3">Submit</button>
 </form>
@endsection


@section('scripts')
@endsection