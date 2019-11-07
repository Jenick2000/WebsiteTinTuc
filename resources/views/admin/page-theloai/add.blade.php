@extends('admin.layout.index')
@section('content')
  <div class="card">
        <div class="card-header">
          Thể Loại
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
              <div>
                    <form method="POST" action="admin/theloai/add">
                            @csrf
                            <div class="form-group">
                              <label for="tentheloai">Tên thể loại</label>
                              <input type="text" class="form-control" id="tentheloai" name="tentheloai" required placeholder="Nhập tên thể loại">
                              <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
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