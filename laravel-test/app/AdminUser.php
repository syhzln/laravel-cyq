<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class AdminUser extends Authenticatable
{
    //
    use Notifiable;
    use EntrustUserTrait;

    protected $table = 'adminusers';

    protected $fillable = [

        'name', 'email', 'password'

    ];


    public function setpasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public $timestamps = false;
}
