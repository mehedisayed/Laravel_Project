@extends('layout/manager')


@section('title')
Edit Order
@endsection
@section('content')

<form method="post">
@csrf
  <div class="form-group row">
    <label for="olid" class="col-sm-2 col-form-label">Order Log ID</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="olid" value="{{$order->olid}}" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="uid" class="col-sm-2 col-form-label">Customer ID</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="uid" value="{{$order->olid}}" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="date" class="col-sm-2 col-form-label">Date</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="date" value="{{$order->date}}" readonly>
    </div>
  </div>
 <div class="form-group row">
    <label for="status" class="col-sm-2 col-form-label">Status</label>
    <select class="form-control form-control-sm col-4" name="status">
      <option value="Shipping Ready" selected>Shipping Ready</option>
      <option value="Completed" >Completed</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary"> Update</button>

</form>
@foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
@endsection
  