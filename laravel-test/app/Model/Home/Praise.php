<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Praise extends Model
{
    //
    //连接表
    protected $table = 'commentlikes';

    //调用方法
    protected $fillable = ['id','uid','rid'];

    //    过滤时间
    public $timestamps = false;
}
