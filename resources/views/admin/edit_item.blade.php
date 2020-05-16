@extends('layout/admin')

@section('title')
Edit Item
@endsection
@section('content')


<form method="post">
@csrf
  <div class="form-group row">
    <label for="iid" class="col-sm-2 col-form-label">ID</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="iid" value="{{$item->iid}}" readonly>
    </div>
  </div>

  <div class="form-group row">
    <label for="iname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="iname" value="{{$item->iname}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="iprice" class="col-sm-2 col-form-label">Price</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="iprice" value="{{$item->iprice}}">
    <small id="emailHelp" class="form-text text-muted">Enter Float Number Only.</small>
    </div>
  </div>

  <div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-4">
    <textarea  class="form-control form-control-sm" name="description">{{$item->description}}</textarea >
    </div>
  </div>

  <div class="form-group row">
    <label for="cid" class="col-sm-2 col-form-label">Category</label>
    <select class="form-control form-control-sm col-4" name="scid">
    @foreach($subcategories as $subcategory)
      @if($subcategory->scid==$item->scid)
		  <option value="{{$subcategory->scid}}" selected>{{$subcategory->scname}}</option>
      @else
      <option value="{{$subcategory->scid}}">{{$subcategory->scname}}</option>
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
  