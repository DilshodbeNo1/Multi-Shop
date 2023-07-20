@extends('layouts.web')

@section('content')

<div class="row">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
      <div class="card card-primary">
        <div class="card-header">
          <h4>Register</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('client.register.save') }}" method="POST">
            @csrf
            <div class="row">
              <div class="form-group col-12">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name">
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" type="email" class="form-control" name="email">
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-6">
                <label for="password" class="d-block">Password</label>
                <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                <div id="pwindicator" class="pwindicator">
                  <div class="bar"></div>
                  <div class="label"></div>
                </div>
              </div>
              <div class="form-group col-6">
                <label for="password2" class="d-block">Password Confirmation</label>
                <input id="password2" type="password" class="form-control" name="password_confirmation">
              </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Register" type="submit" class="btn btn-primary btn-lg btn-block">
            </div>
          </form>
          @if($errors->any())
            @foreach ($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach            
            @endif
        </div>
        <div class="mb-4 text-muted text-center">
          Already Registered? <a href="{{ route('client.login') }}">Login</a>
        </div>
      </div>
    </div>
  </div>

  @endsection