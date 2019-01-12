<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class gift extends Model
{
    //
    //连接表
    protected $table = 'gift';
//    过滤时间
    public $timestamps = false;
    //调用create方法
    protected $fillable = ['id','uid','gid','gift','getGift'];
    //设置黑名单
//    protected $guarded = [''];
//设置主键
//    protected $primaryKey = 'id_c';
}
