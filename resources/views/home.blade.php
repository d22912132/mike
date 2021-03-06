{{--  繼承layouts把上到下三層繼承過來  --}}
@extends('layouts.layout')

@section('main')
{{--  切三塊分為左中右，左為menu  --}}
<div class="menu col-3">
    <div class="text-center py-2 border-bottom my-1">主選單區</div>
    @isset($menus)
        <ul class="list-group">
            @foreach ($menus as $menu)
                <li class="list-group-item list-group-item-action py-1 bg-warning
                position-relative menu">
                    <a href="{{$menu->href}}">{{$menu->text}}</a>
                    @isset($menu->subs)
                    <ul class="list-group position-absolute w-75 subs" style="z-index:99;
                    display:none;left:100px;top:25px;">
                        @foreach ($menu->subs as $sub)
                        <li class="list-group-item list-group-item-action py-1 bg-success py-1">
                        <a href="{{$sub->href}}" style="color: white">{{$sub->text}}</a></li>
                        @endforeach                        
                    </ul>
                    @endisset
                </li>
            @endforeach
        </ul>
    @endisset
    <div class="viewer" >
        進站總人數：{{ $total }}
    </div>
</div>
{{--  中間切版main  --}}
<div class="main col-6">
    <marquee>{{$ads}}</marquee>

   @yield('center') 
</div>
{{--  右邊切版right  --}}
<div class="right col-3">
    @auth
    <a href="/admin" class="btn btn-success py-3 w-100 my-2">返回管理({{$user->acc}})</a>
    @endauth
    @guest
    <a href="/login" class="btn btn-primary py-3 w-100 my-2">管理登入</a>
    @endguest
    
    <div class="text-center py-2 border-bottom my-1">主選單區</div>
    
    <div class="up"></div>
        @isset($images)
            @foreach ($images as $img)
                
                <div class="img"><img src="{{asset('storage/'.$img->img)}}"></div>

            @endforeach        
        @endisset
    <div class="down"></div>

</div>


@endsection

@section('script')
    <script>
        //主選單顯示次選單列，移入移出JS
        $(".menu").hover(
            function(){
                $(this).children('.subs').show()
            },
            function(){
                $(this).children('.subs').hide()
            }
        )
    //計算圖片數量是否小於3
    let num=$(".img").length;
    let p=0;
    $(".img").each((idx,dom)=>{
        if(idx<3){
            $(dom).show()
        }
    })

    $(".up,.down").on("click",function(){
        $(".img").hide()
        switch($(this).attr('class')){
            case 'up':
                p=(p>0)?--p:p;
            break;
            case 'down':
                p=(p<num-3)?++p:p;
            break;
        }

        $(".img").each((idx,dom)=>{
            if(idx>=p && idx<=p+2){
                $(dom).show()
            }
        })
    })

    $(".mv").eq(0).show()
    //餘數做圖片循環切換,3秒跑一次
    let mvNum=$(".mv").length;
    let now=0;
    setInterval(() => {
        $(".mv").hide()
        ++now;
        $(".mv").eq(now%mvNum).show();

    }, 3000);
    $('.new').hover(
            function(){
                $(this).children('div').show()
            },
            function(){
                $(this).children('div').hide()
            }
        )
    </script>
@endsection
