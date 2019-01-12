<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class integradeDo extends Model
{
    //
    //连接表
    protected $table = 'integradedo';

    //调用create方法
    protected $fillable = ['id','eid','rp_f','time_d','time_m'];

    //    过滤时间
    public $timestamps = false;
}
