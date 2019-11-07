@extends('layout.index')
@section('content')
<div class="card" style="margin:150px">
        <div class="card-header">
         Sign Up
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
              <div>
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
                    <form method="POST" action="signup">
                            @csrf
                            <div class="form-group">
                              <label for="username">User Name</label>
                              <input type="text" class="form-control" value="{{ old('username') }}"  name="username" required placeholder="enter UserName">
                             
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" value="{{ old('email') }}" name="email" required placeholder="enter Email">
                                <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control"  name="password" required placeholder="your password...">                                 
                            </div>
                            <div class="form-group">
                                    <label for="confirmpassword">Confirm Password</label>
                                    <input type="password" class="form-control"  name="confirmpassword" required placeholder="confirm password...">                                 
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                       
                       
              </div>
            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
          </blockquote>
        </div>
</div>
@endsection