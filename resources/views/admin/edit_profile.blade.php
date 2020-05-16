@extends('layout/admin')


@section('title')
Edit Profile
@endsection
@section('content')


<form method="post">
@csrf
  <div class="form-group row">
    <label for="uname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-4">
    <input type="text" class="form-control form-control-sm" name="uname" value="{{$user->uname}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-4">
    <input type="email" class="form-control form-control-sm" name="email" value="{{$user->email}}">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
  </div>

  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-4">
    <input type="password" class="form-control form-control-sm" name="password" value="{{$user->password}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
    <div class="col-4">
    <input type="password" class="form-control form-control-sm" name="password_confirmation" placeholder="Match with your password" value="">
    </div>
  </div>

  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
      <div class="col-sm-10">
      @if($user->gender=="Male")
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
          <label class="form-check-label" for="Male">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
          <label class="form-check-label" for="Female">
            Female
          </label>
        </div>
        @else
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
          <label class="form-check-label" for="Male">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="female" value="Female" checked>
          <label class="form-check-label" for="Female">
            Female
          </label>
        </div>
        @endif
      </div>
    </div>
  </fieldset>

  <div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
    <div class="col-4">
    <input type="phone" class="form-control form-control-sm" name="phone" value="{{$user->phone}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="address" class="col-sm-2 col-form-label">Address</label>
    <div class="col-4">
    <textarea  class="form-control form-control-sm" name="address">{{$user->address}}</textarea >
    </div>
  </div>
  <button type="submit" class="btn btn-primary"> Update</button>

</form>
@foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
@endsection
  