<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="topbar">
            <div class="content-topbar container h-100">
                <div class="left-topbar">
                    <span class="left-topbar-item flex-wr-s-c">
                        <span>
                            Asia/Ho_Chi_Minh
                        </span>
                        <span class="time" style="padding: 0 10px;"> </span>
                        <span>
                            {{ date("Y/m/d")}}
                        </span>
                    </span>

                    <a href="/about" class="left-topbar-item">
                        About
                    </a>

                    <a href="/contact" class="left-topbar-item">
                        Contact
                    </a>

                    <?php $User = Auth::user(); ?> 
                    @if (Auth::check())
                        <a href="/user" class="left-topbar-item">
                           <i class="fa fa-user"></i> {{$User->name}}
                        </a>

                        <a href="/logout" class="left-topbar-item">
                            Log out
                        </a>
                    @else
                        <a href="/signup" class="left-topbar-item">
                            Sign up
                        </a>

                        <a href="/login" class="left-topbar-item">
                            Log in
                        </a>    
                    @endif
                </div>

                <div class="right-topbar">
                    <a href="#">
                        <span class="fab fa-facebook-f"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-twitter"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-pinterest-p"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-vimeo-v"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-youtube"></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->		
            <div class="logo-mobile">
                <a href="/"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li class="left-topbar">
                    <span class="left-topbar-item flex-wr-s-c">
                        <span>
                            Asia/Ho_Chi_Minh
                        </span>
                        <span class="time" style="padding: 0 10px;"> </span>
                        <span>
                            {{ date("Y/m/d")}}
                        </span>
                    </span>
                </li>

                <li class="left-topbar">
                    <a href="/about" class="left-topbar-item">
                        About
                    </a>

                    <a href="/contact" class="left-topbar-item">
                        Contact
                    </a>
                    <?php $User = Auth::user(); ?> 
                    @if (Auth::check())
                         <a href="/user" class="left-topbar-item">
                        <i class="fa fa-user"></i> {{$User->name}}
                        </a>

                        <a href="/logout" class="left-topbar-item">
                            Log out
                        </a>
                    @else
                        <a href="/signup" class="left-topbar-item">
                            Sign up
                        </a>

                        <a href="/login" class="left-topbar-item">
                            Log in
                        </a>    
                     @endif
                </li>

                <li class="right-topbar">
                    <a href="#">
                        <span class="fab fa-facebook-f"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-twitter"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-pinterest-p"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-vimeo-v"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-youtube"></span>
                    </a>
                </li>
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="/">Home</a>               
                </li>
                @foreach ($theloai as $tl)
                 
                <li>
                <a href="/category/{{$tl->id}}">{{$tl->Ten}}</a>
                    <ul class="sub-menu-m">
                        @foreach ($tl->loaitin as $item)
                        <li><a href="/type-news/{{$item->id}}/{{$item->TenKhongDau}}.html">{{$item->Ten}}</a></li>
                        @endforeach
                                              
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>
                @endforeach
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact Us</a></li>
            </ul>
        </div>
        
        <!--  -->
        <div class="wrap-logo container">
            <!-- Logo desktop -->		
            <div class="logo">
                <a href="/"><img src="images/icons/logo-01.png" alt="LOGO"></a>
            </div>	

            <!-- Banner -->
            <div class="banner-header">
                <a href="#"><img src="images/banner-01.jpg" alt="IMG"></a>
            </div>
        </div>	
        
        <!--  -->
        <div class="wrap-main-nav">
            <div class="main-nav">
                <!-- Menu desktop -->
                <nav class="menu-desktop">
                    <a class="logo-stick" href="/">
                        <img src="images/icons/logo-01.png" alt="LOGO">
                    </a>

                    <ul class="main-menu">
                        <li class="main-menu-active">
                            <a href="/">Home</a>                          
                        </li>
                        @foreach ($theloai as $tl)
                        @if (count($tl->loaitin)!=0)                       
                        <li class="mega-menu-item">
                        <a href="/category/{{$tl->id}}">{{$tl->Ten}}</a>

                            <div class="sub-mega-menu">
                                <div class="nav flex-column nav-pills" role="tablist">
                                    <a class="nav-link active" data-toggle="pill" href="#{{utf8tourl(utf8convert($tl->Ten))}}-0" role="tab">All</a>
                                    <?php $i=1; ?>
                                    @foreach ($tl->loaitin as $item)                               
                                         <a class="nav-link" data-toggle="pill" href="#{{utf8tourl(utf8convert($tl->Ten))}}-{{$i}}" role="tab">{{$item->Ten}}</a>
                                    <?php $i++;?>
                                     @endforeach  
                                </div>

                                <div class="tab-content">
                                        <div class="tab-pane show active" id="{{utf8tourl(utf8convert($tl->Ten))}}-0" role="tabpanel">
                                                <div class="row">
                                                    @foreach ($tl->loaitin as $item)
                                                    <?php 
                                                    $data = $item->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(1);
                                                    ?> 
                                                      @foreach ($data as $tintuc)
                                                      <div class="col-3">
                                                          <!-- Item post -->	
                                                          <div>
                                                              <a href="/news-detail/{{$tintuc->id}}/{{$tintuc->TieuDeKhongDau}}.html" class="wrap-pic-w hov1 trans-03">
                                                              <img src="upload/tintuc/{{$tintuc->Hinh}}" alt="IMG">
                                                              </a>
          
                                                              <div class="p-t-10">
                                                                  <h5 class="p-b-5">
                                                                      <a href="/news-detail/{{$tintuc->id}}/{{$tintuc->TieuDeKhongDau}}.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                      {{$tintuc->TieuDe}} 
                                                                      </a>
                                                                  </h5>
          
                                                                  <span class="cl8">
                                                                      <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                          {{$item->Ten}}
                                                                      </a>
          
                                                                      <span class="f1-s-3 m-rl-3">
                                                                          -
                                                                      </span>
          
                                                                      <span class="f1-s-3">
                                                                          {{$tintuc->created_at->toFormattedDateString()}} 
                                                                      </span>
                                                                  </span>
                                                              </div>
                                                          </div>
                                                      </div>
                                                     @endforeach
                                                    @endforeach
                                                    </div>
                                        </div>
                                <?php $i=1 ?>                                     
                                    @foreach ($tl->loaitin as $item) 
                                    
                                            <div class="tab-pane show" id="{{utf8tourl(utf8convert($tl->Ten))}}-{{$i}}" role="tabpanel">
                                                
                                                <?php 
                                                    $data = $item->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(4);
                                                ?>
                                                <div class="row">
                                                    @foreach ($data as $tintuc)
                                                        <div class="col-3">
                                                            <!-- Item post -->	
                                                            <div>
                                                                <a href="/news-detail/{{$tintuc->id}}/{{$tintuc->TieuDeKhongDau}}.html" class="wrap-pic-w hov1 trans-03">
                                                                <img src="upload/tintuc/{{$tintuc->Hinh}}" alt="IMG">
                                                                </a>
            
                                                                <div class="p-t-10">
                                                                    <h5 class="p-b-5">
                                                                        <a href="/news-detail/{{$tintuc->id}}/{{$tintuc->TieuDeKhongDau}}.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                        {{$tintuc->TieuDe}}
                                                                        </a>
                                                                    </h5>
            
                                                                    <span class="cl8">
                                                                        <a href="/type-news/{{$item->id}}/{{$item->TenKhongDau}}.html" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                            {{$item->Ten}}
                                                                        </a>
            
                                                                        <span class="f1-s-3 m-rl-3">
                                                                            -
                                                                        </span>
            
                                                                        <span class="f1-s-3">
                                                                            {{$tintuc->created_at->toFormattedDateString()}}
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <?php $i++;?>
                                     @endforeach
                                        
                                    </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                       
                    </ul>
                </nav>
            </div>
        </div>	
    </div>
</header>

<script>
   
    function myFunction() {
      var d = new Date();
      var n = d.toLocaleTimeString();
      $('.time').text(n);
      //document.getElementsByClassName("time").innerHTML = n;
    }
    setInterval(()=>{
        myFunction();
    },1000)

 </script>