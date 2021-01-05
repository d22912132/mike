<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    //
    protected $fillable=[
        'text',
        'href',
        'menu_id',
    ];

    public function menu(){
        return $this->belongsTo("App\Menu");
    }
}
