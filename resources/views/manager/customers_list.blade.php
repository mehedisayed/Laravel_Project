@extends('layout/manager')


@section('title')
Customers List
@endsection
@section('content')

<div class="table-responsive">

<table class="table table-hover table-bordered table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Gender</th>
      <th scope="col">Role</th>
      <th scope="col">Address</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
		<tr>
			<td>{{$user->uid}}</td>
			<td>{{$user->uname}}</td>
			<td>{{$user->email}}</td>
			<td>{{$user->phone}}</td>
			<td>{{$user->gender}}</td>
			<td>{{$user->role}}</td>
			<td>{{$user->address}}</td>
			<td>{{$user->status}}</td>
		</tr>
		@endforeach
  		
	</tbody>
</table>

</div>
@endsection
