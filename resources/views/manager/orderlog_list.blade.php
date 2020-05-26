@extends('layout/manager')


@section('title')
Orders List
@endsection
@section('content')

<table class="table table-hover table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Customer ID</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  @foreach($orders as $order)
		<tr>
			<td>{{$order->olid}}</td>
			<td>{{$order->uid}}</td>
			<td>{{$order->date}}</td>
			<td>{{$order->status}}</td>
      @if($order->status=="Shipping Ready")
			<td>
      <a href="{{route('manager.editorderlog',$order->olid)}}" class="btn btn-outline-dark"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> 
			</td>
      @else
      <td>
      </td>
      @endif
		</tr>
		@endforeach
  		
	</tbody>
</table>

@endsection
  