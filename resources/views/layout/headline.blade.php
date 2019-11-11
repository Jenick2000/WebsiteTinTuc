<div class="container">
    <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
            <span class="text-uppercase cl2 p-r-8">
                Trending Now:
            </span>

            <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
               <?php
                    $Trending = $TinTuc->sortByDesc('created_at')->where('NoiBat',1)->where('SoLuotXem','>',100)->take(5);
               ?>
               @foreach ($Trending as $item)
                <span class="dis-inline-block slide100-txt-item animated visible-false">
                    {{$item->TieuDe}}
                </span>
               @endforeach
                
                
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