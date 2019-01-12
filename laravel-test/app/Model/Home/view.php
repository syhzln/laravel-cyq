<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class view extends Model
{
    protected $table = 'views';

    protected $fillable=['uid','content'];


}
