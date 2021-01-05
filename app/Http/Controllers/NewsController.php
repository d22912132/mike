<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=News::all();
        $cols=['最新消息內容','顯示','刪除','操作'];
        $rows=[];
        foreach($all as $a){
            $tmp=[
                [
                    'tag'=>'',
                    'text'=>mb_substr($a->text,0,50,'utf8')
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
                [
                    'tag'=>'button',
                    'type'=>'button',
                    'btn_color'=>'btn-info',
                    'action'=>'edit',
                    'id'=>$a->id,
                    'text'=>'編輯',
                ],
            ];
            
            $rows[]=$tmp;
        }

        //dd($rows);

        $this->view['header']='最新消息內容管理';
        $this->view['module']='News';
        $this->view['cols']= $cols;
        $this->view['rows']= $rows;
        //dd($this->view);
        return view('backend.module', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = [
            'action'=>'/admin/news',
            'modal_header'=>'新增最新消息內容',
            'modal_body'=>[
                [
                    'label'=>'最新消息內容',
                    'tag'=>'textarea',
                    'style'=>'width:200px;height:100px',
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
        //
            $news = new News;
            $news->text=$request->input('text');
            $news->save();

        return redirect('/admin/news');
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
        $news=News::find($id); 
        $view = [
            'action'=>'/admin/news/'.$id,
            // 讓瀏覽器知道我們用的方法是patch不是post
            'method'=>'patch',
            'modal_header'=>'編輯最新消息內容',
            'modal_body'=>[
                [
                    'label'=>'最新消息內容',
                    'tag'=>'textarea',
                    'name'=>'text',
                    'value'=>$news->text,
                    'style'=>'width:200px;height:100px',
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

        $news=News::find($id);

        if($news->text!=$request->input('text')){
            $news->text=$request->input('text');
            $news->save();
        }

        
        return redirect('/admin/news');
    }

    /**
     *改變資料的顯示狀態
     */
    public function display($id)
    {
        $news=News::find($id);
        $news->sh=($news->sh+1)%2;
        $news->save();  
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
        News::destroy($id);
    }
}
