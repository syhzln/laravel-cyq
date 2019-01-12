<?php

namespace App\Model\home;

use Illuminate\Database\Eloquent\Model;

class CommentLikes extends Model
{
    //
    //连接表
    protected $table = 'commentlikes';
//    过滤时间
//    public $timestamps = false;
    //调用create方法
    protected $fillable = ['id','uid','rid'];
    //设置黑名单
//    protected $guarded = [''];
//设置主键
//    protected $primaryKey = 'id_c';
}
