<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Total;


class TotalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total=Total::first();
        $cols=['進站總人數'];
        $rows=[
            [
                'text'=>$total->total
            ],
            [
                'tag'=>'button',
                'type'=>'button',
                'btn_color'=>'btn-info',
                'action'=>'edit',
                'id'=>$total->id,
                'text'=>'編輯',
            ],
        ];

        //dd($rows);

       
        $this->view['header']='進站總人數管理';
        $this->view['module']='Total';
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
        $total=Total::first(); 
        $view = [
            'action'=>'/admin/total/'.$id,
            // 讓瀏覽器知道我們用的方法是patch不是post
            'method'=>'patch',
            'modal_header'=>'編輯進站總人數',
            'modal_body'=>[
                [
                    'label'=>'進站總人數',
                    'tag'=>'input',
                    'type'=>'number',
                    'name'=>'total',
                     'value'=>$total->total
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

        $total=Total::first();

        if($total->total!=$request->input('total')){
            $total->total=$request->input('total');
            $total->save(); 
        }

        
        return redirect('/admin/total');
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
