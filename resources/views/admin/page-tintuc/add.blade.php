@extends('admin.layout.index')
@section('content')
<div class="card">
    <div class="card-header">
     Tin Tức
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
        @if (session('loi'))
        <div class="alert alert-danger" style="margin-top: 25px;">
            {{session('loi')}}
        </div>
        @endif
      <blockquote class="blockquote mb-0">
          <div>
                <form method="POST" action="admin/tintuc/add" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Chọn thể loại</label>
                            <select class="form-control" name="theloai" id="theloai">
                                @foreach ($theloai as $item)
                                    <option value="{{$item->id}}">{{$item->Ten}}</option>
                                @endforeach
                            
                            </select>
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Chọn loại tin</label>
                            <select class="form-control" name="loaitin" id="loaitin">
                               <!-- data ajax here-->                            
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="tentheloai">Tiêu Đề</label>
                          <input type="text" class="form-control"  name="tieude" required placeholder="Nhập tên loại tin">
                          <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                                <label for="tomtat">Tóm Tắt</label><br>
                                <textarea name="tomtat" rows="5" cols="35" style="width:100%" placeholder="Tóm tắt..." class=""></textarea>
                        </div>
                        <div class="form-group">
                                <label for="noidung">Nội Dung</label>
                                <textarea  name="noidung" class="editorNoiDung" ></textarea>
                        </div>
                        <div class="form-group">
                                <label for="tentheloai">Hình Ảnh</label><br>
                                <input name="hinh" class="" type="file">
                        </div>
                        <div>Nổi Bật </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="noibat" checked value="1">
                            <label class="form-check-label" for="inlineRadio1">Có</label>
                        </div>
                        <div class="form-check form-check-inline" style="margin-bottom:50px">
                            <input class="form-check-input" type="radio" name="noibat"  value="0">
                            <label class="form-check-label" for="inlineRadio2">Không</label>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Thêm Tin</button>
                        <input type="reset" class="btn btn-outline-secondary"id="reset" value = "Reset" />
                       

                    </form>
 
          </div>
        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
      </blockquote>
    </div>
</div>
@endsection


<!--script -->
@section('script')
    <script>
        $(document).ready(function(){
            $.get('admin/ajax/loaitin/'+$('#theloai').val(), function(data){
                $('#loaitin').html(data);
            });
            $('#theloai').change(function(){
                var idTheLoai = $(this).val();
                $.get('admin/ajax/loaitin/'+idTheLoai, function(data){
                    $('#loaitin').html(data);
                });
            });
            //khi reset form thi select se duoc thay doi theo
            $("select").closest("form").on("reset",function(ev){
                var targetJQForm = $(ev.target);
                setTimeout((function(){
                    this.find("select").trigger("change");
                }).bind(targetJQForm),0);           
            });
           
          
            //ckeditor
           
            CKEDITOR.replace('noidung', {
                filebrowserUploadUrl: '../../admin_assets/ckeditor/ck_upload.php',
                filebrowserUploadMethod: 'form'
            });
          
        });
    </script>
@endsection