<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Friendlylink extends Model
{
    //
    protected $table = 'friendlylink';

    protected $fillable=['id','name','link'];

    public $timestamps = false;
}
