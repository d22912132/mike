<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=Ad::all();
        $cols=['動態文字廣告','顯示','刪除'];
        $rows=[];
        foreach($all as $a){
            $tmp=[
                [
                    'tag'=>'',
                    'text'=>$a->text
                ],
                [
                    'tag'=>'button',
                    'type'=>'button',
                    'btn_color'=>'btn-success',
                    'action'=>'show',
                    'id'=>$a->id,
                    'text'=>($a->sh==1)?'顯示':'隱藏',
                ],
                [
                    'tag'=>'button',
                    'type'=>'button',
                    'btn_color'=>'btn-danger',
                    'action'=>'delete',
                    'id'=>$a->id,
                    'text'=>'刪除',
                ],
            ];
            
            $rows[]=$tmp;
        }

        //dd($rows);

        $view=[
            'header'=>'動態廣告文字廣告',
            'module'=>'Ad',
            'cols'=>$cols,
            'rows'=>$rows
        ];
        return view('backend.module', $view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = [
            'action'=>'/admin/ad',
            'modal_header'=>'新增動態廣告文字',
            'modal_body'=>[
                [
                    'label'=>'動態廣告文字',
                    'tag'=>'input',
                    'type'=>'text',
                    'name'=>'text',
                ],
            ],
        ];
        return view('modals.base_modal',$view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //儲存圖片檔案時，檔名拉出來優先做處理
        //確認陣列$request請求中是否存在文件，除了檢查文件是否存在之外，還可以驗證通過以下isValid方法上傳文件沒有問題：
            $ad=new Ad;
            $ad->text=$request->input('text');
            $ad->save(); 

        return redirect('/admin/ad');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ad=Ad::find($id); 
        $view = [
            'action'=>'/admin/ad/'.$id,
            // 讓瀏覽器知道我們用的方法是patch不是post
            'method'=>'patch',
            'modal_header'=>'編輯動態廣告文字',
            'modal_body'=>[
                [
                    'label'=>'動態廣告文字',
                    'tag'=>'input',
                    'type'=>'text',
                    'name'=>'text',
                    'value'=>$ad->text
                ],
            ],
        ];

        return view('modals.base_modal',$view);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $ad=Ad::find($id);

        if($ad->text!=$request->input('text')){
            $ad->text=$request->input('text');
            $ad->save(); 
        }

        
        return redirect('/admin/ad');
    }

    /**
     *改變資料的顯示狀態
     */
    public function display($id)
    {
        $ad=Ad::find($id);

        $ad->sh=($ad->sh+1)%2;
        $ad->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Ad::destroy($id);
    }
}
