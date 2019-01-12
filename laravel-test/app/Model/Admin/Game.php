<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    protected $table = 'games';

    protected $fillable=['id','img','name','path'];

    public $timestamps = false;
}
