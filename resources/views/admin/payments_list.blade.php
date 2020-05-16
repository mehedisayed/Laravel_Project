@extends('layout/admin')


@section('title')
Payments List
@endsection
@section('content')

<div class="table-responsive">

<table class="table table-hover table-bordered table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Date</th>
      <th scope="col">Amount</th>
      <th scope="col">Status</th>
      <th scope="col">Order Id</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  @foreach($payments as $payment)
		<tr>
			<td>{{$payment->pid}}</td>
			<td>{{$payment->date}}</td>
			<td>{{$payment->amount}}</td>
			<td>{{$payment->status}}</td>
			<td>{{$payment->olid}}</td>
			@if($payment->status=="Completed")
			<td>
			</td>
			@else
			<td>
			<a href="{{route('admin.editpayment',$payment->pid)}}" class="btn btn-outline-dark"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
			</td>
			@endif
		</tr>
		@endforeach
  		
	</tbody>
</table>

</div>
@endsection
  