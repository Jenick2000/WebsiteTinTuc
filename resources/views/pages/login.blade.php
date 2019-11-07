@extends('layout.index')
@section('title')
	{{'Login'}}
@endsection
@section('content')
<div class="container">
        <div class="card card-login mx-auto mt-5">
          <div class="card-header">Login</div>
          <div class="card-body">
              @if ($errors->any())
              <div class="alert alert-danger" style="margin-top: 25px;">
              <b>error</b>
                  <ul style="list-style-type: none">
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                  </div>
              @endif
            <form action="login" method="POST">
              @csrf
              <div class="form-group">
                <div class="form-label-group">
                  <input type="email" id="inputEmail" value="{{ old('email') }}"name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                  <label for="inputEmail">Email address</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="password"name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="remember-me">
                    Remember Password
                  </label>
                </div>
              </div>
              <button class="btn btn-primary btn-block" type="submit" >Login</button>
            </form>
            <div class="text-center">
              <a class="d-block small mt-3" href="register.html">Register an Account</a>
              <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
            </div>
          </div>
        </div>
      </div>
@endsection