<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Lunbo extends Model
{
    //
    protected $table = 'lunbo';

    protected $fillable=['id','img'];

    public $timestamps = false;
}
