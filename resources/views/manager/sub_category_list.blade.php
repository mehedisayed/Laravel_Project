@extends('layout/manager')


@section('title')
Product Sub Category
@endsection
@section('content')

<a href="{{route('manager.newsubcategory')}}" class="btn btn-outline-info mb-2"><i class="fa fa-plus" aria-hidden="true"></i> New</a>
<table class="table table-hover table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Category</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  @foreach($subcategories as $subcategory)
		<tr>
			<td>{{$subcategory->scid}}</td>
			<td>{{$subcategory->scname}}</td>
			<td>{{$subcategory->cname}}</td>
			<td>
      <a href="{{route('manager.editsubcategory',$subcategory->scid)}}" class="btn btn-outline-dark"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> | 
			<a href="{{route('manager.deletesubcategory',$subcategory->scid)}}" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
			</td>
		</tr>
		@endforeach
  		
	</tbody>
</table>

@endsection
  