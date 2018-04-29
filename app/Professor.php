<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Professor extends Authenticatable
{
    protected $table = 'professor';
    protected $fillable = [

    	'id','nome','contato','sexo','email','endereco','password',

    ];
    
      protected $hidden = [
        'password', 'remember_token',
    ];
}
