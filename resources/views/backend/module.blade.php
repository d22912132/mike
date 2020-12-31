@extends('layouts.layout')

@section('main')
@include('layouts.backend_sidebar')
<div class="main col-9 p-0 d-flex flex-wrap align-items-start">
        <div class="col-8 border py-3 text-center">後臺管理區</div>
        <button class="col-4 btn btn-light border py-3 text-center">管理登出</button>
        <div class="border w-100 p-1" style="height: 500px">
        <h5 class="text-center borter-bottom py-3">
        <button class="btnbtn-sm btn-primary float-left" id="addRow">新增</button>    
            {{ $header }}
        </h5>
        <table class="table border-none text-center">
        <tr>
        @isset($cols)
        @foreach ($cols as $col)
            <td width="{{$col}}">{{$col}}</td>            
        @endforeach
        @endisset
        </tr>
        @isset($rows)
        @foreach ($rows as $row)     
        <tr>
            @foreach ($row as $item)
                <td>
                    @switch($item['tag'])
                        @case('img')
                            @include('layouts.image',$item)
                        @break
                        @case('button')
                            @include('layouts.button',$item)
                        @break
                        @default
                            {{ $item['text'] }}
                    @endswitch
                </td>
            @endforeach
        </tr>
        @endforeach
        @endisset
        </table>
    
        </div>
    </div>

@endsection

@section("script")
<script>
    {{--  CSRF應用在JS裡  --}}
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#addRow').on("click", function(){
        $.get("/modals/add{{ $module }}", function(modal){
            $("#modal").html(modal)
            $("#baseModal").modal("show")

            $("#baseModal").on("hidden.bs.modal",function(){
                $("#baseModal").modal("dispose")
                $("#modal").html("")
            })
        })
    })

    $('.edit').on("click",function(){
        let id=$(this).data('id')
        {{--  es6文字模板功能，使用反引號保留原始樣貌  --}}
        $.get(`/modals/{{ strtolower($module) }}/${id}`,function(modal){
            $("#modal").html(modal)
            $("#baseModal").modal("show")

            $("#baseModal").on("hidden.bs.modal",function(){
                $("#baseModal").modal("dispose")
                $("#modal").html("")
            })
        })
    })


    $('.delete').on("click",function(){
        let id=$(this).data('id')
        {{--  es6文字模板功能，使用反引號保留原始樣貌  --}}
        $.ajax({
            type:'delete',
            url:`/admin/{{ strtolower($module) }}/${id}`,
            success:function(){
                location.reload()
            }
        })
    })

    $('.show').on("click",function(){
        let id=$(this).data('id')
        {{--  es6文字模板功能，使用反引號保留原始樣貌  --}}
        $.ajax({
            type:'patch',
            url:`/admin/{{ strtolower($module) }}/sh/${id}`,
            success:function(){
                location.reload()
            }
        })
    })


</script>
    
@endsection
