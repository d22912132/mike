@extends('layouts.layout')

@section('main')
@include('layouts.backend_sidebar')
<div class="main col-9 p-0 d-flex flex-wrap align-items-start">
        <div class="col-8 border py-3 text-center">後臺管理區</div>
        <button class="col-4 btn btn-light border py-3 text-center">管理登出</button>
        <div class="border w-100 p-1" style="height: 500px">
        <h5 class="text-center borter-bottom py-3">
        <button class="btnbtn-sm btn-primary float-left" id="addRow">新增</button>    
            {{$header}}
        </h5>
        <table class="table border-none text-center">
        <tr>
            <td width="">動態文字廣告</td>
            <td width="10%">顯示</td>
            <td width="10%">刪除</td>
        </tr>
        @isset($rows)
        @foreach ($rows as $row)     
        <tr>
            <td>{{ $row->text }}</td>
            <td><button class="btn btn-success btn-sm show" data-id="{{$row->id}}">
                @if($row->sh==1) 
                顯示
                @else
                隱藏
                @endif
            </button></td>        
            <td><button class="btn btn-danger btn-sm delete" data-id="{{$row->id}}">刪除</button></td>
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
        $.get(`/modals/title/${id}`,function(modal){
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
            type:'dalete',
            url:`/admin/title/${id}`,
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
            url:`/admin/title/sh/${id}`,
            success:function(){
                location.reload()
            }
        })
    })


</script>
    
@endsection
