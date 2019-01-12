<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Say extends Model
{
    //
    protected $table = 'say';

    protected $fillable=['id','uid','content'];


}
