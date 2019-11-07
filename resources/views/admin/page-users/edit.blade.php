@extends('admin.layout.index')
@section('content')
<div class="card">
    <div class="card-header">
     Edit User
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
                <form method="POST" action="admin/users/edit/{{$user->id}}">
                        @csrf
                        <div class="form-group">
                          <label for="username"><b>User Name</b></label>
                          <input type="text" class="form-control" value="{{$user->name }}"  name="username"  placeholder="enter UserName">
                          <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="email"><b>Email</b></label>
                            <input type="email" class="form-control" readonly=""  value="{{ $user->email }}" name="email"  placeholder="enter Email">
                          
                        </div>
                        <div>                           
                            <input type="checkbox" name="changePassword" id="changePassword">
                            <label> <b>Change Password</b> </label>
                        </div>
                        <div class="form-group changePassword" >
                            <label for="password"><b>New Password</b></label>
                            <input type="password" class="form-control"  name="password"  placeholder="your password...">                                 
                        </div>
                        <div class="form-group changePassword" >
                                <label for="confirmpassword"><b>Confirm Password</b></label>
                                <input type="password" class="form-control"  name="confirmpassword"  placeholder="confirm password...">                                 
                        </div>
                        <div><b>User rights </b></div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="quyen" 
                            @if ($user->level ==0)
                                {{'checked'}}
                            @endif value="0">
                            <label class="form-check-label" for="inlineRadio1">Normal</label>
                        </div>
                        <div class="form-check form-check-inline" style="margin-bottom:50px">
                            <input class="form-check-input" type="radio" name="quyen"
                                @if ($user->level ==1)
                                {{'checked'}}
                                @endif value="1">      
                            <label class="form-check-label" for="inlineRadio2">admin</label>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                   
                   
          </div>
        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
      </blockquote>
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