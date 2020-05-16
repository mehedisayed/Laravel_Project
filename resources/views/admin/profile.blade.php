@extends('layout/admin')


@section('title')
Profile
@endsection
@section('content')
<div class="card-profile">
  <h3>{{$user->uname}}</h3>
  <p class="title-profile"><i class="fa fa-id-badge" aria-hidden="true"></i> {{$user->role}}</p>
  @if($user->gender=="Male")
  <p><i class="fa fa-male" aria-hidden="true"></i> {{$user->gender}}</p>
  @else
  <p><i class="fa fa-female" aria-hidden="true"></i> {{$user->gender}}</p>
  @endif
  <p><small><i class="fa fa-envelope" aria-hidden="true"></i> {{$user->email}}</small></p>
  <p><small><i class="fa fa-phone" aria-hidden="true"></i> {{$user->phone}}</small></p>
  <p><small><i class="fa fa-map-marker" aria-hidden="true"></i> {{$user->address}}</small></p>
  <p><small><i class="fa fa-circle" aria-hidden="true"></i> {{$user->status}}</small></p>


  <div style="margin: 24px 0;">
    <a href="#" class="a-profile"><i class="fa fa-dribbble"></i></a> 
    <a href="#" class="a-profile"><i class="fa fa-twitter"></i></a>  
    <a href="#" class="a-profile"><i class="fa fa-linkedin"></i></a>  
    <a href="#" class="a-profile"><i class="fa fa-facebook"></i></a> 
  </div>
  
  <a href="{{route('admin.editprofile',$user->uid)}}" class="button-profile text-white">Edit</a>
</div>

@endsection
  