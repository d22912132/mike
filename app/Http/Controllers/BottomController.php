<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bottom;

class BottomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bottom=Bottom::first();
        $cols=['頁尾版權文字'];
        $rows=[
            [
                'text'=>$bottom->bottom
            ],
            [
                'tag'=>'button',
                'type'=>'button',
                'btn_color'=>'btn-info',
                'action'=>'edit',
                'id'=>$bottom->id,
                'text'=>'編輯',
            ],
        ];

        //dd($rows);

        $view=[
            'header'=>'頁尾版權管理',
            'module'=>'Bottom',
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $bottom=Bottom::first(); 
        $view = [
            'action'=>'/admin/bottom/'.$id,
            // 讓瀏覽器知道我們用的方法是patch不是post
            'method'=>'patch',
            'modal_header'=>'編輯頁尾版權文字',
            'modal_body'=>[
                [
                    'label'=>'頁尾版權文字',
                    'tag'=>'input',
                    'type'=>'text',
                    'name'=>'bottom',
                     'value'=>$bottom->bottom
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

        $bottom=Bottom::first();

        if($bottom->bottom!=$request->input('bottom')){
            $bottom->bottom=$request->input('bottom');
            $bottom->save(); 
        }

        
        return redirect('/admin/bottom');
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
    }
}
