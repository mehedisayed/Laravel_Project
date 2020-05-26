@extends('layout/manager')

@section('title')
Edit Sub Category
@endsection
@section('content')


<form method="post">
@csrf
  <div class="form-group row">
    <label for="scid" class="col-sm-2 col-form-label">ID</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="scid" value="{{$subcategory->scid}}" readonly>
    </div>
  </div>

  <div class="form-group row">
    <label for="scname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="scname" value="{{$subcategory->scname}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="cid" class="col-sm-2 col-form-label">Category</label>
    <select class="form-control form-control-sm col-4" name="cid">
    @foreach($categories as $category)
      @if($category->cid==$subcategory->cid)
		  <option value="{{$category->cid}}" selected>{{$category->cname}}</option>
      @else
      <option value="{{$category->cid}}">{{$category->cname}}</option>
      @endif
		@endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary"> Update</button>

</form>
@foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
@endsection
  