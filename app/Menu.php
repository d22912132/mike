<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable=[
        'text',
        'href',
        'sh',
    ];

    public function subs(){
        return $this->hasMany("App\SubMenu");
    }
}
