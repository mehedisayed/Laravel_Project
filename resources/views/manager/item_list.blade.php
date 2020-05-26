@extends('layout/manager')


@section('title')
Product Item
@endsection
@section('content')

<a href="{{route('manager.newitem')}}" class="btn btn-outline-info mb-2"><i class="fa fa-plus" aria-hidden="true"></i> New</a>

<div class="table-responsive">

<table class="table table-hover table-bordered table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Discription</th>
      <th scope="col">Sub-Category</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  @foreach($items as $item)
		<tr>
			<td>{{$item->iid}}</td>
			<td>{{$item->iname}}</td>
			<td>{{$item->iprice}}</td>
			<td><small>{{$item->description}}</small></td>
			<td>{{$item->scname}}</td>
			<td>
			<a href="{{route('manager.edititem',$item->iid)}}" class="btn btn-outline-dark"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
			<a href="{{route('manager.deleteitem',$item->iid)}}" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
			</td>
		</tr>
		@endforeach
  		
	</tbody>
</table>

</div>
@endsection
  