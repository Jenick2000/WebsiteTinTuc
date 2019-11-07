@extends('admin.layout.index')
@section('content')
<div class="card">
    <div class="card-header">
     Loại Tin
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
          <div>
                <form method="POST" action="admin/loaitin/add">
                        @csrf
                        <div class="form-group">
                          <label for="tentheloai">Tên Loại Tin</label>
                          <input type="text" class="form-control"  name="tenloaitin" required placeholder="Nhập tên loại tin">
                          <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Chọn thể loại</label>
                            <select class="form-control" name="theloai" id="exampleFormControlSelect1">
                                @foreach ($theloai as $item)
                            <option value="{{$item->id}}">{{$item->Ten}}</option>
                                @endforeach
                              
                              
                            </select>
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger" style="margin-top: 25px;">
                            <ul style="list-style-type: none">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('thanhcong'))
                    <div class="alert alert-success" style="margin-top: 25px;">
                        {{session('thanhcong')}}
                    </div>
                    @endif
          </div>
        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
      </blockquote>
    </div>
</div>
@endsection