<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    //连接表
    protected $table = 'commentreplys';
//    过滤时间
    public $timestamps = false;
    //调用create方法
    protected $fillable = ['id','cid','tid','content','from_uid','to_uid','utime'];
    //设置黑名单
//    protected $guarded = [''];

}
