@extends('admin.layouts.master')

@section('title')
  Add_Trainers
@endsection


@section('content')
<div class="d-flex justify-content-between mb-3">
  <h6>Trainers / Add New</h6>
  <a href="{{route('admin.trainer.index')}}" class="btn btn-sm btn-success">Back</a>
 </div>
 @include('admin.layouts.errors')
 <form method="post" action="{{route('admin.trainer.store')}}" enctype="multipart/form-data">
   @csrf
     <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control"/>
     </div>
     <div class="form-group">
        <label>phone</label>
        <input type="text" name="phone" value="{{old('phone')}}" class="form-control"/>
     </div>
     <div class="form-group">
        <label>spec</label>
        <input type="text" name="spec" value="{{old('spec')}}" class="form-control"/>
     </div>
     <div class="form-group">
        <label>Triner-image</label>
        <input type="file" name="img"  class="form-control" accept = 'image/png'/>
     </div>
     <button type="submit" class="btn btn-primary mt-3">Submit</button>
 </form>
@endsection


@section('scripts')
@endsection