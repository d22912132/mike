<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authentication;

class Admin extends Authentication
{
    //
    protected $fillable=[
        'acc',
        'pw'
    ];
    //覆寫方法,改成pw抓正確欄位
    public function getAuthPassword()
    {
        return $this->pw;
    }
}
