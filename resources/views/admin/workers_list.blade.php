@extends('layout/admin')


@section('title')
Workers List
@endsection
@section('content')

<a href="{{route('admin.newworker')}}" class="btn btn-outline-info mb-2"><i class="fa fa-plus" aria-hidden="true"></i> New</a>
@if($page=="All")
<a href="{{route('admin.workerslist')}}" class="btn btn-outline-info mb-2 active"><i class="fa fa-globe" aria-hidden="true"></i> All</a>
<a href="{{route('admin.adminlist')}}" class="btn btn-outline-info mb-2"><i class="fa fa-user-circle" aria-hidden="true"></i> Admin List</a>
<a href="{{route('admin.managerlist')}}" class="btn btn-outline-info mb-2"><i class="fa fa-user-circle" aria-hidden="true"></i> Employee List</a>
<a href="{{route('admin.employeelist')}}" class="btn btn-outline-info mb-2"><i class="fa fa-user-circle" aria-hidden="true"></i> Manager List</a>
@elseif($page=="Admin")
<a href="{{route('admin.workerslist')}}" class="btn btn-outline-info mb-2 "><i class="fa fa-globe" aria-hidden="true"></i> All</a>
<a href="{{route('admin.adminlist')}}" class="btn btn-outline-info mb-2 active" ><i class="fa fa-user-circle"  aria-hidden="true"></i> Admin List</a>
<a href="{{route('admin.managerlist')}}" class="btn btn-outline-info mb-2"><i class="fa fa-user-circle" aria-hidden="true"></i> Employee List</a>
<a href="{{route('admin.employeelist')}}" class="btn btn-outline-info mb-2"><i class="fa fa-user-circle" aria-hidden="true"></i> Manager List</a>
@elseif($page=="Manager")
<a href="{{route('admin.workerslist')}}" class="btn btn-outline-info mb-2 "><i class="fa fa-globe" aria-hidden="true"></i> All</a>
<a href="{{route('admin.adminlist')}}" class="btn btn-outline-info mb-2 " ><i class="fa fa-user-circle"  aria-hidden="true"></i> Admin List</a>
<a href="{{route('admin.managerlist')}}" class="btn btn-outline-info mb-2 active"><i class="fa fa-user-circle" aria-hidden="true"></i> Employee List</a>
<a href="{{route('admin.employeelist')}}" class="btn btn-outline-info mb-2"><i class="fa fa-user-circle" aria-hidden="true"></i> Manager List</a>
@else
<a href="{{route('admin.workerslist')}}" class="btn btn-outline-info mb-2 "><i class="fa fa-globe" aria-hidden="true"></i> All</a>
<a href="{{route('admin.adminlist')}}" class="btn btn-outline-info mb-2 " ><i class="fa fa-user-circle"  aria-hidden="true"></i> Admin List</a>
<a href="{{route('admin.managerlist')}}" class="btn btn-outline-info mb-2 "><i class="fa fa-user-circle" aria-hidden="true"></i> Employee List</a>
<a href="{{route('admin.employeelist')}}" class="btn btn-outline-info mb-2 active"><i class="fa fa-user-circle" aria-hidden="true"></i> Manager List</a>

@endif


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
      <th scope="col">Action</th>
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
			<td>
			<a href="{{route('admin.editworker',$user->uid)}}" class="btn btn-outline-dark"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
			<a href="{{route('admin.deleteworker',$user->uid)}}" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
			</td>
		</tr>
		@endforeach
  		
	</tbody>
</table>

</div>
@endsection
  