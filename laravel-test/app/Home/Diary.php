<?php

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $table='diarys';

    //白名单
    protected $fillable = ['id','uid','content','likenum','utime','cstate','remember_token','created_at','updated_at'];

}
