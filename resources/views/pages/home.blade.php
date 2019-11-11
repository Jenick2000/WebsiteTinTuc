
@extends('layout.index')
@section('title')
 Jenick'JK | Home
@endsection
@section('content')
    <!-- Headline -->
    @include('layout.headline')    
    <!-- Feature post -->
    <section class="bg0">
        <?php
            $FeaturePost = $TinTuc->sortByDesc('created_at')->where('NoiBat',1)->take(4);
            $firstFeature = $FeaturePost->shift();
            $secondsPost = $FeaturePost->shift();
        ?>
        <div class="container">
            <div class="row m-rl--1">
                <div class="col-md-6 p-rl-1 p-b-2">
                    @if (!empty($firstFeature))
                    <div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(upload/tintuc/{{$firstFeature['Hinh']}});">
                        <a href="news-detail/{{$firstFeature['id']}}/{{$firstFeature['TieuDeKhongDau']}}.html" class="dis-block how1-child1 trans-03"></a>

                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                        <a href="type-news/{{$firstFeature->loaitin->id}}/{{$firstFeature->loaitin->TenKhongDau}}.html" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    {{$firstFeature->loaitin->Ten}}
                            </a>

                            <h3 class="how1-child2 m-t-14 m-b-10">
                                <a href="news-detail/{{$firstFeature['id']}}/{{$firstFeature['TieuDeKhongDau']}}.html" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                   {{$firstFeature['TieuDe']}}
                                </a>
                            </h3>

                            <span class="how1-child2">
                                <span class="f1-s-4 cl11">
                                    Jack Sims
                                </span>

                                <span class="f1-s-3 cl11 m-rl-3">
                                    -
                                </span>

                                <span class="f1-s-3 cl11">
                                        {{$firstFeature['created_at']}}
                                </span>
                            </span>
                        </div>
                    </div>
                    @endif
                    
                </div>

                <div class="col-md-6 p-rl-1">
                    <div class="row m-rl--1">
                        <div class="col-12 p-rl-1 p-b-2">
                            @if (!empty($secondsPost))
                           <div class="bg-img1 size-a-4 how1 pos-relative" style="background-image: url(upload/tintuc/{{$secondsPost['Hinh']}});">
                            <a href="news-detail/{{$secondsPost['id']}}/{{$secondsPost['TieuDeKhongDau']}}.html" class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-24">
                                <a href="type-news/{{$secondsPost->loaitin->id}}/{{$secondsPost->loaitin->TenKhongDau}}.html" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                       {{$secondsPost->loaitin->Ten}}
                                    </a>

                                    <h3 class="how1-child2 m-t-14">
                                        <a href="news-detail/{{$secondsPost['id']}}/{{$secondsPost['TieuDeKhongDau']}}.html" class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                                            {{$secondsPost['TieuDe']}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            @endif
                        </div>
                        @foreach ($FeaturePost as $item)
                        <div class="col-sm-6 p-rl-1 p-b-2">
                                <div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(upload/tintuc/{{$item->Hinh}});">
                                    <a href="news-detail/{{$item->id}}/{{$item->TieuDeKhongDau}}.html" class="dis-block how1-child1 trans-03"></a>
    
                                    <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                    <a href="type-news/{{$item->loaitin->id}}/{{$item->loaitin->TenKhongDau}}.html" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                           {{$item->loaitin->Ten}}
                                        </a>
    
                                        <h3 class="how1-child2 m-t-14">
                                            <a href="news-detail/{{$item->id}}/{{$item->TieuDeKhongDau}}.html" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                                {{$item->TieuDe}}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                       

                       
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Post -->
    <section class="bg0 p-t-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="p-b-20">
                        <!-- The loai -->
                        <?php $i=1; ?>
                        @foreach ($theloai as $tl)
                        @if (count($tl->loaitin)>0)
                        
                        <div class="tab01 p-b-20">
                            <div class="tab01-head how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                <!-- Brand tab -->
                                <h3 class="f1-m-2 cl12 tab01-title">
                                    {{$tl->Ten}}
                                </h3>

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab{{$i}}-1" role="tab">All</a>
                                    </li>
                                    <?php $j=2;?>
                                    @foreach ($tl->loaitin as $lt)
                                    <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab{{$i}}-{{$j}}" role="tab">{{$lt->Ten}}</a>
                                    </li>
                                    <?php $j++;?>
                                    @endforeach
                                
                                    <li class="nav-item-more dropdown dis-none">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            
                                        </ul>
                                    </li>
                                </ul>

                                <!--  -->
                            <a href="/category/{{$tl->id}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    View all
                                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                </a>
                            </div>
                                

                            <!-- Tab panes -->
                            <div class="tab-content p-t-35">
                                <!-- - -->
                                <div class="tab-pane fade show active" id="tab{{$i}}-1" role="tabpanel">
                                        <div class="row">
                                            <?php 

                                            ?>
                                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                                <?php $demTin1=0;?>                                            
                                            
                                                @foreach ($tl->loaitin as $lt)
                                                @if ($demTin1 == 0)
                                                <?php
                                                    $tin1 =$lt->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(1);
                                                ?>
                                                <!-- Item post -->	
                                                @foreach ($tin1 as $t)
                                                <div class="m-b-30">
                                                <a href="news-detail/{{$t->id}}/{{$t->TieuDeKhongDau}}.html" class="wrap-pic-w hov1 trans-03">
                                                        <img src="upload/tintuc/{{$t->Hinh}}" alt="IMG">
                                                        </a>
        
                                                        <div class="p-t-20">
                                                            <h5 class="p-b-5">
                                                                <a href="news-detail/{{$t->id}}/{{$t->TieuDeKhongDau}}.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                                {{$t->TieuDe}}
                                                                </a>
                                                            </h5>
        
                                                            <span class="cl8">
                                                            <a href="type-news/{{$lt->id}}/{{$lt->TenKhongDau}}.html" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                                    {{$lt->Ten}}
                                                                </a>
        
                                                                <span class="f1-s-3 m-rl-3">
                                                                    -
                                                                </span>
        
                                                                <span class="f1-s-3">
                                                                    {{$t->created_at->toFormattedDateString()}}
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @endif
                                                <?php $demTin1++;?>
                                                @endforeach
                                                
                                            </div>

                                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                                <?php $dem=0; ?>
                                                @if ($dem <= 3)
                                                                                        
                                                @foreach ($tl->loaitin as $ltin)
                                                
                                                @if ($dem == 0)
                                                <?php $allTinTuc = $ltin->tintuc->where('NoiBat',1)->sortByDesc('created_at')->skip(1)->take(1) ?>
                                                @else
                                                <?php $allTinTuc = $ltin->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(1) ?>
                                                @endif
                                                    @foreach ($allTinTuc as $alt)
                                                        <!-- Item post -->	
                                                    <div class="flex-wr-sb-s m-b-30">
                                                        <a href="news-detail/{{$alt->id}}/{{$alt->TieuDeKhongDau}}.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                        <img src="upload/tintuc/{{$alt->Hinh}}" alt="IMG">
                                                        </a>
        
                                                        <div class="size-w-2">
                                                            <h5 class="p-b-5">
                                                                <a href="news-detail/{{$alt->id}}/{{$alt->TieuDeKhongDau}}.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                    {{$alt->TieuDe}}
                                                                </a>
                                                            </h5>
        
                                                            <span class="cl8">
                                                            <a href="type-news/{{$ltin->id}}/{{$ltin->TenKhongDau}}.html" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                    {{$ltin->Ten}}
                                                                </a>
        
                                                                <span class="f1-s-3 m-rl-3">
                                                                    -
                                                                </span>
        
                                                                <span class="f1-s-3">
                                                                {{$alt->created_at->toFormattedDateString()}}
                                                                </span>
                                                            </span>
                                                        </div>
                                                        </div>
                                                    @endforeach
                                                    <?php $dem++; ?>
                                                @endforeach
                                                @endif
                                                
                                            </div>
                                        </div>
                                </div>
                                
                                <!-- - -->
                                <?php $k=2;?>
                                @foreach ($tl->loaitin as $item)
                                    <?php
                                        $tintuc = $item->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(4);
                                        $firstTinTuc = $tintuc->shift();
                                        
                                    ?>
                                    <div class="tab-pane fade" id="tab{{$i}}-{{$k}}" role="tabpanel">
                                        <div class="row">
                                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                                <!-- Item post -->	
                                                @if (!empty($firstTinTuc))                                    
                                                <div class="m-b-30">
                                                    <a href="news-detail/{{$firstTinTuc['id']}}/{{$firstTinTuc['TieuDeKhongDau']}}.html" class="wrap-pic-w hov1 trans-03">
                                                    <img src="upload/tintuc/{{$firstTinTuc['Hinh']}}" alt="IMG">
                                                    </a>

                                                    <div class="p-t-20">
                                                        <h5 class="p-b-5">
                                                            <a href="news-detail/{{$firstTinTuc['id']}}/{{$firstTinTuc['TieuDeKhongDau']}}.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                                {{$firstTinTuc['TieuDe']}} 
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
                                                            <a href="/type-news/{{$item->id}}/{{$item->TenKhongdau}}.html" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                                {{$item->Ten}}
                                                            </a>

                                                            <span class="f1-s-3 m-rl-3">
                                                                -
                                                            </span>

                                                            <span class="f1-s-3">
                                                                {{$firstTinTuc['created_at']}}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                                <!-- Item post -->
                                                @if ($tintuc->isNotEmpty())
                                                
                                                @foreach ($tintuc as $tt)
                                                <div class="flex-wr-sb-s m-b-30">
                                                    <a href="news-detail/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="upload/tintuc/{{$tt->Hinh}}" alt="IMG">
                                                    </a>

                                                    <div class="size-w-2">
                                                        <h5 class="p-b-5">
                                                            <a href="news-detail/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                {{$tt->TieuDe}}
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
                                                            <a href="/type-news/{{$item->id}}/{{$item->TenKhongdau}}.html" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                {{$item->Ten}}
                                                            </a>

                                                            <span class="f1-s-3 m-rl-3">
                                                                -
                                                            </span>

                                                            <span class="f1-s-3">
                                                                {{$tt->created_at->toFormattedDateString()}}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <?php $k++;?>
                                @endforeach  

                            </div>
                        </div>   
                        <?php $i++; ?> 
                       
                        @endif
                        @endforeach
                    
                    </div>
                </div>

                <div class="col-md-10 col-lg-4">
                    <div class="p-l-10 p-rl-0-sr991 p-b-20">
                        <!--  -->
                        <div>
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
        
                                        <a href="news-detail/{{$item->id}}/{{$item->TieuDeKhongDau}}.html" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                        {{$item->TieuDe}}
                                        </a>
                                    </li>
                                    <?php $i++ ?>
                                @endforeach
                                

                            </ul>
                        </div>

                        <!--  -->
                        <div class="flex-c-s p-t-8">
                            <a href="#">
                                <img class="max-w-full" src="images/banner-02.jpg" alt="IMG">
                            </a>
                        </div>
                        
                        <!--  -->
                        <div class="p-t-50">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Stay Connected
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
                                        <span class="fab fa-facebook-f"></span>
                                    </a>

                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            6879 Fans
                                        </span>

                                        <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Like
                                        </a>
                                    </div>
                                </li>

                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
                                        <span class="fab fa-twitter"></span>
                                    </a>

                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            568 Followers
                                        </span>

                                        <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Follow
                                        </a>
                                    </div>
                                </li>

                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
                                        <span class="fab fa-youtube"></span>
                                    </a>

                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            5039 Subscribers
                                        </span>

                                        <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Subscribe
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner -->
    <div class="container">
        <div class="flex-c-c">
            <a href="#">
                <img class="max-w-full" src="images/banner-01.jpg" alt="IMG">
            </a>
        </div>
    </div>

    <!-- Latest -->
    <section class="bg0 p-t-60 p-b-35">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-20">
                    <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
                        <h3 class="f1-m-2 cl3 tab01-title">
                            Latest Articles
                        </h3>
                    </div>

                    <div class="row p-t-35">
                        <?php
                        $latest = $TinTuc->sortByDesc('created_at')->where('NoiBat',1)->take(6);
                        ?>
                        @foreach ($latest as $item)
                       
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->	
                            <div class="m-b-45">
                            <a href="news-detail/{{$item->id}}/{{$item->TieuDeKhongDau}}.html" class="wrap-pic-w hov1 trans-03">
                            <img src="upload/tintuc/{{$item->Hinh}}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="news-detail/{{$item->id}}/{{$item->TieuDeKhongDau}}.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            {{$item->TieuDe}} 
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
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
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-10 col-lg-4">
                    <div class="p-l-10 p-rl-0-sr991 p-b-20">
                        <!-- Video -->
                        <div class="p-b-55">
                            <div class="how2 how2-cl4 flex-s-c m-b-35">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Featured Video
                                </h3>
                            </div>

                            <div>
                                <div class="wrap-pic-w pos-relative">
                                    <img src="images/video-01.jpg" alt="IMG">

                                    <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" data-toggle="modal" data-target="#modal-video-01">
                                        <span class="fab fa-youtube"></span>
                                    </button>
                                </div>

                                <div class="p-tb-16 p-rl-25 bg3">
                                    <h5 class="p-b-5">
                                        <a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">
                                            Music lorem ipsum dolor sit amet consectetur 
                                        </a>
                                    </h5>

                                    <span class="cl15">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            by John Alvarado
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>	
                        </div>
                            
                        <!-- Subscribe -->
                        <div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-55">
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
                        
                        <!-- Tag -->
                        <div class="p-b-55">
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