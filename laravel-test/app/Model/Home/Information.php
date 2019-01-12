<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    //
    protected $table = 'information';

    protected $fillable=['uid','school','identity','counts','company','indutry','position','music','book','movie','game'];

    public $timestamps = false;

    protected $primaryKey = 'uid';
}
