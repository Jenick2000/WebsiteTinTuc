@extends('admin.layout.index')
@section('content')
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Danh sách Loại Tin</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>unsigned name</th>
              <th>Name Category</th>
              <th>created_at</th>
              <th>Updated_at</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>unsigned name</th>
                <th>Name Category</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
          </tfoot>
          <tbody>
                @foreach ($loaitin as $item)
                    <tr>
                    <td> {{$item->id}}</td>
                    <td> {{$item->Ten}}</td>
                    <td> {{$item->TenKhongDau}}</td>
                    <td> {{$item->theloai->Ten}}</td>
                    <td> {{$item->created_at}}</td>
                    <td> {{$item->updated_at}}</td>
                    <td><a href="admin/loaitin/edit/{{$item->id}}"><i class="fas fa-eye-dropper" style="color:green"></i></a></td>
                    <td><a onclick="return confirm('Are you sure?')" href="admin/loaitin/delete/{{$item->id}}"><i class="far fa-trash-alt" style="color:red"></i></a></td>
                    </tr>
                @endforeach       
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
@endsection