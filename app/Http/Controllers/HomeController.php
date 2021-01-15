<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\SubMenu;
use App\Image;
use App\Ad;
use App\Mvim;
use App\News;
use Auth;
use App\Total;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->sideBar();
        //轉換陣列再變字串並用全形空白連接抓到的資料
        $mvims=Mvim::where("sh",1)->get();
        //filter抓5筆資料
        $news=News::where('sh',1)->get()->filter(function($val,$idx){
            if($idx>4){
                $this->view['more']='/news';
                return null;
            }else{
                return $val;
            }
        });

        //dd($news,$this->view);
        
        $this->view['mvims']=$mvims;
        $this->view['news']=$news;

        return view('main',$this->view);
    }

    protected function sideBar(){
        //主選單次選單一次撈資料Laravel一次處理
        $menus=Menu::where('sh',1)->get();
        $images=Image::where('sh',1)->get();
        $ads=implode("　",Ad::where("sh",1)->get()->pluck('text')->all()) ;
        foreach($menus as $key => $menu){
            $subs=$menu->subs;
            //dd($subs);
            $menu->subs=$subs; 
            $menus[$key]=$menu;
        }
        if(Auth::user()){
            $this->view['user']=Auth::user();
        }

        

        $this->view['ads']=$ads;
        $this->view['menus']=$menus;
        $this->view['images']=$images;
    }
}
