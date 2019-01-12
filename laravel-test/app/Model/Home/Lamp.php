<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Lamp extends Model
{
    //
    protected $table = 'lamp_district';

    protected $fillable=['id','name','level','upid'];
}
