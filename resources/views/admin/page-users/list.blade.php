@extends('admin.layout.index')
@section('content')
<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
    Danh sách Comment </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Level</th>
                    <th>Email </th>                  
                    <th>Created_at</th>      
                    <th>Edit</th>            
                    <th>Delete</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Level</th>
                    <th>Email </th>                  
                    <th>Created_at</th>      
                    <th>Edit</th>            
                    <th>Delete</th>
            </tr>
          </tfoot>
          <tbody>
                @foreach ($users as $user)
                    <tr>
                    <td> {{$user->id}}</td>
                    <td> {{$user->name}} </td>                  
                    <td> 
                        @if ($user->level==1)
                           {{'Admin'}} 
                           @else
                           {{'normal'}}
                        @endif
                    </td> 
                    <td> {{$user->email}}</td>                    
                    <td> {{$user->created_at}}</td>   
                    <td><a href="admin/users/edit/{{$user->id}}"><i class="fas fa-eye-dropper" style="color:green"></i></a></td>                                    
                  <td><a onclick="return confirm('Are you sure delete {{$user->name}}?')" href="admin/users/delete/{{$user->id}}"><i class="far fa-trash-alt" style="color:red"></i></a></td>
                    </tr>
                @endforeach       
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection