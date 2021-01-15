<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Title;
use App\Total;
use App\Bottom;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $view=[];

    public function __construct()
    {
        $this->view['title']=Title::where("sh",1)->first();
        //抓一次total值
        $this->view['total']=Total::first()->total;
        if(!session()->has('visiter')){
            $total=Total::first();
            $total->total++;
            $total->save();
            $this->view['total']=$total->total;
            //session(['visiter'=>$total->total]);
            session()->put('visiter',$total->total);
        }
        $this->view['bottom']=Bottom::first()->bottom;
    }
}
