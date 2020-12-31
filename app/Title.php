<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Title extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[
        'text',
        'img',
        'sh',
    ];
}
