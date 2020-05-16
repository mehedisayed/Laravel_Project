@extends('layout/admin')

@section('title')
Edit Category
@endsection
@section('content')


<form method="post">
@csrf
  <div class="form-group row">
    <label for="cid" class="col-sm-2 col-form-label">ID</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="cid" value="{{$category->cid}}" readonly>
    </div>
  </div>

  <div class="form-group row">
    <label for="cname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="cname" value="{{$category->cname}}">
    </div>
  </div>
  <button type="submit" class="btn btn-primary"> Update</button>

</form>
@foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
@endsection
  