<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    //
    protected $table = 'cover';

    protected $fillable=['id','uid','img'];

    public $timestamps = false;
    protected $primaryKey = 'uid';
}
