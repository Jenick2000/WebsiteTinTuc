@extends('layout.index')
@section('title')
	{{'Edit Account'}}
@endsection
@section('content')
<div class="container">
<div class="card" style="margin-top:100px;margin-bottom:100px">
    <div class="card-header">
    <strong> Edit Account </strong>
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
                @if (session('updated'))
                <div class="alert alert-success" style="margin-top: 25px;">
                    {{session('updated')}}
                </div>
                @endif    
                <form method="POST" action="/user">
                        @csrf
                        <div class="form-group">
                          <label for="username">User Name</label>
                          <input type="text" class="form-control" value="{{$user->name }}" required name="username"  placeholder="enter UserName">
                          <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" required  value="{{ $user->email }}" name="email"  placeholder="enter Email">
                          
                        </div>
                        <div>                           
                            <input type="checkbox" name="changePassword" id="changePassword">
                            <label> Change Password </label>
                        </div>
                        <div class="form-group changePassword" >
                            <label for="password">New Password</label>
                            <input type="password" class="form-control"  name="password"  placeholder="your password...">                                 
                        </div>
                        <div class="form-group changePassword" >
                                <label for="confirmpassword">Confirm Password</label>
                                <input type="password" class="form-control"  name="confirmpassword"  placeholder="confirm password...">                                 
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                  
                   
          </div>
        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
      </blockquote>
    </div>
</div>
</div>
@endsection
@section('script')
   <script>
        $(document).ready(function(){
            $('.changePassword').hide();
            $('#changePassword').change(function(){
                var checked =  $(this).is(':checked');
                if(checked==true){
                    $('.changePassword').show();
                }else{
                    $('.changePassword').hide();
                }
            })
          
        })
   </script>
    
@endsection