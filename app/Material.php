<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';
    protected $fillable = [

    	'id','nome','quantidade','marca'


    ];

    public function emprestimos()
    {
    	return $this->hasMany('App\Emprestimo');
    }
}
