@extends('layout.index')
@section('title')
	{{$loaitin->Ten}}
@endsection
@section('content')
    
	<!-- Breadcrumb -->
	<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="/" class="breadcrumb-item f1-s-3 cl9">
					Home 
				</a>

			<a href="/type-news/{{$loaitin->id}}/{{$loaitin->TenKhongDau}}.html" class="breadcrumb-item f1-s-3 cl9">
					Type News
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
					{{$loaitin->Ten}}
				</span>
			</div>

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<form action="/search" method="POST">
					@csrf
					<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45 box-search" type="text" name="search" placeholder="Search">
					<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03" type="submit">
						<i class="zmdi zmdi-search"></i>
					</button>
				</form>
			</div>
		</div>
	</div>

	<!-- Page heading -->
	<div class="container p-t-4 p-b-40">
		<h2 class="f1-l-1 cl2">
			{{$loaitin->Ten}}
		</h2>
	</div>
		
	<!-- Post -->
	<section class="bg0 p-t-70 p-b-55">
		<div class="container">
			<div class="row justify-content-center">

				<div class="col-md-10 col-lg-8 p-b-80">
						<div class="loading">
						
										<span class="">Loading...</span>
												
						</div>
						<div class="p-r-10 p-r-0-sr991" >
								
								<div class="m-t--40 p-b-40" id="ListPost">
									@foreach ($tintuc as $item)
									<!-- Item post -->
									<div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2">
									<a href="news-detail/{{$item->id}}/{{$item->TieuDeKhongDau}}.html" class="size-w-8 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25">
										<img src="upload/tintuc/{{$item->Hinh}}" alt="IMG">
										</a>
		
										<div class="size-w-9 w-full-sr575 m-b-25">
											<h5 class="p-b-12">
												<a href="news-detail/{{$item->id}}/{{$item->TieuDeKhongDau}}.html" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
													{{$item->TieuDe}}
												</a>
											</h5>
		
											<div class="cl8 p-b-18">
												<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
													by John Alvarado
												</a>
		
												<span class="f1-s-3 m-rl-3">
													-
												</span>
		
												<span class="f1-s-3">
													{{$item->created_at->toFormattedDateString()}}
												</span>
											</div>
		
											<p class="f1-s-1 cl6 p-b-24" style="padding-bottom:inherit;">
												{!!$item->TomTat !!}
											</p>	
		
											<a href="blog-detail-02.html" class="f1-s-1 cl9 hov-cl10 trans-03">
												Read More
												<i class="m-l-2 fa fa-long-arrow-alt-right"></i>
											</a>
										</div>
									</div>
									@endforeach		
								</div>
								@if ($all_tintuc > 10)
									<a id="loadmore_tintuc" style="cursor: pointer" class="flex-c-c size-a-13 bo-all-1 bocl11 f1-m-6 cl6 hov-btn1 trans-03">
										Load More
									</a>
								@endif
								
						</div>

				</div>

				<div class="col-md-10 col-lg-4 p-b-80">
					<div class="p-l-10 p-rl-0-sr991">							
						<!-- Subscribe -->
						<div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-50">
							<h5 class="f1-m-5 cl0 p-b-10">
								Subscribe
							</h5>

							<p class="f1-s-1 cl0 p-b-25">
								Get all latest content delivered to your email a few times a month.
							</p>

							<form class="size-a-9 pos-relative">
								<input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email" placeholder="Email">

								<button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
									<i class="fa fa-arrow-right"></i>
								</button>
							</form>
						</div>

						<!-- Most Popular -->
						<div class="p-b-23">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Most Popular
								</h3>
							</div>
							<?php  
                            $mostPopular = $TinTuc->where('NoiBat',1)->where('SoLuotXem','>',20)->sortByDesc('created_at')->take(5);
                            $i = 1;
                        ?>
                        <ul class="p-t-35">
                            @foreach ($mostPopular as $item)
                            <li class="flex-wr-sb-s p-b-22">
                                    <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                        {{$i}}
                                    </div>
    
                                    <a href="/type-news/{{$item->id}}/{{$item->TieuDeKhongDau}}.html" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                       {{$item->TieuDe}}
                                    </a>
                                </li>
                                <?php $i++ ?>
                            @endforeach
                            

                        </ul>
						</div>

						<!--  -->
						<div class="flex-c-s p-b-50">
							<a href="#">
								<img class="max-w-full" src="images/banner-02.jpg" alt="IMG">
							</a>
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
<input type="hidden" name="idLoaiTin" id="hide_idLoaiTin" value="{{$loaitin->id}}">
<input type="hidden" id="all_tintuc" value="{{$all_tintuc}}">
@endsection
<!--script -->
@section('script')
<script>
$(document).ready(function(){
	$('.loading').hide();
	var i = 15;
	var idLoaitin = $('#hide_idLoaiTin').val();
	function load_data(){
		$.ajax({url: 'tintuc/loadmore/'+idLoaitin+'/'+i, success: function(result){
			$('#ListPost').html(result);
			$('.loading').hide();
			if($('#all_tintuc').val() <= i ){
				$('#loadmore_tintuc').hide();
			}
			i+=5;
    }});
	}
	$('#loadmore_tintuc').click(()=>{
		$('.loading').show();
		load_data();
	})
});
</script>
@endsection