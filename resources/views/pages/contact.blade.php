<!-- Content -->
@extends('layout.index')
@section('title')
    Contact US
@endsection
@section('content')
<!-- Breadcrumb -->
<div class="container">
    <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="index.html" class="breadcrumb-item f1-s-3 cl9">
                Home 
            </a>

            <span class="breadcrumb-item f1-s-3 cl9">
                Contact Us
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

<!-- Page heading -->
<div class="container p-t-4 p-b-40">
    <h2 class="f1-l-1 cl2">
        Contact Us
    </h2>
</div>
<section class="bg0 p-b-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-8 p-b-80">
                <div class="p-r-10 p-r-0-sr991">
                    <form>
                        <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="name" placeholder="Name*">

                        <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="email" placeholder="Email*">

                        <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="website" placeholder="Website">

                        <textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="msg" placeholder="Your Message"></textarea>

                        <button class="size-a-20 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-20">
                            Send
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-md-5 col-lg-4 p-b-80">
                <div class="p-l-10 p-rl-0-sr991">
                    <!-- Popular Posts -->
                    <div>
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Popular Post
                            </h3>
                        </div>

                        <?php
							$popularPost = $TinTuc->sortByDesc('created_at')->where('NoiBat',1)->where('SoLuotXem','>',100)->take(3);
							?>
							<ul class="p-t-35">
								@foreach ($popularPost as $item)
								<li class="flex-wr-sb-s p-b-30">
								<a href="news-detail/{{$item->id}}/{{$item->TieuDeKhongDau}}.html" class="size-w-10 wrap-pic-w hov1 trans-03">
								<img src="upload/tintuc/{{$item->Hinh}}" alt="IMG">
										</a>
	
										<div class="size-w-11">
											<h6 class="p-b-4">
												<a href="news-detail/{{$item->id}}/{{$item->TieuDeKhongDau}}.html" class="f1-s-5 cl3 hov-cl10 trans-03">
													{{$item->TieuDe}}
												</a>
											</h6>
	
											<span class="cl8 txt-center p-b-24">
											<a href="type-news/{{$item->loaitin->id}}/{{$item->loaitin->TenKhongDau}}/.html" class="f1-s-6 cl8 hov-cl10 trans-03">
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection