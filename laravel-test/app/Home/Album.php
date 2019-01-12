<?php

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps = false;
    protected $table='album';
    protected $fillable = [
        'pname','uid','time','status'
    ];


    protected $hidden = [
        '_token','updated_at'
    ];
}
