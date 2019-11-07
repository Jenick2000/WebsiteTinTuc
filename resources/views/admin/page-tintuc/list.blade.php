@extends('admin.layout.index')
@section('content')
<div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Danh sách Tin Tức 
          
         <a href="/admin/tintuc/add" style="float:right" class="btn btn-outline-success"><i class="fas fa-plus"></i></a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                        <th>ID</th>
                        <th>Tiêu Đề</th>
                        <th>Tóm Tắt</th>
                        <th>Nổi Bật</th>
                        <th>Lượt Xem</th>
                        <th>Loại tin</th>
                        <th>Thể Loại</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Edit</th>
                        <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tiêu Đề</th>
                    <th>Tóm Tắt</th>
                    <th>Nổi Bật</th>
                    <th>Lượt Xem</th>
                    <th>Loại tin</th>
                    <th>Thể Loại</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>
                    @foreach ($tintuc as $item)
                        <tr>
                        <td> {{$item->id}}</td>
                        <td> {{$item->TieuDe}}
                        <p><img src="upload/tintuc/{{$item->Hinh}}" style="with:50px;height:50px"> </p>
                        </td>
                        <td> {!!Str::words($item->TomTat,15,'...')!!}</td>
                        <td> 
                          @if ($item->NoiBat==1)
                              yes
                          @else 
                          No
                          @endif
                        </td>
                        <td> {{$item->SoLuotXem}}</td>
                        <td> {{$item->loaitin->Ten}}</td>
                        <td> {{$item->loaitin->theloai->Ten}}</td>
                        <td> {{$item->created_at}}</td>
                        <td> {{$item->updated_at}}</td>
                        <td><a href="admin/tintuc/edit/{{$item->id}}"><i class="fas fa-eye-dropper" style="color:green"></i></a></td>
                        <td><a onclick="return confirm('Are you sure?')" href="admin/tintuc/delete/{{$item->id}}"><i class="far fa-trash-alt" style="color:red"></i></a></td>
                        </tr>
                    @endforeach       
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
@endsection