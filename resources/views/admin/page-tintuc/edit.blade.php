@extends('admin.layout.index')
@section('content')
<div class="card">
    <div class="card-header">
     <b>Tin Tức / </b> {{Str::words($tintuc->TieuDe,20,'...')}}
    </div>
    <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger" style="margin-top: 25px;">
                <b>ERROR </b>
                <ul style="list-style-type: none">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
      <blockquote class="blockquote mb-0">
          <div>
          <form method="POST" action="admin/tintuc/edit/{{$tintuc->id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect1"><b>Chọn thể loại</b></label>
                            <select class="form-control" name="theloai" id="theloai">
                                @foreach ($theloai as $item)
                                   @if ($item->id == $tintuc->loaitin->theloai->id)
                                   <option value="{{$item->id}}" selected>{{$item->Ten}}</option>
                                   @else
                                   <option value="{{$item->id}}">{{$item->Ten}}</option>
                                   @endif
                                   
                                @endforeach
                            
                            </select>                           
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1"><b>Chọn loại tin </b></label>
                            <select class="form-control" name="loaitin" id="loaitin">
                                    @foreach ($loaitin as $item)
                                    @if ($item->id == $tintuc->loaitin->id)
                                    <option value="{{$item->id}}" selected>{{$item->Ten}}</option>
                                    @else
                                    <option value="{{$item->id}}">{{$item->Ten}}</option>
                                    @endif
                                    @endforeach
                               <!-- data ajax here-->                            
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="tentheloai"><b>Tiêu Đề</b></label>
                        <input type="text" class="form-control" value="{{$tintuc->TieuDe}}"  name="tieude" required placeholder="Nhập tên loại tin">
                          <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="tomtat">Tóm Tắt</label><br>
                            <textarea name="tomtat" rows="5" cols="35" style="width:100%" placeholder="Tóm tắt...">{{$tintuc->TomTat}}</textarea>
                        </div>
                        <div class="form-group">
                                <label for="noidung">Nội Dung</label>
                        <textarea  name="noidung" class="editorNoiDung" >{{$tintuc->NoiDung}}</textarea>
                        </div>
                        <div class="form-group">
                                <label for="tentheloai"> <b>Hình Ảnh</b></label><br>
                                <img class="hinh" src="upload/tintuc/{{$tintuc->Hinh}}" style="width:250px;height:200px"><br>           
                                <input name="hinh" id="hinh" type="file">
                        </div>
                        <div> <b>Nổi Bật</b> </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="noibat" 
                            @if ($tintuc->NoiBat==1)
                                {{'checked'}}
                            @endif  value="1">
                            <label class="form-check-label" for="inlineRadio1">Có</label>
                        </div>
                        <div class="form-check form-check-inline" style="margin-bottom:50px">
                            <input class="form-check-input" type="radio" name="noibat" 
                            @if ($tintuc->NoiBat==0)
                                {{'checked'}}
                            @endif
                             value="0">
                            <label class="form-check-label" for="inlineRadio2">Không</label>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <input type="reset" class="btn btn-outline-secondary"id="reset" value = "Reset" />
                       

                    </form>
 
          </div>
        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
      </blockquote>
    </div>
</div>

<!-- danh sach comment -->
<h3 style="margin:20px">Comment</h3>
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
                    <th>User</th>
                    <th>Content</th>                  
                    <th>Created_at</th>                  
                    <th>Delete</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                
                <th>ID</th>
                <th>User</th>
                <th>Content</th>                  
                <th>Created_at</th>                  
                <th>Delete</th>
            </tr>
          </tfoot>
          <tbody>
                @foreach ($tintuc->comment as $item)
                    <tr>
                    <td> {{$item->id}}</td>
                    <td> {{$item->user->name}} </td>                  
                    <td> {{$item->NoiDung}}</td>                    
                    <td> {{$item->created_at}}</td>                   
                    <td><a onclick="return confirm('Are you sure?')" href="admin/comment/delete/{{$item->id}}"><i class="far fa-trash-alt" style="color:red"></i></a></td>
                    </tr>
                @endforeach       
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection


<!--script -->
@section('script')
    <script>
        $(document).ready(function(){
            
            $('#theloai').change(function(){
                var idTheLoai = $(this).val();
                $.get('admin/ajax/loaitin/'+idTheLoai, function(data){
                    $('#loaitin').html(data);
                });
            });
            //thay doi hinh
            // $('#hinh').change(function(){
            //     var hinh = $(this).val();
            //     $('.hinh').attr('src',hinh);
            // })
            //khi reset form thi select se duoc thay doi theo
            $("select").closest("form").on("reset",function(ev){
                var targetJQForm = $(ev.target);
                setTimeout((function(){
                    this.find("select").trigger("change");
                }).bind(targetJQForm),0);           
            });
           
          
            //ckeditor
           
            CKEDITOR.replace('noidung', {
                filebrowserUploadUrl: '../../../admin_assets/ckeditor/ck_upload.php',
                filebrowserUploadMethod: 'form'
            });
           
        });
    </script>
@endsection