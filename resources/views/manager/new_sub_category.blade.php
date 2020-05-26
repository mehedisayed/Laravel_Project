@extends('layout/manager')


@section('title')
New Sub Category
@endsection
@section('content')


<form method="post">
@csrf
  <div class="form-group row">
    <label for="scid" class="col-sm-2 col-form-label">ID</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="scid" value="" readonly>
    </div>
  </div>

  <div class="form-group row">
    <label for="scname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="scname" value="">
    </div>
  </div>

  <div class="form-group row">
    <label for="cid" class="col-sm-2 col-form-label">Category</label>
    <select class="form-control form-control-sm col-4" name="cid">
    @foreach($categories as $category)
      <option value="{{$category->cid}}">{{$category->cname}}</option>
		@endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary"> Save</button>

</form>
@foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
@endsection
  