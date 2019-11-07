@extends('layout.index')
@section('title')
   Search
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
                Search
            </span>

            <span class="breadcrumb-item f1-s-3 cl9">
               {{$search}}
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
<section class="bg0 p-b-140 p-t-10">
    <div class="container">
            <h3 style="font-size:35px;"> Result for  " <span style="color:green">{{$search}} </span> " </h3>
            <span > about {{$count_result}} result </span>
            <h1 style="margin-bottom:50px"> </h1>
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-30">
                
                <div class="p-r-10 p-r-0-sr991">
                        <?php 
                            function textSearch($search,$text){
                                return  str_replace($search,"<span style='color:green'> $search </span>",$text);
                            }
                        ?>
                        <div class="m-t--40 p-b-40" >
                                @foreach ($Result as $item)
                                <!-- Item post -->
                                <div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2">
                                <a href="news-detail/{{$item->id}}/{{$item->TieuDeKhongDau}}.html" class="size-w-8 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25">
                                    <img src="upload/tintuc/{{$item->Hinh}}" alt="IMG">
                                    </a>
    
                                    <div class="size-w-9 w-full-sr575 m-b-25">
                                        <h5 class="p-b-12">
                                            <a href="news-detail/{{$item->id}}/{{$item->TieuDeKhongDau}}.html" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
                                                {!! textSearch($search,$item->TieuDe) !!}
                                            </a>
                                        </h5>
    
                                        <div class="cl8 p-b-18">
                                            <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                {{$item->loaitin->Ten}}
                                            </a>
    
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
    
                                            <span class="f1-s-3">
                                                {{$item->created_at->toFormattedDateString()}}
                                            </span>
                                        </div>
    
                                        <p class="f1-s-1 cl6 p-b-24" style="padding-bottom:inherit;">
                                            {!! textSearch($search , $item->TomTat) !!}
                                        </p>	
    
                                        <a href="blog-detail-02.html" class="f1-s-1 cl9 hov-cl10 trans-03">
                                            Read More
                                            <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach		
                        </div>
                        {{ $Result->links() }}
                </div>
                
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
                            $PopularPost = $TinTuc->where('NoiBat',1)->where('SoLuotXem','>',40)->sortByDesc('created_at')->take(4);
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
@endsection