@extends('layout.index')
@section('title')
	{{$tintuc->TieuDe}}
@endsection
@section('content')
    <!-- Breadcrumb -->
	<div class="container">
		<div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="index.html" class="breadcrumb-item f1-s-3 cl9">
					Home 
				</a>

            <a href="type-news/{{$tintuc->loaitin->id}}/{{$tintuc->loaitin->TenKhongDau}}.html" class="breadcrumb-item f1-s-3 cl9">
					{{$tintuc->loaitin->Ten}} 
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
                    {{$tintuc->TieuDe}}
				</span>
			</div>

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
					<form action="/search" method="GET">
						@csrf
						<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45 box-search" type="text" name="search" placeholder="Search">
						<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03" type="submit">
							<i class="zmdi zmdi-search"></i>
						</button>
					</form>
			</div>
		</div>
	</div>

	<!-- Content -->
	<section class="bg0 p-b-140 p-t-10">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-30">
					<div class="p-r-10 p-r-0-sr991">
						<!-- Blog Detail -->
						<div class="p-b-70">
							<a href="type-news/{{$tintuc->loaitin->id}}/{{$tintuc->loaitin->TenKhongDau}}.html" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
								{{$tintuc->loaitin->Ten}}
							</a>

							<h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
								{{$tintuc->TieuDe}}
							</h3>
							
							<div class="flex-wr-s-s p-b-40">
								<span class="f1-s-3 cl8 m-r-15">
									<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
										by John Alvarado
									</a>

									<span class="m-rl-3">-</span>

									<span>
										{{$tintuc->created_at->toFormattedDateString()}}
									</span>
								</span>

								<span class="f1-s-3 cl8 m-r-15">
									{{$tintuc->SoLuotXem}} Views
								</span>

							<a href="news-detail/{{$tintuc->id}}/{{$tintuc->TieuDeKhongDau}}.html/#comments" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
									{{count($tintuc->comment)}} Comment
								</a>
							</div>

							<div class="wrap-pic-max-w p-b-30">
                            <img src="upload/tintuc/{{$tintuc->Hinh}}" alt="IMG">
							</div>


							<div class="noidung">
									{!!$tintuc->NoiDung!!}
							</div>	
						

							<!-- Tag -->
							<div class="flex-s-s p-t-12 p-b-15">
								<span class="f1-s-12 cl5 m-r-8">
									Tags:
								</span>
								
								<div class="flex-wr-s-s size-w-0">
                                <a href="/category/{{$tintuc->loaitin->theloai->id}}" class="f1-s-12 cl8 hov-link1 m-r-15">
										{{$tintuc->loaitin->theloai->Ten}}
									</a>

                                <a href="/type-news/{{$tintuc->loaitin->id}}/{{$tintuc->loaitin->Ten}}.html" class="f1-s-12 cl8 hov-link1 m-r-15">
										{{$tintuc->loaitin->Ten}}
									</a>
								</div>
							</div>

							<!-- Share -->
							<div class="flex-s-s">
								<span class="f1-s-12 cl5 p-t-1 m-r-15">
									Share:
								</span>
								
								<div class="flex-wr-s-s size-w-0">
									<a href="#" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-facebook-f m-r-7"></i>
										Facebook
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-twitter m-r-7"></i>
										Twitter
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-google-plus-g m-r-7"></i>
										Google+
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-pinterest-p m-r-7"></i>
										Pinterest
									</a>
								</div>
							</div>
						</div>

						<!-- Leave a comment -->
						<div>
							<h4 class="f1-l-4 cl3 p-b-12">
								Leave a Comment
							</h4>

							<p class="f1-s-13 cl8 p-b-40">
								Your email address will not be published. Required fields are marked *
							</p>

							<form action="comment/post/{{$tintuc->id}}" method="POST">
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
								<textarea  required class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="msg" placeholder="Comment..."></textarea>
								@csrf
								<!--<input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="name" placeholder="Name*">

								<input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="email" placeholder="Email*">

								<input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="website" placeholder="Website">-->

								<button 
								@if (!Auth::check())
								data-toggle="modal" data-target="#myModal" type="button"
								@else 
								 type="submit"
								@endif
								 class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
									Post Comment
								</button>
							</form>
						</div>
						
					</div>
					<!-- Modal -->
					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog">
						
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Log in</h4>
							</div>
							<div class="modal-body">
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
								  <form action="login" method="POST">
									@csrf
									<div class="form-group">
									  <div class="form-label-group">
										<input type="email" id="inputEmail" value="{{ old('email') }}"name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
										<label for="inputEmail">Email address</label>
									  </div>
									</div>
									<div class="form-group">
									  <div class="form-label-group">
										<input type="password"name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
										<label for="inputPassword">Password</label>
									  </div>
									</div>
									<div class="form-group">
									  <div class="checkbox">
										<label>
										  <input type="checkbox" value="remember-me">
										  Remember Password
										</label>
									  </div>
									</div>
									<button class="btn btn-primary btn-block" type="submit" >Login</button>
								  </form>
							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
						
						</div>
					</div>

					<!-- list comments -->
					@if (count($tintuc->comment) > 0)
					
					<div class="row">
						<div class="col-md-8">
						  <h2 class="" id="comments"style="font-size: 36px;margin:25px;color:black">Comments</h2>
							<section class="comment-list">
							  <!-- First Comment -->
							  @foreach ($tintuc->comment as $item)
							  <article class="row">	
								<div class="col-md-10 col-sm-10">
								  <div class="panel panel-default arrow left">
									<div class="panel-body">
									  <header class="text-left">
									  <div class="comment-user" style="color:black"><i class="fa fa-user"></i> {{$item->user->name}}</div>
									  <time class="comment-date"><i class="fa fa-clock-o"></i> {{$item->created_at->toFormattedDateString()}}</time>
									  </header>
									  <div class="comment-post">
										<p>
											{{$item->NoiDung}}
										</p>
									  </div>
									  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
									</div>
								  </div>
								</div>
							  </article>
							  @endforeach
							  
							  
							</section>
						</div>
					</div>
					@endif
				</div>
				
				<!-- Sidebar -->
				<div class="col-md-10 col-lg-4 p-b-30">
					<div class="p-l-10 p-rl-0-sr991 p-t-70">						
						<!-- Category -->
						<div class="p-b-60">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Category
								</h3>
							</div>

							<ul class="p-t-35">
								
                                @foreach ($theloai as $item)
                                <li class="how-bor3 p-rl-4">
                                        <a href="/category/{{$item->id}}" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                                            {{$item->Ten}}
                                        </a>
                                 </li>
                               @endforeach
							</ul>
						</div>

						<!-- Archive -->
						<div class="p-b-37">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Archive
								</h3>
							</div>

							<ul class="p-t-32">
								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											July 2018
										</span>

										<span>
											(9)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											June 2018
										</span>

										<span>
											(39)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											May 2018
										</span>

										<span>
											(29)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											April  2018
										</span>

										<span>
											(35)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											March 2018
										</span>

										<span>
											(22)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											February 2018
										</span>

										<span>
											(32)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											January 2018
										</span>

										<span>
											(21)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											December 2017
										</span>

										<span>
											(26)
										</span>
									</a>
								</li>
							</ul>
						</div>

						<!-- Popular Posts -->
						<div class="p-b-30">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Popular Post
								</h3>
							</div>
							<?php 
								$PopularPost = $TinTuc->where('NoiBat',1)->where('id','!=',$tintuc->id)->where('SoLuotXem','>',40)->sortByDesc('created_at')->take(4);
							?>
							<ul class="p-t-35">
								@foreach ($PopularPost as $item)
								<li class="flex-wr-sb-s p-b-30">
								<a href="/news-detail/{{$item->id}}/{{$item->TieuDeKhongDau}}.html" class="size-w-10 wrap-pic-w hov1 trans-03">
										<img src="upload/tintuc/{{$item->Hinh}}" alt="IMG">
										</a>
	
										<div class="size-w-11">
											<h6 class="p-b-4">
												<a href="/news-detail/{{$item->id}}/{{$item->TieuDeKhongDau}}.html" class="f1-s-5 cl3 hov-cl10 trans-03">
													{{$item->TieuDe}}
												</a>
											</h6>
	
											<span class="cl8 txt-center p-b-24">
											<a href="/type-news/{{$item->loaitin->id}}/{{$item->loaitin->TenKhongDau}}.html" class="f1-s-6 cl8 hov-cl10 trans-03">
													{{$item->loaitin->Ten}}
												</a>
	
												<span class="f1-s-3 m-rl-3">
													-
												</span>
	
												<span class="f1-s-3">
													{{$item->created_at->toFormattedDateString()}}
												</span>
											</span>
										</div>
									</li>
								@endforeach
								
							</ul>
						</div>

						<!-- Tag -->
						<div>
							<div class="how2 how2-cl4 flex-s-c m-b-30">
								<h3 class="f1-m-2 cl3 tab01-title">
									Tags
								</h3>
							</div>

							<div class="flex-wr-s-s m-rl--5">
                                @foreach ($LoaiTin as $item)
                                <a href="/type-news/{{$item->id}}/{{$item->TenKhongDau}}.html" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                        {{$item->Ten}}
                                </a> 
                                @endforeach  
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> 
	<input type="hidden" id="idTinTuc" value="{{$tintuc->id}}">
@endsection
@section('script')
<script>
	$(document).ready(()=>{
		var idTinTuc = $('#idTinTuc').val();
		$.get('tintuc/visit-count/'+idTinTuc, function(data){console.log(data)});
       
	});
</script>
@endsection