<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';
    protected $fillable = [

    	'id','nome','quantidade','marca','status_emprestimo',


    ];

    public function emprestimos()
    {
    	return $this->hasMany('App\Emprestimo');
    }
}
