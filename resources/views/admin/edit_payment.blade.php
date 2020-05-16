@extends('layout/admin')


@section('title')
Edit Payment
@endsection
@section('content')

<form method="post">
@csrf
  <div class="form-group row">
    <label for="pid" class="col-sm-2 col-form-label">ID</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="pid" value="{{$payment->pid}}" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="date" class="col-sm-2 col-form-label">Date</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="date" value="{{$payment->date}}" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="amount" class="col-sm-2 col-form-label">Amount</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="amount" value="{{$payment->amount}}" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="olid" class="col-sm-2 col-form-label">Order Log ID</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="olid" value="{{$payment->olid}}" readonly>
    </div>
  </div>
 <div class="form-group row">
    <label for="status" class="col-sm-2 col-form-label">Status</label>
    <select class="form-control form-control-sm col-4" name="status">
      <option value="Pendding" selected>Pendding</option>
      <option value="Completed" >Completed</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary"> Update</button>

</form>
@foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
@endsection
  