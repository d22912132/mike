<div class="menu col-3 text-center">
    <div class="list-group">
        <div class="border-bottom my-2 p-1 ">後台管理</div>
        {{--  list-group-item-action底色，px-0間距取消，d-block占滿所有副空間橫向的寬度並變成區塊block  --}}
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/title">標題圖片管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/ad">動態廣告管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/image">校園映像片管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/mvim">動畫圖片管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/total">進站人數管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/bottom">頁尾版權管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/news">最新消息管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/admin">管理者管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/menu">選單管理</a></div>
    </div>
    <div class="border text-center my-2">訪客人數：{{$total}}人</div>
</div>