@extends('admin.layout.index')
@section('content')
<div class="card">
        <div class="card-header">
         sữa Loại Tin
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
              <div>
              <form method="POST" action="admin/loaitin/edit/{{$loaitin->id}}">
                            @csrf
                            <div class="form-group">
                              <label for="tentheloai">Tên Loại Tin</label>
                            <input type="text" class="form-control" value="{{$loaitin->Ten}}"  name="tenloaitin" required placeholder="Nhập tên loại tin">
                              <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Chọn thể loại</label>
                                <select class="form-control" name="theloai" id="exampleFormControlSelect1">
                                <option value="{{$loaitin->theloai->id}}" selected="selected">{{$loaitin->theloai->Ten}}</option>
                                    @foreach ($theloai as $item)
                                        @if ($item->id != $loaitin->theloai->id)
                                        <option value="{{$item->id}}">{{$item->Ten}}</option>
                                        @endif              
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
                        @if (session('updated'))
                        <div class="alert alert-success" style="margin-top: 25px;">
                            {{session('updated')}}
                        </div>
                        @endif
              </div>
            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
          </blockquote>
        </div>
    </div>
@endsection