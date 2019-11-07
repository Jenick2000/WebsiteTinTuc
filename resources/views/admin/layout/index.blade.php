<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/png" href="http://media.designs.vn/public/media/media/picture/07-10-2014/hinh-8-0ba32.jpg"/>

  <title>Jenick'JK Admin - Dashboard</title>
  <base href="{{asset('')}}">
  <!-- Custom fonts for this template-->
  <link href="admin_assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="admin_assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="admin_assets/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  @include('admin.layout.header')

  <div id="wrapper">

    <!-- Sidebar -->
    @include('admin.layout.menu')

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
        <li class="breadcrumb-item active">
          @if (isset($Breadcrumbs))
          <a href="{{$url}}">{{$Breadcrumbs}}</a>
            @if(isset($breadcrumb))
              {{$breadcrumb}}
            @endif
            @if(isset($bread))
              / {{$bread}}
            @endif
          @endif          
        </li>
        </ol>

        <!-- content -->
        @yield('content')
        <!-- thong bao -->
          @if (session('thongbao'))
          <div class="toast" data-autohide="false">
            <div class="toast-header">
              <strong class="mr-auto text-primary">Jenick'JK Admin</strong>
              <small class="text-muted">vừa xong</small>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
            </div>
            <div class="toast-body">
              {{session('thongbao')}}
            </div>
          </div>                
          @endif
  
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="admin/logout/@if (Auth::user()){{Auth::user()->id}}@endif">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="admin_assets/vendor/jquery/jquery.min.js"></script>
  <script src="admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin_assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  
  <script src="admin_assets/vendor/datatables/jquery.dataTables.js"></script>
  <script src="admin_assets/vendor/datatables/dataTables.bootstrap4.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="admin_assets/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="admin_assets/js/demo/datatables-demo.js"></script>
  <!--editor -->
  
  <script src="admin_assets/ckeditor/ckeditor.js"></script>
  @yield('script')

</body>

</html>
