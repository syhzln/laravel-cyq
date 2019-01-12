<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //连接表
    protected $table = 'comments';
//    过滤时间
    public $timestamps = false;
    //调用create方法
    protected $fillable = ['id_c','uid','tid','tuid','content_c','utime_c'];
     //设置黑名单

//    protected $guarded = [''];
//设置主键
    protected $primaryKey = 'id_c';


}

