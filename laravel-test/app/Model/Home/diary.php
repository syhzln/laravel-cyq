<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class diary extends Model
{
    //
    protected $table = 'diarys';
    //白名单
    protected $fillable = ['id','uid','content','likenum','utime','cstate','remember_token','created_at','updated_at'];
    //设置黑名单
//    protected $guarded = [''];
}
