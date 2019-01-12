<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class integrade extends Model
{
    //
    //连接表
    protected $table = 'integrade';
//    过滤时间
    public $timestamps = false;
    //调用create方法
    protected $fillable = ['id_e','uid','rp_z','rp_d'];
    //设置黑名单
//    protected $guarded = [''];
//设置主键
    protected $primaryKey = 'id_e';
}
