<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    {{--  放下面才會蓋掉上面的，用asset抓正確的css/style.css位置  --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>科技大學校園資訊系統</title>
</head>
<body>
    {{--  大區塊包中間分成三塊  --}}
    <div class="container">
        {{--  最上面那一塊叫header  --}}
        <div class="header w-100">
            <a href="/" title="{{$title->text }}"><img src="{{asset('storage/'.$title->img)}}" alt="{{ $title->text }}" class="w-100" style="height: 60px"></a>
        </div>
        {{-- 橫向 --}}
        {{--  中間那一塊叫main，通常移出去另外做 d-flex使內容變橫向  --}}
        <div class="main d-flex" style="height: 568px">
            @yield('main')
        </div>
        {{--  最下面那一塊footer  --}}
        <div class="footer w-100">
            <div class="text-center" style="height: 100px;line-height:100px; 
            background:rgba(229, 255, 0, 0.877)">{{$bottom}}</div>
        </div>
    </div>
<div id="modal"></div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
</body>
</html>
@yield('script')