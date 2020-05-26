@extends('layout/manager')

@section('title')
New Item
@endsection
@section('content')


<form method="post">
@csrf
  <div class="form-group row">
    <label for="iid" class="col-sm-2 col-form-label">ID</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="iid" value="" readonly>
    </div>
  </div>

  <div class="form-group row">
    <label for="iname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="iname" value="">
    </div>
  </div>

  <div class="form-group row">
    <label for="iprice" class="col-sm-2 col-form-label">Price</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="iprice" value="">
    <small id="emailHelp" class="form-text text-muted">Enter Float Number Only.</small>
    </div>
  </div>

  <div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-4">
    <textarea  class="form-control form-control-sm" name="description"></textarea >
    </div>
  </div>

  <div class="form-group row">
    <label for="cid" class="col-sm-2 col-form-label">Category</label>
    <select class="form-control form-control-sm col-4" name="scid">
    @foreach($subcategories as $subcategory)
      <option value="{{$subcategory->scid}}">{{$subcategory->scname}}</option>
		@endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary"> Save</button>

</form>
@foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
@endsection
  